<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $carts;
    public $pays;
    public $ville;
    public $adresse;
    public $paymentMethod = 'mobile_money';
    public $paysDisponible = [];
    public $villesDisponible = [];
    public $numeroPaiement;
    public $order;

    protected $listeners = ['paymentSuccess', 'paymentFailed'];

    public function mount()
    {
        if (Auth::guard('etudiant')->check()) {
            $this->carts = Cart::where('etudiant_id', Auth::guard('etudiant')->id())
                ->latest()
                ->get();
        }

        $this->paysDisponible = [
            "Mali",
            "Côte d'Ivoire",
            "Sénégal",
            "Bénin",
            "Togo",
            "Burkina Faso"
        ];
    }

    public function updatedPays($pays)
    {
        $listeVilles = [
            'Mali' => ['Bamako', 'Sikasso', 'Kayes'],
            'Côte d\'Ivoire' => ['Abidjan', 'Bouaké'],
            'Sénégal' => ['Dakar', 'Thiès'],
            'Bénin' => ['Cotonou', 'Porto-Novo'],
            'Togo' => ['Lomé', 'Kara'],
            'Burkina Faso' => ['Ouagadougou', 'Bobo-Dioulasso'],
        ];
        $this->ville = null;
        $this->villesDisponible = $listeVilles[$pays] ?? [];
    }

    public function paysVersCodeIso($pays)
    {
        return [
            "Mali" => "ML",
            "Côte d'Ivoire" => "CI",
            "Sénégal" => "SN",
            "Bénin" => "BJ",
            "Togo" => "TG",
            "Burkina Faso" => "BF",
        ][$pays] ?? 'BJ';
    }

    private function numeroSansIndicatif($telephone, $codeIsoPays)
    {
        $num = preg_replace('/^\+/', '', $telephone);
        $num = preg_replace('/^00/', '', $num);
        
        $indicatifs = [
            'ml' => '223', 'ci' => '225', 'sn' => '221',
            'bj' => '229', 'tg' => '228', 'bf' => '226',
        ];

        if (isset($indicatifs[$codeIsoPays]) && strpos($num, $indicatifs[$codeIsoPays]) === 0) {
            $num = substr($num, strlen($indicatifs[$codeIsoPays]));
        }

        return $num;
    }

    public function checkout()
    {
        $this->validate([
            'pays' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'numeroPaiement' => 'required'
        ]);

        DB::beginTransaction();

        try {
            // 1. Créer la commande en statut "draft"
            $order = Order::create([
                'etudiant_id' => Auth::guard('etudiant')->id(),
                'pays' => $this->pays,
                'ville' => $this->ville,
                'adresse' => $this->adresse,
                'status' => 'draft',
            ]);

            // 2. Ajouter les articles à la commande
            foreach ($this->carts as $cart) {
                OrderItems::create([
                    'order_id' => $order->id,
                    'formation_id' => $cart->formation_id,
                    'quantite' => $cart->quantite ?? 1,
                    'prix' => $cart->formation->prix_original,
                ]);
            }

            // 3. Préparer les données pour FedaPay
            $paymentData = [
                'public_key' => config('services.fedapay.public_key'),
                'order_id' => $order->id,
                'amount' => $this->calculateTotal() * 100, // Conversion en centimes
                'description' => 'Formation Motechnova',
                'callback_url' => route('fedapay.callback'),
                'customer' => [
                    'firstname' => Auth::guard('etudiant')->user()->prenom,
                    'lastname' => Auth::guard('etudiant')->user()->nom,
                    'email' => Auth::guard('etudiant')->user()->email,
                    'phone_number' => $this->formatPhoneNumber()
                ],
                'metadata' => [
                    'order_id' => $order->id,
                    'user_id' => Auth::guard('etudiant')->id()
                ]
            ];

            DB::commit();

            // 4. Envoyer les données au frontend pour afficher FedaPay
            $this->dispatchBrowserEvent('showFedapayCheckout', $paymentData);

        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('payment_error', 'Erreur lors de l\'initialisation du paiement: ' . $e->getMessage());
        }
    }

    private function calculateTotal()
    {
        return $this->carts->sum(function($cart) {
            return $cart->formation->prix_original;
        });
    }

    private function formatPhoneNumber()
    {
        $code = strtolower($this->paysVersCodeIso($this->pays));
        return [
            'number' => $this->numeroSansIndicatif($this->numeroPaiement, $code),
            'country' => $code
        ];
    }

    public function paymentSuccess($data)
    {
        // 1. Trouver la commande
        $order = Order::find($data['order_id']);
        
        if (!$order) {
            $this->addError('payment_error', 'Commande introuvable');
            return;
        }

        DB::beginTransaction();

        try {
            // 2. Mettre à jour la commande
            $order->update(['status' => 'paid']);

            // 3. Créer la transaction
            Transaction::create([
                'order_id' => $order->id,
                'fedapay_transaction_id' => $data['fedapay_id'],
                'montant' => $this->calculateTotal(),
                'statut' => 'approved',
                'moyen_paiement' => $this->paymentMethod
            ]);

            // 4. Donner accès aux formations
            foreach ($order->orderItems as $item) {
                \App\Models\EtudiantFormation::firstOrCreate([
                    'etudiant_id' => $order->etudiant_id,
                    'formation_id' => $item->formation_id
                ], [
                    'acces_donne_le' => now(),
                    'transaction_id' => $order->id
                ]);
            }

            DB::commit();

            // 5. Redirection vers la page de succès
            return redirect()->route('fedapay.success', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('payment_error', 'Erreur lors de la confirmation du paiement: ' . $e->getMessage());
        }
    }

    public function paymentFailed()
    {
        $this->addError('payment_error', 'Le paiement a échoué. Veuillez réessayer.');
    }

    public function render()
    {
        return view('livewire.frontend.checkout.index', [
            'total' => $this->calculateTotal()
        ]);
    }
}