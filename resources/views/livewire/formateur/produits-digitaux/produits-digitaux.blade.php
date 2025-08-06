<div>
    <section class="container-fluid py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold">📚 Gestion des Produits Digitaux</h2>
                    <p class="text-muted">Liste des produits digitaux disponibles et leurs détails</p>
                </div>
                @if ($editingProduct)
                    <button wire:click="resetForm" class="btn btn-secondary">⬅ Retour à la liste</button>
                @else
                    <a href="{{ url('formateur/produits-digitaux/create') }}" class="btn btn-primary">
                        + Nouvelle Formation
                    </a>
                @endif
            </div>
        </div>
        @if ($editingProduct)
            <!-- 🔧 Formulaire de modification -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    ✏️ Modifier le produit
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="mb-3">
                            <label class="form-label">Nom du produit</label>
                            <input type="text" class="form-control" wire:model="titre">
                            @error('titre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" wire:model="description"></textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Prix (FCFA)</label>
                            <input type="number" class="form-control" wire:model="prix">
                            @error('prix')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Type</label>
                            <select class="form-control" wire:model="type_produit_digital_id">
                                <option value="">-- Sélectionnez --</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                @endforeach
                            </select>
                            @error('type_produit_digital_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" wire:model="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            {{-- Aperçu image temporaire si upload en cours --}}
                            @if ($image)
                                <div class="mt-2">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Aperçu image"
                                        style="max-height: 150px;" class="img-thumbnail">
                                </div>
                            @elseif ($editingProduct && $editingProduct->image)
                                {{-- Sinon afficher l’image stockée en base --}}
                                <div class="mt-2">
                                    <img src="{{ asset($editingProduct->image) }}" alt="Image enregistrée"
                                        style="max-height: 150px;" class="img-thumbnail">
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fichier</label>
                            <input type="file" class="form-control" wire:model="fichier">
                            @error('fichier')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            {{-- Lien vers fichier temporaire si upload --}}
                            @if ($fichier)
                                <div class="mt-2">
                                    <a href="{{ $fichier->temporaryUrl() }}" target="_blank"
                                        class="btn btn-outline-primary btn-sm">
                                        Voir le fichier (temporaire)
                                    </a>
                                </div>
                            @elseif ($editingProduct && $editingProduct->fichier)
                                {{-- Sinon lien vers fichier enregistré --}}
                                <div class="mt-2">
                                    <a href="{{ asset($editingProduct->fichier) }}" target="_blank"
                                        class="btn btn-outline-primary btn-sm">
                                        Voir le fichier enregistré
                                    </a>
                                </div>
                            @endif
                        </div>

                        <button class="btn btn-success">💾 Mettre à jour</button>
                    </form>
                </div>
            </div>
        @elseif ($showDetails)
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

                                    <button wire:click="edit({{ $produit->id }})"
                                        class="btn btn-sm btn-outline-secondary">Modifier</button>
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
