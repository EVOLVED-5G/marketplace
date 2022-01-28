{{-- <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" tabindex="-1">

                <img class="img-fluid" loading="lazy" src="/img/logo-menu.png" alt="logo-menu">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @guest()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">
                                    My account
                                </a>
                            </li>
                            @can('manage-platform')
                                <li>
                                    <a class="dropdown-item {{ UrlMatchesMenuItem("administration.users.index")}}"
                                       href="{{ route('administration.users.index') }}">
                                        Manage Users
                                    </a>
                                </li>
                            @endcan
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('auth.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav> --}}

<header>
    <div class="menu fixed scrolled border-menu">
        <nav class="navbar navbar-expand-lg container content ">
            <div class="container-fluid row">
                <div class="col-md-1 col-1">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img loading="lazy" src="/img/logo-menu.png" alt="logo-menu">
                    </a>
                </div>
                <div class="col-md-11 col-10">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#evolve-navbar" aria-controls="evolve-navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="evolve-navbar">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('product-catalogue') }}">Product
                                    Catalogue</a>
                            </li>

                            @guest()
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('netapp-creators') }}">Net-App Creators</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ms-3" id="login" href="{{ route('login') }}">
                                        <i class="far fa-user me-2"></i>Login/Register
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('support') }}">Support</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">
                                                My account
                                            </a>
                                        </li>
                                        @can('manage-platform')
                                            <li>
                                                <a class="dropdown-item {{ UrlMatchesMenuItem('administration.users.index') }}"
                                                    href="{{ route('administration.users.index') }}">
                                                    Manage Users
                                                </a>
                                            </li>
                                        @endcan
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                {{ __('auth.logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                </li>
                            @endguest

                        </ul>
                    </div>

                </div>

            </div>

        </nav>

    </div>



</header>
