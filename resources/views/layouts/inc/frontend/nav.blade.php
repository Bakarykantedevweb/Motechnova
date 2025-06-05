<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-0">
        <div class="d-flex">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/images/brand/logo/logo.svg') }}"
                    width="100" alt="Geeks" /></a>
            {{-- <div class="dropdown d-none d-md-block">
                <button class="btn btn-light-primary text-primary" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fe fe-list me-2 align-middle"></i>
                    Categories
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="dropdown-submenu dropend">
                        <a class="dropdown-item" href="#">Web
                            Development</a>
                    </li>
                    <li class="dropdown-submenu dropend">
                        <a class="dropdown-item" href="#">Design</a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">Mobile App</a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">IT Software</a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">Marketing</a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">Music</a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">Life Style</a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">Business</a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item">Photography</a>
                    </li>
                </ul>
            </div> --}}
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
                <a href="#" class="btn btn-icon btn-light rounded-circle d-none d-md-inline-flex ms-2"><i
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
                        <li>
                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal"
                                href="">Connexion</a>
                        </li>
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
                        <h6 class="fw-bold">Étudiant</h6>
                        <small>Se connecter en tant qu'étudiant</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
