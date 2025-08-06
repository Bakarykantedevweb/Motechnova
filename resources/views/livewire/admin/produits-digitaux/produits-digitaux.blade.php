<div>
    @include('livewire.admin.produits-digitaux.modal')
    <section class="container-fluid py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold">📚 Gestion des Produits Digitaux</h2>
                    <p class="text-muted">Liste des produits digitaux disponibles et leurs détails</p>
                </div>
            </div>
        </div>
        @if ($showDetails)
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <strong>Détails du produit</strong>
                    <button wire:click="$set('showDetails', false)" class="btn btn-sm btn-secondary">Retour à la
                        liste</button>
                </div>
                <div class="card-body">
                    <p><strong>Nom :</strong> {{ $detailNom }}</p>
                    <p><strong>Type :</strong> {{ $detailType }}</p>
                    <p><strong>Description :</strong> {{ $detailDescription }}</p>

                    <p><strong>Image :</strong></p>
                    @if ($detailImage)
                        <img src="{{ asset($detailImage) }}" alt="Image" style="max-width: 200px;" />
                    @else
                        <p>Aucune image disponible</p>
                    @endif

                    <p><strong>Fichier :</strong></p>
                    @if ($detailFichier)
                        <a href="{{ asset($detailFichier) }}" target="_blank">Voir le
                            fichier</a>
                    @else
                        <p>Aucun fichier disponible</p>
                    @endif
                </div>
            </div>
        @else
            <!-- 📦 Liste des produits -->
            <div class="row">
                @forelse($produits as $produit)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ asset($produit->image ?? 'https://via.placeholder.com/600x300?text=Image+Produit') }}"
                                class="card-img-top" alt="Image Produit" style="height: 300px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $produit->nom }}</h5>
                                <small class="text-muted">Type : {{ $produit->type?->nom }}</small>
                                <p class="card-text flex-grow-1">{{ Str::limit($produit->description, 50) }}</p>
                                <p class="fw-bold text-success">Prix :
                                    {{ number_format($produit->prix, 0, ',', ' ') }}
                                    FCFA</p>
                                <p class="mb-2">
                                    @if ($produit->status === 0)
                                        <span class="badge bg-warning">En attente</span>
                                    @elseif($produit->status === 1)
                                        <span class="badge bg-success">Approuvé</span>
                                    @elseif($produit->status === 2)
                                        <span class="badge bg-danger">Rejeté</span>
                                    @endif
                                </p>
                                <div class="mt-auto d-flex justify-content-between">
                                    <button wire:click="showDetails({{ $produit->id }})" class="btn btn-info btn-sm">
                                        <i class="fe fe-eye"></i> Voir
                                    </button>

                                    <!-- Bouton pour ouvrir le modal -->
                                    <button wire:click="showModal({{ $produit->id }})" type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#validerProduitModal">
                                        Valider ce produit
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">Aucun produit trouvé.</div>
                    </div>
                @endforelse
            </div>
        @endif
    </section>
</div>
