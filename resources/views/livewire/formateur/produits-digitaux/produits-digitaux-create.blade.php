<div>
    <section class="container-fluid py-4">
        <!-- ✅ En-tête de la page -->
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold">📚 Gestion des Produits Digitaux</h2>
                    <p class="text-muted">Formulaire d'ajout d'un nouveau produit digital</p>
                </div>
                <a href="{{ url('formateur/produits-digitaux') }}" class="btn btn-primary">
                    Retour
                </a>
            </div>
        </div>

        <!-- ✅ Formulaire dans une carte -->
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card shadow-sm">
                    <!-- Header de la card -->
                    <div class="card-header bg-primary text-white fw-semibold">
                        📝 Nouveau Produit Digital
                    </div>

                    <!-- Body avec le formulaire -->
                    <div class="card-body">
                        <form wire:submit.prevent="store" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Titre -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Titre du produit <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model.defer="titre">
                                    @error('titre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Type de produit <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model.defer="type_produit_digital_id">
                                        <option value="">-- Sélectionner --</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_produit_digital_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Prix -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Prix (en FCFA)</label>
                                    <input type="number" class="form-control" wire:model.defer="prix" step="0.01"
                                        min="0">
                                    @error('prix')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Image de couverture</label>
                                    <input type="file" class="form-control" wire:model="image">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="Preview"
                                            class="img-thumbnail mt-2" width="150">
                                    @endif
                                </div>

                                <!-- Fichier du produit -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Fichier numérique (PDF, audio, etc.) <span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" wire:model="fichier">
                                    @error('fichier')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" wire:model.defer="description" rows="4"></textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">💾 Enregistrer</button>
                        </form>
                    </div> <!-- Fin card-body -->
                </div> <!-- Fin card -->
            </div>
        </div>
    </section>
</div>
