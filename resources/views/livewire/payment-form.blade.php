<div>
    <h2>Effectuer un paiement</h2>
    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="submitPayment">
        <!-- Champs du formulaire de paiement -->
        <div>
            <label>Prénom :</label>
            <input type="text" wire:model="firstname" required>
        </div>
        <div>
            <label>Nom :</label>
            <input type="text" wire:model="lastname" required>
        </div>
        <div>
            <label>Email :</label>
            <input type="email" wire:model="email" required>
        </div>
        <div>
            <label>Téléphone (avec indicatif) :</label>
            <input type="text" wire:model="phone" required placeholder="+229XXXXXXXX">
        </div>
        <div>
            <label>Montant (en XOF) :</label>
            <input type="number" wire:model="amount" required min="1">
        </div>

        <button type="submit">Payer avec FedaPay</button>
    </form>
</div>
