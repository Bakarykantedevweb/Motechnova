<div>
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">
                            Gestion des Formations
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gestion des Formations
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nav btn-group" role="tablist">
                        <div>
                            <a href="{{ url('formateur/formations') }}" class="btn btn-primary">Listes des
                                Formations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-6">
            <!-- row -->
            <div class="row">
                <div class="offset-xl-12 col-xl-12 col-md-12 col-12">
                    <!-- card -->
                    <div class="card">
                        <!-- card body -->
                        <div class="card-body p-lg-6">
                            <!-- form -->
                            <form wire:submit.prevent="saveFormation" class="row gx-3 needs-validation">

                                <div class="mb-3 col-6">
                                    <label class="form-label">
                                        Nom de la formation <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" wire:model.defer="nom" required />
                                    @error('nom')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label" for="teamMembers">Catégories</label>
                                    <select class="form-select" wire:model="categorie_id">
                                        <option value="">---</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label">
                                        Prix Original <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="number" min="1"
                                        wire:model.defer="prix_original" required />
                                    @error('prix_original')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label">Prix Promotion</label>
                                    <input class="form-control" type="number" min="1"
                                        wire:model.defer="prix_promotion" />
                                    @error('prix_promotion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label">
                                        Date de création <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group me-3">
                                        <input class="form-control flatpickr" type="text"
                                            wire:model="date_creation" />
                                        <span class="input-group-text"><i class="fe fe-calendar"></i></span>
                                    </div>
                                    @error('date_creation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label">Niveaux</label>
                                    <select class="form-control" wire:model="niveau">
                                        <option value="">---</option>
                                        <option value="Débutant">Débutant</option>
                                        <option value="Intermédiaire">Intermédiaire</option>
                                        <option value="Expert">Expert</option>
                                    </select>
                                    @error('niveau')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-6">
                                    <label class="form-label">
                                        Image de la formation <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" wire:model="image" />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6 col-12">
                                    <label class="form-label">Formation Payante</label>
                                    <select class="form-control" wire:model="selectedOption">
                                        <option value="">---</option>
                                        @foreach ($options as $option => $inputType)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedOption')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($selectedOption == 'Oui')
                                    <div class="mb-3 col-12">
                                        <label class="form-label">
                                            Video de presentation 
                                        </label>
                                        <input type="text" placeholder="https://www.youtube.com/..." class="form-control" wire:model="video_presentation" />
                                        @error('video_presentation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                                <div class="mb-3 col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" wire:model.defer="description" rows="3" required></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12 mb-3">
                                    <button class="btn btn-primary" wire:click.prevent="addModule" type="button"> <i
                                            class="fe fe-plus-circle"></i> Ajouter un module</button>
                                </div>
                                <div class="col-12 mb-3">
                                    <h5>Modules</h5>
                                    @foreach ($modules as $index => $module)
                                        <div class="card p-3 mb-3">
                                            <div class="mb-2">
                                                <label>Titre du Module {{ $index + 1 }}</label>
                                                <input type="text" class="form-control"
                                                    wire:model="modules.{{ $index }}.titre" />
                                            </div>

                                            <div class="mb-2">
                                                <h6>Chapitres</h6>
                                                @foreach ($module['chapitres'] as $chapitreIndex => $chapitre)
                                                    <div class="border rounded p-2 mb-2">
                                                        <div class="mb-2">
                                                            <label class="form-label">Nom du chapitre
                                                                {{ $chapitreIndex + 1 }}</label>
                                                            <input type="text" class="form-control"
                                                                wire:model="modules.{{ $index }}.chapitres.{{ $chapitreIndex }}.nom"
                                                                placeholder="Titre du chapitre">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label class="form-label">URL de la vidéo</label>
                                                            <input type="text" class="form-control"
                                                                wire:model="modules.{{ $index }}.chapitres.{{ $chapitreIndex }}.url_video"
                                                                placeholder="https://youtube.com/...">
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            wire:click="removeChapitre({{ $index }}, {{ $chapitreIndex }})">
                                                            Supprimer ce chapitre
                                                        </button>
                                                    </div>
                                                @endforeach

                                                <button type="button" class="btn btn-outline-primary btn-sm"
                                                    wire:click="addChapitre({{ $index }})">
                                                    + Ajouter un chapitre
                                                </button>
                                            </div>

                                            <button type="button" class="btn btn-outline-danger btn-sm mt-2"
                                                wire:click="removeModule({{ $index }})">
                                                Supprimer ce module
                                            </button>
                                        </div>
                                    @endforeach

                                    {{-- <button class="btn btn-primary" type="button" wire:click="addModule">
                                        <i class="fe fe-plus-circle"></i> Ajouter un module
                                    </button> --}}
                                </div>
                                <!-- button -->
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">
                                        Submit
                                    </button>
                                    <button type="button" class="btn btn-outline-primary ms-2"
                                        data-bs-dismiss="offcanvas" aria-label="Close">
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
