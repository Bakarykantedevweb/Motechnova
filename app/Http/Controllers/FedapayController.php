<?php

namespace App\Http\Controllers;

use FedaPay\FedaPay;
use FedaPay\Webhook;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\EtudiantFormation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use FedaPay\Transaction as FedaPayTransaction;

class FedapayController extends Controller
{
    /**
     * Page de succès après paiement
     */
    public function success($orderId)
    {
        try {
            $order = Order::with(['transaction', 'orderItems.formation'])
                        ->findOrFail($orderId);

            // Vérifier que le paiement est bien validé
            if (!$order->transaction || $order->transaction->statut !== 'approved') {
                Log::warning("Tentative d'accès non autorisée à la page de succès", [
                    'order_id' => $orderId,
                    'ip' => request()->ip()
                ]);
                
                toastr()->error('Votre paiement n\'a pas encore été confirmé.');
                return redirect()->route('etudiant.dashboard');
            }

            return view('frontend.checkout.success', [
                'order' => $order,
                'formations' => $order->orderItems->pluck('formation')
            ]);

        } catch (\Exception $e) {
            Log::error('Erreur page success FedaPay : '.$e->getMessage());
            toastr()->error('Une erreur est survenue.');
            return redirect();
        }
    }

    /**
     * Webhook FedaPay pour les confirmations de paiement
     */
}