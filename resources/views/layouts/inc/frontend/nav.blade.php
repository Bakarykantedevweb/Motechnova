<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-0">
        <div class="d-flex">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/images/brand/logo/logo.svg') }}"
                    width="100" alt="Geeks" /></a>
        </div>
        <div class="order-lg-3">
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-light btn-icon rounded-circle d-flex align-items-center" type="button"
                        aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (light)">
                        <i class="bi theme-icon-active"></i>
                        <span class="visually-hidden bs-theme-text">Toggle theme</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bs-theme-text">
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="light" aria-pressed="false">
                                <i class="bi theme-icon bi-sun-fill"></i>
                                <span class="ms-2">Light</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="dark" aria-pressed="false">
                                <i class="bi theme-icon bi-moon-stars-fill"></i>
                                <span class="ms-2">Dark</span>
                            </button>
                        </li>
                    </ul>
                </div>
                @if (Auth::guard('etudiant')->check())
                    <a href="{{ url('carts') }}"
                        class="btn btn-icon btn-light rounded-circle d-none d-md-inline-flex ms-2 position-relative">
                        <i class="fe fe-shopping-cart align-middle"></i>

                        @if ($cartCount > 0)
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <li class="dropdown ms-2 d-inline-block position-static">
                        <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static"
                            aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                                    class="rounded-circle" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-1.jpg') }}"
                                            class="rounded-circle" />
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1">
                                            {{ Auth::guard('etudiant')->user()->nom . ' ' . Auth::guard('etudiant')->user()->prenom }}
                                        </h5>
                                        <p class="mb-0">{{ Auth::guard('etudiant')->user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item" href="{{ url('etudiant/dashboard') }}">
                                        <i class="fe fe-home me-2"></i>
                                        Tableau de Bord
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('carts') }}">
                                        <i class="fe fe-shopping-cart me-2"></i>
                                        Panier
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item" href="{{ route('etudiant/logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fe fe-power me-2"></i>
                                        Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('etudiant/logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else
                    <a href="{{ url('formations') }}" class="btn btn-icon btn-light rounded-circle d-none d-md-inline-flex ms-2"><i
                            class="fe fe-shopping-cart align-middle"></i></a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"
                        class="btn btn-outline-primary ms-2 d-none d-lg-block">Connexion</a>
                    <!-- Button -->
                    <button class="navbar-toggler collapsed ms-2 ms-lg-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="icon-bar top-bar mt-0"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                @endif
            </div>
        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('formations') }}" id="navbarPages"> <b>Formations</b> </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarPages"> <b>Produits Digitaux</b> </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarPages"> <b>Classements</b> </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarPages"> <b>Blog</b> </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPages" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><b>Pages</b></a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarPages">
                        @if (!Auth::guard('etudiant')->check())
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal"
                                    href="">Connexion</a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item" href="">A propos</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="">Contactez-nous</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="loginModalLabel">Connexion à votre compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <p class="mb-3 text-muted">Choisissez le type de compte</p>
                <div class="d-flex justify-content-between gap-3">

                    <!-- Formateur (actif) -->
                    <div class="border rounded p-3 text-center flex-fill cursor-pointer"
                        style="border-bottom: 3px solid #754FFE;">
                        <div class="mb-2">
                            <i class="bi bi-person-video3" style="font-size: 2rem; color: #754FFE;"></i>
                        </div>
                        <h6 class="fw-bold" style="color: #754FFE;"><a
                                href="{{ url('formateur/login') }}">Formateur</a></h6>
                        <small style="color: #754FFE;">Se connecter en tant que formateur</small>
                    </div>

                    <!-- Étudiant (inactif) -->
                    <div class="border rounded p-3 text-center flex-fill cursor-pointer">
                        <div class="mb-2">
                            <i class="bi bi-mortarboard" style="font-size: 2rem;"></i>
                        </div>
                        <h6 class="fw-bold"><a href="{{ url('etudiant/login') }}">Étudiant</a></h6>
                        <small>Se connecter en tant qu'étudiant</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
