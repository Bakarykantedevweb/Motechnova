<div>
    <nav class="navbar-vertical navbar">
        <div class="vh-100" data-simplebar>
            <!-- Brand logo -->
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('assets/images/brand/logo/logo-inverse.svg') }}" alt="Geeks" />
            </a>
            <!-- Navbar nav -->
            <ul class="navbar-nav flex-column" id="sideNavbar">
                <li class="nav-item">
                    <a class="nav-link " href="{{ url('/admin/dashbord') }}">
                        <i class="nav-icon fe fe-home me-2"></i>
                        Tableau de Bord
                    </a>
                </li>
                @forelse ($droits as $droit)
                    <li class="nav-item @if (Route::currentRouteName() == $droit->route) bg-primary @endif">
                        <a class="nav-link @if (Route::currentRouteName() == $droit->route) text-light @endif" 
                            href="{{ route($droit->route) }}">
                            @if ($droit->type_droit->id == 1)
                                <i class="nav-icon fe fe-list me-2"></i>
                            @elseif($droit->type_droit->id == 2)
                                <i class="nav-icon fe fe-shopping-cart me-2"></i>
                            @elseif($droit->type_droit->id == 3)
                                <i class="nav-icon fe fe-users me-2"></i>
                            @endif
                            {{ $droit->nom }}
                        </a>
                    </li>
                @empty
                    <li class="nav-item">
                        <a class="nav-link  collapsed " href="#">
                            <i class="nav-icon fe fe-book me-2"></i>
                            Pas de Droits
                        </a>
                    </li>
                @endforelse
            </ul>
        </div>
    </nav>
</div>
