<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{ url('formateur/dashboard') }}">
            <img src="{{ asset('assets/images/brand/logo/logo-inverse.svg') }}" alt="Geeks" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('formateur/dashboard') }}">
                    <i class="nav-icon fe fe-home me-2"></i>
                    Tableau de Bord
                </a>
            </li>
            <li class="nav-item">
              <div class="navbar-heading">Section Formation</div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('formateur/formations') }}">
                    <i class="nav-icon fe fe-book me-2"></i>
                    Formations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('formateur/statistiques') }}">
                    <i class="nav-icon fe fe-pie-chart me-2"></i>
                    Statisques
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('formateur/commandes') }}">
                    <i class="nav-icon fe fe-shopping-bag me-2"></i>
                    Commandes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="nav-icon fe fe-help-circle me-2"></i>
                    Quiz
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="nav-icon fe fe-help-circle me-2"></i>
                    Quiz Result
                </a>
            </li>
            <li class="nav-item">
                <div class="navbar-heading">Produits Digitaux</div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('formateur/produits-digitaux') }}">
                    <i class="nav-icon fe fe-shopping-cart me-2"></i>
                    Produits Digitaux
                </a>
            </li>
        </ul>
    </div>
</nav>
