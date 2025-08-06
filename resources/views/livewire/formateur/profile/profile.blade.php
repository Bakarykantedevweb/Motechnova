<div>
    <section class="pt-5 pb-5">
        <div class="container">
            <!-- Content -->
            <div class="row ml-3 mt-0 mt-md-4">
                <div class="col-lg-12 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Détails du profil</h3>
                            <p class="mb-0">
                                Vous avez le contrôle total pour gérer les paramètres de votre propre compte.
                            </p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    <img src="{{ asset('uploads/formateur/' . Auth::guard('formateur')->user()->photo) }}" id="img-uploaded"
                                        class="avatar-xl rounded-circle" alt="avatar" />
                                    &nbsp;&nbsp;
                                    <div class="lh-1">
                                        <h2 class="mb-0">
                                            {{ Auth::guard('formateur')->user()->prenom . ' ' . Auth::guard('formateur')->user()->nom }}
                                            <a href="#" data-bs-toggle="tooltip" data-placement="top"
                                                title="Beginner">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect x="3" y="8" width="2" height="6" rx="1"
                                                        fill="#754FFE"></rect>
                                                    <rect x="7" y="5" width="2" height="9" rx="1"
                                                        fill="#DBD8E9"></rect>
                                                    <rect x="11" y="2" width="2" height="12" rx="1"
                                                        fill="#DBD8E9"></rect>
                                                </svg>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-5" />
                            <div>
                                <h4 class="mb-0">Détails personnels</h4>
                                <p class="mb-4">
                                    Modifiez vos informations personnelles et votre adresse.
                                </p>
                                <!-- Form -->
                                <form wire:submit.prevent="update" class="row g-3" enctype="multipart/form-data">
                                    <!-- Nom -->
                                    <div class="col-md-6">
                                        <label class="form-label">Nom</label>
                                        <input type="text" class="form-control" wire:model.defer="nom"
                                            placeholder="Nom">
                                        @error('nom')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Prénom -->
                                    <div class="col-md-6">
                                        <label class="form-label">Prénom</label>
                                        <input type="text" class="form-control" wire:model.defer="prenom"
                                            placeholder="Prénom">
                                        @error('prenom')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" wire:model.defer="email"
                                            placeholder="Email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Téléphone -->
                                    <div class="col-md-6">
                                        <label class="form-label">Téléphone</label>
                                        <input type="text" class="form-control" wire:model.defer="telephone"
                                            placeholder="Téléphone">
                                        @error('telephone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Pays -->
                                    <div class="col-md-6">
                                        <label class="form-label">Pays</label>
                                        <input type="text" class="form-control" wire:model.defer="pays"
                                            placeholder="Pays">
                                        @error('pays')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Ville -->
                                    <div class="col-md-6">
                                        <label class="form-label">Ville</label>
                                        <input type="text" class="form-control" wire:model.defer="ville"
                                            placeholder="Ville">
                                        @error('ville')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Spécialités -->
                                    <div class="col-md-12">
                                        <label class="form-label">Spécialités (ex: Frontend, UX, DevOps)</label>
                                        <input type="text" class="form-control" wire:model.defer="specialites"
                                            placeholder="Séparées par des virgules">
                                        @error('specialites')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="4" wire:model.defer="description" placeholder="Parlez de vous..."></textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Mot de passe -->
                                    <div class="col-md-6">
                                        <label class="form-label">Mot de passe</label>
                                        <input type="password" class="form-control" wire:model.defer="password"
                                            placeholder="Nouveau mot de passe">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <!-- Confirmation -->
                                    <div class="col-md-6">
                                        <label class="form-label">Confirmation</label>
                                        <input type="password" class="form-control"
                                            wire:model.defer="password_confirmation"
                                            placeholder="Confirmer mot de passe">
                                    </div>

                                    <!-- Photo -->
                                    <div class="col-md-12">
                                        <label class="form-label">Photo</label>
                                        <input type="file" class="form-control" wire:model="photo">
                                        @error('photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror

                                        <!-- Preview image -->
                                        @if ($photo)
                                            <div class="mt-2">
                                                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail"
                                                    width="150">
                                            </div>
                                        @elseif ($photo_url)
                                            <div class="mt-2">
                                                <img src="{{ asset('uploads/formateur/' . $photo_url) }}"
                                                    class="img-thumbnail" width="150">
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Submit -->
                                    <div class="col-12">
                                        <button class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
