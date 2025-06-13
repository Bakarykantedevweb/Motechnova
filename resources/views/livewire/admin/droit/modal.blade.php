<div wire:ignore.self class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Nouveau Droit
                </h4>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveDroit">
                    <div class="form-group">
                        <label>Type Droit <span class="text-danger">*</span></label>
                        <select wire:model="type_droit_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($type_droits as $items)
                                <option value="{{ $items->id }}">{{ $items->nom }}</option>
                            @endforeach
                        </select>
                        @error('type_droit_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Access <span class="text-danger">*</span></label>
                        <select wire:model="acces" id="" class="form-control">
                            <option>--Choisir---</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('acces')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Route <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="route" type="text">
                        @error('route')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="edit_custom_policy" tabindex="-1" role="dialog"
    aria-labelledby="newCatgoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Modification Droit
                </h4>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="UpdateDroit">
                    <div class="form-group">
                        <label>Type Droit <span class="text-danger">*</span></label>
                        <select wire:model="type_droit_id" class="form-control">
                            <option value="">---</option>
                            @foreach ($type_droits as $items)
                                <option value="{{ $items->id }}">{{ $items->nom }}</option>
                            @endforeach
                        </select>
                        @error('type_droit_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="nom" type="text">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Access <span class="text-danger">*</span></label>
                        <select wire:model="acces" id="" class="form-control">
                            <option>--Choisir---</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('acces')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Route <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="route" type="text">
                        @error('route')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

