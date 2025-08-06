 <div>
     <!-- Section de titre -->
     <section class="py-5">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="bg-light p-4 text-center rounded-3">
                         <h1 class="m-0">Finalisation de votre commande</h1>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Section du formulaire de paiement -->
     <section class="pt-5">
         <div class="container">
             <div class="row g-4 g-sm-5">
                 <!-- Colonne gauche : Formulaire -->
                 <div class="col-xl-8 mb-4 mb-sm-0">
                     <div class="card card-body shadow p-4">
                         <h5 class="mb-3">Informations personnelles</h5>

                         @error('payment_error')
                             <div class="alert alert-danger mb-4">
                                 {{ $message }}
                             </div>
                         @enderror

                         <form wire:submit.prevent="checkout" class="row g-3 mt-2">
                             <!-- Informations étudiant (lecture seule) -->
                             <div class="col-md-6">
                                 <label class="form-label">Nom complet</label>
                                 <input type="text" class="form-control bg-light"
                                     value="{{ Auth::guard('etudiant')->user()->nom }} {{ Auth::guard('etudiant')->user()->prenom }}"
                                     readonly>
                             </div>

                             <div class="col-md-6">
                                 <label class="form-label">Email</label>
                                 <input type="email" class="form-control bg-light"
                                     value="{{ Auth::guard('etudiant')->user()->email }}" readonly>
                             </div>

                             <!-- Adresse de facturation -->
                             <div class="col-md-6">
                                 <label class="form-label">Pays *</label>
                                 <select wire:model="pays" class="form-select" required>
                                     <option value="">Sélectionnez votre pays</option>
                                     @foreach ($paysDisponible as $paysOption)
                                         <option value="{{ $paysOption }}">{{ $paysOption }}</option>
                                     @endforeach
                                 </select>
                                 @error('pays')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             @if (!empty($villesDisponible))
                                 <div class="col-md-6">
                                     <label class="form-label">Ville *</label>
                                     <select wire:model="ville" class="form-select" required>
                                         <option value="">Sélectionnez votre ville</option>
                                         @foreach ($villesDisponible as $villeOption)
                                             <option value="{{ $villeOption }}">{{ $villeOption }}</option>
                                         @endforeach
                                     </select>
                                     @error('ville')
                                         <small class="text-danger">{{ $message }}</small>
                                     @enderror
                                 </div>
                             @endif

                             <div class="col-12">
                                 <label class="form-label">Adresse complète *</label>
                                 <input type="text" wire:model="adresse" class="form-control" required>
                                 @error('adresse')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <div class="col-12">
                                 <label class="form-label">Numéro Mobile Money *</label>
                                 <div class="input-group">
                                     <span class="input-group-text">+</span>
                                     <input type="tel" wire:model="numeroPaiement" class="form-control"
                                         placeholder="Ex: 77000000 pour Orange Mali" required>
                                 </div>
                                 <small class="text-muted">Numéro associé à votre compte Mobile Money</small>
                                 @error('numeroPaiement')
                                     <small class="text-danger">{{ $message }}</small>
                                 @enderror
                             </div>

                             <hr class="my-3">

                             <!-- Méthode de paiement -->
                             <div class="col-12">
                                 <h5 class="mb-3">Méthode de paiement</h5>

                                 <div class="form-check mb-3">
                                     <input class="form-check-input" type="radio" wire:model="paymentMethod"
                                         id="mobileMoney" value="mobile_money" checked>
                                     <label class="form-check-label fw-bold" for="mobileMoney">
                                         Paiement Mobile Money
                                     </label>
                                     <div class="mt-2">
                                         <img src="{{ asset('images/payment/orange-money.png') }}" alt="Orange Money"
                                             height="30" class="me-2">
                                         <img src="{{ asset('images/payment/mtn-momo.png') }}" alt="MTN Mobile Money"
                                             height="30">
                                     </div>
                                 </div>

                                 <div class="form-check">
                                     <input class="form-check-input" type="radio" wire:model="paymentMethod"
                                         id="creditCard" value="card" disabled>
                                     <label class="form-check-label text-muted" for="creditCard">
                                         Carte bancaire (bientôt disponible)
                                     </label>
                                     <div class="mt-2">
                                         <img src="{{ asset('images/payment/visa.png') }}" alt="Visa"
                                             height="20" class="me-2">
                                         <img src="{{ asset('images/payment/mastercard.png') }}" alt="Mastercard"
                                             height="20">
                                     </div>
                                 </div>
                             </div>

                             <!-- CGU et bouton -->
                             <div class="col-12 mt-4">
                                 <div class="form-check">
                                     <input class="form-check-input" type="checkbox" id="cgu" required>
                                     <label class="form-check-label" for="cgu">
                                         J'accepte les <a href="#" target="_blank">conditions générales</a> *
                                     </label>
                                 </div>
                             </div>

                             <div class="col-12 mt-3">
                                 <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                                     <span wire:loading.remove>Payer maintenant</span>
                                     <span wire:loading>
                                         <span class="spinner-border spinner-border-sm" role="status"></span>
                                         Traitement...
                                     </span>
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>

                 <!-- Colonne droite : Récapitulatif -->
                 <div class="col-xl-4">
                     <div class="card card-body shadow p-4">
                         <h4 class="mb-4">Votre commande</h4>

                         @foreach ($carts as $cart)
                             @php
                                 $item = $cart->formation ?? $cart->produitDigital;
                                 $itemType = $cart->formation ? 'formation' : 'produit';
                             @endphp
                             @if ($item)
                                 <div class="d-flex mb-3">
                                     <div class="flex-shrink-0">
                                         <img src="{{ asset($item->image) }}" alt="{{ $item->nom }}"
                                             width="80" class="rounded">
                                     </div>
                                     <div class="flex-grow-1 ms-3">
                                         <h6 class="mb-1">{{ $item->nom }}</h6>
                                         <div class="d-flex justify-content-between">
                                             <span class="text-muted">1 ×</span>
                                             <span class="fw-bold">
                                                 {{ number_format($item->prix_original, 0, ',', ' ') }} FCFA
                                             </span>
                                         </div>
                                     </div>
                                 </div>
                             @endif
                         @endforeach

                         <hr class="my-2">

                         <div class="d-flex justify-content-between mb-2">
                             <span>Sous-total</span>
                             <span class="fw-bold">
                                 {{ number_format(
                                     $carts->sum(function ($cart) {
                                         return optional($cart->formation)->prix_original ?? optional($cart->produitDigital)->prix_original;
                                     }),
                                     0,
                                     ',',
                                     ' ',
                                 ) }}
                                 FCFA
                             </span>
                         </div>

                         <div class="d-flex justify-content-between mb-2">
                             <span>Taxes</span>
                             <span>0 FCFA</span>
                         </div>

                         <hr class="my-2">

                         <div class="d-flex justify-content-between align-items-center mt-3">
                             <span class="h5 mb-0">Total</span>
                             <span class="h5 mb-0 text-primary fw-bold">
                                 {{ number_format(
                                     $carts->sum(function ($cart) {
                                         return optional($cart->formation)->prix_original ?? optional($cart->produitDigital)->prix_original;
                                     }),
                                     0,
                                     ',',
                                     ' ',
                                 ) }}
                                 FCFA
                             </span>
                         </div>

                         <div class="alert alert-info mt-4 small">
                             <i class="fas fa-info-circle me-2"></i>
                             Votre accès sera disponible immédiatement après paiement.
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </section>
 </div>

 @push('scripts')
     <!-- SDK FedaPay -->
     <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>

     <script>
         // Gestion du paiement FedaPay
         // Dans votre fichier Blade
         window.addEventListener('showFedapayCheckout', (e) => {
             FedaPay.checkout({
                 public_key: e.detail.public_key,
                 transaction: {
                     amount: e.detail.amount,
                     currency: {
                         iso: 'XOF'
                     },
                     description: e.detail.description,
                     callback_url: e.detail.callback_url,
                     metadata: e.detail.metadata,
                     customer: e.detail.customer
                 },
                 onSuccess: (response) => {
                     window.livewire.emit('paymentSuccess', {
                         order_id: e.detail.order_id,
                         fedapay_id: response.transaction.id
                     });
                 },
                 onError: (error) => {
                     console.error('Erreur FedaPay:', error);
                     window.livewire.emit('paymentFailed');
                 }
             });
         });
     </script>
 @endpush
