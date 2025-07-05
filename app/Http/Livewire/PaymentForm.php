<?php

namespace App\Http\Livewire;

use Livewire\Component;
use FedaPay\FedaPay;
use FedaPay\Transaction;

class PaymentForm extends Component
{
    // Propriétés publiques liées aux champs du formulaire
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $amount;

    protected $rules = [
        'firstname' => 'required|string',
        'lastname'  => 'required|string',
        'email'     => 'required|email',
        'phone'     => 'required|string',
        'amount'    => 'required|numeric|min:1'
    ];

    public function submitPayment()
    {
        $this->validate(); // Validation des champs du formulaire

        // Initialisation de l'API FedaPay avec la clé et l'environnement sandbox
        FedaPay::setApiKey(env('FEDAPAY_SECRET_SANDBOX'));
        FedaPay::setEnvironment('sandbox');

        try {
            // Création d'un nouveau client (customer) et d'une transaction FedaPay
            $transaction = Transaction::create([
                "description" => "Paiement de {$this->amount} XOF pour {$this->email}",
                "amount"      => intval($this->amount),      // Montant en XOF (entier)
                "currency"    => ["iso" => "XOF"],           // Devise XOF (FCFA)
                "callback_url"=> route('payment.callback', [], true), // URL de retour après paiement
                "customer"    => [  // Informations du client
                    "firstname"    => $this->firstname,
                    "lastname"     => $this->lastname,
                    "email"        => $this->email,
                    "phone_number" => [
                        "number"  => $this->phone, 
                        "country" => "bj"          // Code pays (ex: 'bj' pour Bénin, à adapter si besoin)
                    ]
                ]
            ]);
            // Génération du lien de paiement (token URL) fourni par FedaPay
            $token = $transaction->generateToken();
            // Redirection du client vers la page de paiement sécurisée FedaPay
            return redirect()->away($token->url);
        } catch (\Exception $e) {
            // En cas d'erreur API, on peut gérer l'exception ici
            session()->flash('error', "Erreur de paiement : " . $e->getMessage());
            return null;
        }
    }

    public function render()
    {
        return view('livewire.payment-form');
    }
}

