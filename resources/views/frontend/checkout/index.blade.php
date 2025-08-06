{{-- resources/views/frontend/checkout/index.blade.php --}}
@extends('layouts.frontend')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="text-center">Finalisation de votre commande</h1>
        </div>
    </section>

    <section class="pt-5">
        <div class="container">
            <form action="{{ route('checkout.pay') }}" method="POST" class="row g-4 g-sm-5">
                @csrf
                <div class="col-xl-8">
                    <div class="card card-body shadow p-4">
                        <h5>Informations personnelles</h5>

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        {{-- Étudiant --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Nom complet</label>
                                <input type="text" class="form-control"
                                    value="{{ $etudiant->nom }} {{ $etudiant->prenom }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $etudiant->email }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Pays *</label>
                                <input type="text" class="form-control" name="pays" value="{{ old('pays') }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Ville *</label>
                                <input type="text" class="form-control" name="ville" value="{{ old('ville') }}"
                                    required>
                            </div>
                            <div class="col-12">
                                <label>Adresse complète *</label>
                                <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}"
                                    required>
                            </div>
                            <div class="col-12">
                                <label>Numéro Mobile Money *</label>
                                <input type="tel" class="form-control" name="numeroPaiement"
                                    value="{{ old('numeroPaiement') }}" required>
                                <small class="text-muted">Numéro associé à votre compte Mobile Money</small>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- Méthode de paiement --}}
                        <h5>Méthode de paiement</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" value="mobile_money"
                                id="mobileMoney" checked>
                            <label class="form-check-label fw-bold" for="mobileMoney">Mobile Money</label>
                        </div>
                        <div class="form-check text-muted">
                            <input class="form-check-input" type="radio" name="paymentMethod" value="card"
                                id="creditCard" disabled>
                            <label class="form-check-label" for="creditCard">Carte bancaire (bientôt disponible)</label>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" required>
                            <label class="form-check-label">J'accepte les <a href="#">conditions générales</a></label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-4 py-2 fw-bold">Payer maintenant</button>
                    </div>
                </div>

                {{-- Récapitulatif --}}
                <div class="col-xl-4">
                    <div class="card border shadow-none">
                        <div class="card-body">
                            <h5 class="mb-4">Votre commande</h5>
    
                            @foreach ($carts as $cart)
                                @php
                                    $item = $cart->formation ?? $cart->produitDigital;
                                    $itemType = $cart->formation ? 'formation' : 'produit';
                                    $itemNom = $itemType === 'formation' ? $item->nom : $item->titre;
                                    $itemPrix = $itemType === 'formation' ? $item->prix_original : $item->prix;
                                @endphp
    
                                @if ($item)
                                    <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset($item->image) }}" alt="{{ $itemNom }}" width="80"
                                                class="rounded">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">{{ $itemNom }}</h6>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">1 ×</span>
                                                <span class="fw-bold">
                                                    {{ number_format($itemPrix, 0, ',', ' ') }} FCFA
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
    
                            <hr>
    
                            @php
                                $total = $carts->sum(function ($cart) {
                                    if ($cart->formation) {
                                        return $cart->formation->prix_original;
                                    } elseif ($cart->produitDigital) {
                                        return $cart->produitDigital->prix;
                                    }
                                    return 0;
                                });
                            @endphp
    
                            <div class="d-flex justify-content-between mb-2">
                                <span>Sous-total</span>
                                <span class="fw-bold">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                            </div>
    
                            <div class="d-flex justify-content-between">
                                <span>Total</span>
                                <span class="fw-bold text-primary fs-5">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
