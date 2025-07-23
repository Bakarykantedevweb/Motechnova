<div>
    <section class="pt-5 pb-5">
        <div class="container">
            <!-- User info -->
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class="rounded-top"
                        style="
                  background: url({{ asset('assets/images/background/profile-bg.jpg') }})
                    no-repeat;
                  background-size: cover;
                  height: 100px;
                ">
                    </div>
                    <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                    <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                                        class="avatar-xl rounded-circle border border-4 border-white position-relative"
                                        alt="avatar" />
                                    <a href="#" class="position-absolute top-0 end-0" data-bs-toggle="tooltip"
                                        data-placement="top" title="Verified">
                                        <img src="{{ asset('assets/images/svg/checked-mark.svg') }}" alt="checked"
                                            height="30" width="30" />
                                    </a>
                                </div>
                                <div class="lh-1">
                                    <h2 class="mb-0">
                                        {{ Auth::guard('etudiant')->user()->prenom . ' ' . Auth::guard('etudiant')->user()->nom }}
                                    </h2>
                                    <p class="mb-0 d-block">@Jennywilson</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->

            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- User profile -->
                    <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
                        <!-- Menu -->
                        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
                        <!-- Button -->
                        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light"
                            type="button" data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fe fe-menu"></span>
                        </button>
                        <!-- Collapse -->
                        <div class="collapse navbar-collapse" id="sidenav">
                            <div class="navbar-nav flex-column">
                                <span class="navbar-header">Tableau de Bord</span>
                                <ul class="list-unstyled ms-n2 mb-4">
                                    <!-- Nav item -->
                                    <li class="nav-item {{ $dashboard ? ' active' : '' }}">
                                        <a class="nav-link" wire:click="activeContent('{{ encrypt('dashboard') }}')"
                                            href="#">
                                            <i class="fe fe-home nav-icon"></i>
                                            Tableau de Bord
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item {{ $cours ? ' active' : '' }}">
                                        <a class="nav-link" href="#"
                                            wire:click="activeContent('{{ encrypt('cours') }}')">
                                            <i class="fe fe-book nav-icon"></i>
                                            Mes cours
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="instructor-quiz.html">
                                            <i class="fe fe-help-circle nav-icon"></i>
                                            Quiz
                                        </a>
                                    </li>
                                </ul>
                                <!-- Navbar header -->
                                <span class="navbar-header">Paramètres du compte</span>
                                <ul class="list-unstyled ms-n2 mb-0">
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="profile-edit.html">
                                            <i class="fe fe-settings nav-icon"></i>
                                            Modifier le profil
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link {{ $securite ? ' active' : '' }}" href="#"
                                            wire:click="activeContent('{{ encrypt('securite') }}')">
                                            <i class="fe fe-user nav-icon"></i>
                                            Sécurité
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="delete-profile.html">
                                            <i class="fe fe-trash nav-icon"></i>
                                            Supprimer le compte
                                        </a>
                                    </li>
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="../index.html">
                                            <i class="fe fe-power nav-icon"></i>
                                            Deconnexion
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    @if ($dashboard)
                        <div class="db-content">
                            <div class="container mb-4">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h1 class="h2 mb-0">My Dashboard</h1>
                                    </div>
                                </div>
                                <div class="row mb-5 g-4 gy-lg-0">
                                    <div class="col-xxl-12 col-lg-12 col-12">
                                        <div class="card h-100">
                                            <div class="card-body d-flex flex-column gap-4 p-4">
                                                <div class="d-flex flex-column gap-2">
                                                    <div class="d-flex flex-row justify-content-between">
                                                        <img src="../assets/images/avatar/avatar-1.jpg" alt="avatar"
                                                            class="avatar avatar-xl rounded-circle" />
                                                        <a href="#!"
                                                            class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                            data-bs-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-pencil"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-column gap-1">
                                                        <h2 class="h3 mb-0">Hello,
                                                            {{ Auth::guard('etudiant')->user()->prenom . ' ' . Auth::guard('etudiant')->user()->nom }}
                                                        </h2>
                                                        {{-- <span class="fs-6 fw-medium">ID: 98765</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($cours)
                        <div class="db-content">
                            {{-- <div class="container mb-4">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h1 class="h2 mb-0">Mes Cours</h1>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <div>
                                                <svg width="16" height="16" viewBox="0 0 16 16"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_8175_5628)">
                                                        <path
                                                            d="M8.211 2.0467C8.14491 2.01594 8.07289 2 8 2C7.9271 2 7.85508 2.01594 7.789 2.0467L0.288996 5.5467C0.200678 5.58793 0.126334 5.65406 0.0751066 5.73698C0.0238794 5.81989 -0.00199738 5.91597 0.000658795 6.0134C0.00331497 6.11083 0.0343882 6.20536 0.0900571 6.28536C0.145726 6.36536 0.223563 6.42735 0.313996 6.4637L7.814 9.4637C7.93338 9.51155 8.06661 9.51155 8.186 9.4637L14 7.1397V12.9997C13.7348 12.9997 13.4804 13.1051 13.2929 13.2926C13.1054 13.4801 13 13.7345 13 13.9997V15.9997H16V13.9997C16 13.7345 15.8946 13.4801 15.7071 13.2926C15.5196 13.1051 15.2652 12.9997 15 12.9997V6.7387L15.686 6.4637C15.7764 6.42735 15.8543 6.36536 15.9099 6.28536C15.9656 6.20536 15.9967 6.11083 15.9993 6.0134C16.002 5.91597 15.9761 5.81989 15.9249 5.73698C15.8737 5.65406 15.7993 5.58793 15.711 5.5467L8.211 2.0467ZM8 8.4597L1.758 5.9647L8 3.0517L14.242 5.9647L8 8.4597Z"
                                                            fill="#64748B" />
                                                        <path
                                                            d="M4.176 9.0321C4.11162 9.00784 4.04292 8.99714 3.97421 9.00065C3.9055 9.00416 3.83825 9.02182 3.77668 9.05251C3.7151 9.08321 3.66053 9.12628 3.61636 9.17903C3.57219 9.23179 3.53939 9.29309 3.52 9.3591L3.02 11.0591C2.98498 11.1784 2.9957 11.3066 3.05006 11.4184C3.10442 11.5303 3.19853 11.6179 3.314 11.6641L7.814 13.4641C7.93339 13.5119 8.06662 13.5119 8.186 13.4641L12.686 11.6641C12.8015 11.6179 12.8956 11.5303 12.9499 11.4184C13.0043 11.3066 13.015 11.1784 12.98 11.0591L12.48 9.3591C12.4606 9.29309 12.4278 9.23179 12.3836 9.17903C12.3395 9.12628 12.2849 9.08321 12.2233 9.05251C12.1618 9.02182 12.0945 9.00416 12.0258 9.00065C11.9571 8.99714 11.8884 9.00784 11.824 9.0321L8 10.4661L4.176 9.0321ZM4.108 10.9051L4.328 10.1571L7.824 11.4681C7.93746 11.5108 8.06255 11.5108 8.176 11.4681L11.672 10.1571L11.892 10.9051L8 12.4601L4.108 10.9051Z"
                                                            fill="#64748B" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_8175_5628">
                                                            <rect width="16" height="16" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </div>
                                            <h2 class="mb-0">Mes Cours</h2>
                                        </div>
                                        <div class="nav btn-group" role="tablist">
                                            <button class="btn btn-outline-secondary active" data-bs-toggle="tab"
                                                data-bs-target="#tabPaneGrid" role="tab"
                                                aria-controls="tabPaneGrid" aria-selected="true">
                                                <span class="fe fe-grid"></span>
                                            </button>
                                            <button class="btn btn-outline-secondary" data-bs-toggle="tab"
                                                data-bs-target="#tabPaneList" role="tab"
                                                aria-controls="tabPaneList" aria-selected="false">
                                                <span class="fe fe-list"></span>
                                            </button>
                                        </div>
                                        {{-- <a href="#!" class="btn btn-primary">Voir tout</a> --}}
                                    </div>
                                </div>
                                @foreach ($mesCours as $mescour)
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card">
                                            <a href="#"><img src="{{ asset($mescour->formation->image) }}"
                                                    alt="course" class="card-img-top" /></a>
                                            <!-- Card body -->
                                            <div class="card-body d-flex flex-column gap-3">
                                                <h3 class="h4 mb-0"><a href="#"
                                                        class="text-inherit">{{ $mescour->formation->nom }}</a></h3>
                                                <div>
                                                    <a
                                                        href="{{ url('etudiant/formations/' . $mescour->formation->nom . '/free') }}">
                                                        <span
                                                            class="badge bg-success-subtle border border-success rounded-pill text-success">Regarder
                                                            le cours</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if ($securite)
                        <div class="col-lg-12 col-md-8 col-12">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="mb-0">Sécurité</h3>
                                    <p class="mb-0">Modifiez les paramètres de votre compte et modifiez votre mot de
                                        passe ici.</p>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <div>
                                        <!-- Form -->
                                        <form wire:submit.prevent="updatePassword" class="row needs-validation"
                                            novalidate>
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <!-- Actuel mot de passe -->
                                                <div class="mb-3">
                                                    <label class="form-label" for="securityCurrentPass">Actuel mot de
                                                        passe</label>
                                                    <input id="securityCurrentPass" type="password"
                                                        wire:model.defer="current_password" class="form-control"
                                                        required />
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Nouveau mot de passe -->
                                                <div class="mb-3">
                                                    <label class="form-label" for="securityNewPass">Nouveau mot de
                                                        passe</label>
                                                    <input id="securityNewPass" type="password"
                                                        wire:model.defer="new_password" class="form-control"
                                                        required />
                                                    @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Confirmation -->
                                                <div class="mb-3">
                                                    <label class="form-label" for="securityConfirmPass">Confirmer le
                                                        nouveau mot de passe</label>
                                                    <input id="securityConfirmPass" type="password"
                                                        wire:model.defer="new_password_confirmation"
                                                        class="form-control" required />
                                                    @error('new_password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary">Enregistrer le mot de
                                                    passe</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
