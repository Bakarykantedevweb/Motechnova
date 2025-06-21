<div>
        <section class="container d-flex flex-column vh-100">
        <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
            <div class="col-lg-8 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow">
                    <!-- Card body -->
                    <div class="card-body p-4  d-flex flex-column gap-4">
                        <div>
                            <div class="d-flex flex-column gap-1">
                                <h1 class="mb-0 fw-bold text-center">Création de compte Etudiant</h1>
                                <span>
                                    Avez-vous un compte?
                                    <a href="{{ url('etudiant/login') }}" class="ms-1">Se Connecter</a>
                                </span>
                            </div>
                        </div>
                        <!-- Form -->
                        <form wire:submit.prevent="register" class="row">
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">Nom</label>
                                <input type="text" id="" class="form-control" wire:model="nom"
                                    placeholder="Nom"  />
                                @error('nom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">Prenom</label>
                                <input type="text" id="" class="form-control" wire:model="prenom"
                                    placeholder="Prenom"  />
                                @error('prenom')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">Email</label>
                                <input type="email" id="" class="form-control" wire:model="email"
                                    placeholder="Email"  />
                                 @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">Telephone</label>
                                <input type="text" id="" class="form-control" wire:model="telephone"
                                    placeholder="Telephone"  />
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">Mot de passe</label>
                                <input type="password" id="" class="form-control" wire:model="password"
                                    placeholder="**************"  />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="" class="form-label">Confirmer mot de passe</label>
                                <input type="password" id="" class="form-control"
                                    wire:model="password_confirmation" placeholder="**************"  />
                                <div class="invalid-feedback">
                                    Please enter valid password.
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="agreeCheck"  />
                                    <label class="form-check-label" for="agreeCheck">
                                        <span>
                                            I agree to the
                                            <a href="terms-condition-page.html">Terms of Service</a>
                                            and
                                            <a href="terms-condition-page.html">Privacy Policy.</a>
                                        </span>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div> --}}
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        Creez votre compte
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
