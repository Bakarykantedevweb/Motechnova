<div wire:ignore.self class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Nouvel Utilisateur
                </h4>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="saveUser">
                    <div class="form-group">
                        <label>Type Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role_type_user_id" class="form-control">
                            <option>---</option>
                            @forelse ($role_name as $type_user)
                                <option value="{{ $type_user->id }}">{{ $type_user->role_type }}</option>
                            @empty
                                <option selected disabled>Pas de Type Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role_type_user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role" class="form-control">
                            <option>---</option>
                            @forelse ($roles as $user)
                                <option value="{{ $user->id }}">{{ $user->nom }}</option>
                            @empty
                                <option selected disabled>Pas de Role Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom Complet <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="name" type="text">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>E-mail <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="email" type="email">
                        @error('email')
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


<div wire:ignore.self class="modal fade" id="edit_custom_policy" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="newCatgoryLabel">
                    Modifier Utilisateur
                </h4>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="UpdateUser">
                    <div class="form-group">
                        <label>Type Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role_type_user_id" class="form-control">
                            <option>---</option>
                            @forelse ($role_name as $type_user)
                                <option value="{{ $type_user->id }}">{{ $type_user->role_type }}</option>
                            @empty
                                <option selected disabled>Pas de Type Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role_type_user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role Utilisteur <span class="text-danger">*</span></label>
                        <select wire:model="role" class="form-control">
                            <option>---</option>
                            @forelse ($roles as $user)
                                <option value="{{ $user->id }}">{{ $user->nom }}</option>
                            @empty
                                <option selected disabled>Pas de Role Utilisateur</option>
                            @endforelse
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nom Complet <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="name" type="text">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>E-mail <span class="text-danger">*</span></label>
                        <input class="form-control" wire:model="email" type="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Mettre a jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>