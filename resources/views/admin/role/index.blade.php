@extends('layouts.admin')
@section('content')
    @include('admin.role.modal')
    <!-- Container fluid -->
    <section class="container-fluid p-4">
        <div class="row">
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
                <div class="border-bottom pb-3 mb-3 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">
                            Gestion des roles
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Gestion des roles
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nav btn-group" role="tablist">
                        <div>
                            <a href="" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg"
                                class="btn btn-primary">Ajouter un role</a>
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
                                        <th class="l-name" style="width: 30px;">#</th>
                                        <th class="l-name">Nom</th>
                                        <th class="l-days">Etat</th>
                                        <th class="l-assignee">Utilisateurs</th>
                                        <th class="l-assignee">Droits</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="role_id">{{ $role->id }} </td>
                                            <td class="role_nom">{{ $role->nom }}</td>
                                            <td class="d-none type_id">{{ $role->type }}</td>
                                            <td class="type_nom">
                                                {{-- {{ $role->type == 1 ? 'Active' : 'Non active' }} --}}
                                                @if ($role->type == 1)
                                                    <span class="btn btn-success btn-sm">Active</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Non active</span>
                                                @endif
                                            </td>
                                            <td>{{ count($role->users) }} </td>
                                            <td>{{ count($role->droits) }}</td>
                                            <td class="text-end">
                                                <div class="actions">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#edit_custom_policy"
                                                        class="btn btn-sm bg-success-light me-2 update_modal">
                                                        <i class="fe fe-edit"></i>
                                                    </a>
                                                    {{-- <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#delete_custom_policy"
                                                        class="btn btn-sm bg-danger-light delete_modal">
                                                        <i class="fe fe-trash"></i>
                                                    </a> --}}
                                                </div>
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
@endsection
@section('script')
    <script>
        $(document).on('click', '.update_modal', function() {
            var _this = $(this).closest('tr'); // plus fiable
            var role_id = _this.find('.role_id').text().trim();
            var role_nom = _this.find('.role_nom').text().trim();
            var type_id = _this.find('.type_id').text().trim(); // 1 ou 0
            var type_nom = _this.find('.type_nom span').text().trim(); // "Active" ou "Non active"

            // Remplir le formulaire du modal
            $('#e_role_id').val(role_id);
            $('#e_role_nom').val(role_nom);

            // Met à jour proprement le select du type
            $('#e_role_type').html(''); // vide les anciennes options
            $('#e_role_type').append('<option selected value="' + type_id + '">' + type_nom + '</option>');

            // Charger les droits non associés
            $.ajax({
                url: '/admin/exceptDroit',
                type: 'POST',
                data: {
                    id: role_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resultat) {
                    $('#edit_customleave_select').html(resultat);
                }
            });

            // Charger les droits déjà associés (checkboxes)
            $.ajax({
                url: '/admin/getDroit',
                type: 'POST',
                data: {
                    id: role_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(resultat) {
                    $('#droits_listes').html(resultat);
                }
            });
        });
    </script>
@endsection
