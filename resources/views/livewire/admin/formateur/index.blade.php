<div>
    @include('livewire.admin.formateur.modal')
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">
                            Gestion des Formateurs
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gestion des Formateurs
                                </li>
                            </ol>
                        </nav>
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
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($formateurs as $formateur)
                                        <tr @if($formateur->is_blocked == 1) style="background-color: #f87171;" @endif>
                                            <td>{{ $formateur->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center flex-row gap-2">
                                                    <img src="{{ asset('assets/images/avatar/avatar-12.jpg') }}"
                                                        alt="" class="rounded-circle avatar-md" />
                                                    <h5 class="mb-0">{{ $formateur->nom }}</h5>
                                                </div>
                                            </td>
                                            <td>{{ $formateur->prenom }}</td>
                                            <td>{{ $formateur->email }}</td>
                                            <td>{{ $formateur->telephone }}</td>
                                            <td class="text-center">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#bs-example-modal-lg"
                                                    class="btn btn-sm bg-success-light me-2 update_modal">
                                                    <i class="fe fe-info"></i>
                                                </a>
                                                @if ($formateur->is_blocked == 1)
                                                    <a href="#" wire:click="debloquer({{ $formateur->id }})" data-bs-toggle="modal" data-bs-target="#unlockTrainerModal"
                                                        class="btn btn-sm bg-success-light me-2 update_modal">
                                                        <i class="fe fe-unlock"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
