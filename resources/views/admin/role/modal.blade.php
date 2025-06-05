<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Ajouter un role
                </h4>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('role.store') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nom du Role <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Etat <span class="text-danger">*</span></label>
                            <select name="type" id="" class="form-control">
                                <option value="" selected disabled>Choisir</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <h3 class="text-center mb-2">Listes des droits</h3>
                    <div class="row">
                        @foreach ($droits as $droit)
                            <div class="col-md-4 mb-3">
                                <div class="card border-primary shadow-sm h-100">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="role_droits[]"
                                                id="id{{ $droit->id }}" value="{{ $droit->id }}">
                                            <label class="form-check-label fw-bold text-primary"
                                                for="id{{ $droit->id }}">
                                                {{ $droit->nom }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit_custom_policy" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Modifier le role
                </h4>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('role.update') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="hidden" id="e_role_id" name="id">
                            <label>Nom du Role <span class="text-danger">*</span></label>
                            <input type="text" id="e_role_nom" class="form-control" name="nom">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Etat <span class="text-danger">*</span></label>
                            <select name="type" id="e_role_type" class="form-control">
                                <option value="" selected disabled>Choisir</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <h3 class="text-center mb-2">Listes des droits</h3>
                    <div class="row" id="droits_listes">

                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
