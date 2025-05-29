<nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-0">
        <div class="d-flex">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="assets/images/brand/logo/logo.svg" width="100"
                    alt="Geeks" /></a>
            <div class="dropdown d-none d-md-block">
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
            </div>
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
                {{-- <a href="#" class="btn btn-icon btn-light rounded-circle d-none d-md-inline-flex ms-2"><i
                        class="fe fe-shopping-cart align-middle"></i></a> --}}
                <a href="#" class="btn btn-outline-primary ms-2 d-none d-lg-block">Connexion</a>
                <a href="" class="btn btn-primary ms-2 d-none d-lg-block">Inscription</a>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLanding"
                        >Acceuil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" id="navbarPages"
                        > Cours </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPages"
                        >A Propos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarPages"
                        >Contactez-nous</a>
                </li>
            </ul>
        </div>
    </div>
</nav>