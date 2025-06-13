<div>
    @include('livewire.admin.droit.modal')
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">
                            Gestion des Permissions
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gestion des Permissions
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nav btn-group" role="tablist">
                        <div>
                            <a href="" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"
                                class="btn btn-primary">Ajouter une Permission</a>
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
                                        <th>Access</th>
                                        <th>Route</th>
                                        <th>Type Droit</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($droits as $items)
                                        <tr>
                                            <td>{{ $items->id }}</td>
                                            <td>{{ $items->nom }}</td>
                                            <td>
                                                @if ($items->acces == 1)
                                                    <span class="btn btn-success btn-sm">Activer</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Desactiver</span>
                                                @endif
                                            </td>
                                            <td>{{ Route($items->route) }}</td>
                                            <td>{{ $items->type_droit->nom }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="#" wire:click="editDroit({{ $items->id }})" data-bs-toggle="modal"
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
                            </table>
                        </div>
                    </div>
                    <br>
                    {{ $droits->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
