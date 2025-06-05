<div>
    @include('livewire.admin.user.modal')
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">
                            Gestion des Utilisateurs
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gestion des Utilisateurs
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nav btn-group" role="tablist">
                        <div>
                            <a href="" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"
                                class="btn btn-primary">Ajouter un Utilisateur</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!-- Tab -->
                <div class="tab-content">
                    <!-- card -->
                    <div class="card">
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table mb-0 text-nowrap table-hover table-centered">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Nom</th>
                                        <th>E-mail</th>
                                        <th>Type Utilisateur</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $items)
                                        <tr>
                                            <td>{{ $items->id }}</td>
                                            <td>
                                                <a href="#">{{ $items->name }}</a>
                                            </td>
                                            <td>{{ $items->email }}</td>
                                            <td>{{ $items->role_type_user->role_type }}</td>
                                            <td>{{ $items->role->nom }}</td>
                                            <td>
                                                @if ($items->role->type == 1)
                                                    <span class="btn btn-success btn-sm">Active</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Inactive</span>
                                                @endif
                                            </td>
                                             <td class="text-end">
                                                <div class="actions">
                                                    <a href="#" wire:click="editUser({{ $items->id }})" data-bs-toggle="modal"
                                                        data-bs-target="#edit_custom_policy"
                                                        class="btn btn-sm bg-success-light me-2 update_modal">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Pas de Departements</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
