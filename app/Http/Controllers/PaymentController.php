<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Transaction;
use App\Models\Etudiant;
use App\Models\Checkout;
use App\Models\EtudiantFormation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use FedaPay\FedaPay;
use FedaPay\Transaction as FedaTransaction;

class PaymentController extends Controller
{
    /**
     * Affiche la page de paiement avec le panier de l'étudiant
     */
    public function checkoutForm()
    {
        $etudiant = Auth::guard('etudiant')->user();
        $carts = Cart::with('formation')->where('etudiant_id', $etudiant->id)->with('formation')->get();

        return view('frontend.checkout.index', compact('etudiant', 'carts'));
    }

    /**
     * Lance la transaction FedaPay et redirige vers la page de paiement
     */
    public function payWithFedaPay(Request $request)
    {
        $etudiant = Auth::guard('etudiant')->user();

        $request->validate([
            'pays' => 'required|string',
            'ville' => 'required|string',
            'adresse' => 'required|string',
            'numeroPaiement' => 'required|string',
            'paymentMethod' => 'required|string'
        ]);

        $carts = Cart::where('etudiant_id', $etudiant->id)->with('formation')->get();

        if ($carts->isEmpty()) {
            return back()->with('error', 'Votre panier est vide.');
        }

        $amount = $carts->sum(fn($c) => $c->formation->prix_original);

        $order = Order::create([
            'etudiant_id' => $etudiant->id,
            'pays' => $request->pays,
            'ville' => $request->ville,
            'adresse' => $request->adresse,
            'status' => 'pending',
        ]);

        foreach ($carts as $cart) {
            OrderItems::create([
                'order_id' => $order->id,
                'formation_id' => $cart->formation_id,
                'quantite' => $cart->quantite,
                'prix' => $cart->formation->prix_original,
            ]);
        }

        FedaPay::setApiKey(config('services.fedapay.secret_key'));
        FedaPay::setEnvironment(config('services.fedapay.environment', 'production'));

        $transaction = FedaTransaction::create([
            'amount' => $amount,
            'description' => 'Paiement de formations',
            'currency' => ['iso' => 'XOF'],
            'customer' => [
                'firstname' => $etudiant->nom,
                'lastname' => $etudiant->prenom,
                'email' => $etudiant->email,
                'phone_number' => [
                    'number' => $request->numeroPaiement,
                    'country' => 'ML'
                ]
            ],
            'custom_metadata' => [
                'order_id' => $order->id,
                'etudiant_id' => $etudiant->id,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'adresse' => $request->adresse,
                'payment_method' => $request->paymentMethod,
            ],
            'callback_url' => route('fedapay.success', ['orderId' => $order->id]),
            'notification_url' => route('fedapay.callback'),
        ]);

        Log::info("🧾 Transaction FedaPay créée : " . json_encode($transaction));

        $url = $transaction->generateToken([
            'callback_url' => route('fedapay.success', ['orderId' => $order->id])
        ])->url;

        return redirect()->away($url);
    }

    /**
     * Webhook FedaPay : traite la validation du paiement
     */
    public function fedapayCallback(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('FedaPay-Signature');
        $secret = env('FEDAPAY_WEBHOOK_TOKEN');

        if ($signature) {
            $computed = hash_hmac('sha256', $payload, $secret);
            if (!hash_equals($computed, $signature)) {
                Log::error("❌ Signature invalide");
                return response()->json(['error' => 'Signature invalide'], 400);
            }
        }

        $data = json_decode($payload, true);
        $event = $data['name'];
        Log::info("📦 Données entity reçues : " . json_encode($data));
        $transaction = $data['entity'];
        $status = $transaction['status'];

        Log::info("🎯 Webhook reçu : Event = $event | Status = $status");

        if ($event === 'transaction.approved' && $status === 'approved') {
            $meta = $transaction['custom_metadata'] ?? [];
        Log::info("🔍 Transaction metadata : " . json_encode($meta));
        Log::info("🔍 Transaction metadata : " . json_encode($meta));
            $etudiant = Etudiant::find((int) ($meta['etudiant_id'] ?? 0));
            $orderId = (int) ($meta['order_id'] ?? 0);
        Log::info("🧪 Etudiant ID reçu = " . ($etudiant ? $etudiant->id : 'NULL') . " | Order ID = $orderId");

            Log::info("🧠 Metadata reçue : " . json_encode($meta));

            Log::info("🧪 Vérif : etudiant=" . ($etudiant ? 'OK' : 'NULL') . ", orderId=" . $orderId);
        if (!$etudiant || !$orderId) {
                Log::error("❌ Étudiant ou commande introuvable. etudiant=" . ($etudiant ? 'OK' : 'NULL') . ", orderId=$orderId");
                return response()->json(['error' => 'Étudiant ou commande manquant'], 404);
            }

            $order = Order::find($orderId);
        Log::info("🧪 Vérif : commande trouvée = " . ($order ? 'OUI' : 'NON'));
            if (!$order) {
                Log::error("❌ Commande introuvable pour ID $orderId");
                return response()->json(['error' => 'Commande introuvable'], 404);
            }

            $existing = Transaction::where('fedapay_transaction_id', $transaction['id'])->first();
        Log::info("🧪 Vérif : transaction existante = " . ($existing ? 'OUI' : 'NON'));
            if ($existing) {
                Log::info("✅ Transaction déjà enregistrée, rien à faire.");
                return response()->json(['message' => 'Déjà traité'], 200);
            }

            Log::info("🚀 Début de la transaction DB...");
        DB::beginTransaction();
            try {
                $order->update(['status' => 'approved']);

                Transaction::create([
                    'order_id' => $order->id,
                    'fedapay_transaction_id' => $transaction['id'],
                    'montant' => $transaction['amount'],
                    'moyen_paiement' => $meta['payment_method'] ?? 'unknown',
                    'statut' => 'approved',
                    'paye_a' => now(),
                ]);

                foreach ($order->orderItems as $item) {
                    EtudiantFormation::updateOrCreate([
                        'etudiant_id' => $etudiant->id,
                        'formation_id' => $item->formation_id
                    ], [
                        'acces_donne_le' => now()
                    ]);
                }

                Cart::where('etudiant_id', $etudiant->id)->delete();

                DB::commit();
                Log::info("✅ Paiement traité et accès donné. Order ID = $orderId");
        Log::info("🎓 Formations ajoutées et panier vidé");
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('💥 Erreur lors du traitement FedaPay : ' . $e->getMessage());
                return response()->json(['error' => 'Erreur serveur'], 500);
            }
        }

        return response()->json(['message' => 'OK'], 200);
    }

    /**
     * Affiche la page de succès après paiement
     */
    public function success($orderId)
    {
        $order = Order::with('orderItems.formation', 'etudiant')->findOrFail($orderId);
        return view('frontend.checkout.success', compact('order'));
    }
}