<header>
    <div class="menu fixed scrolled border-menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light container content main-navigation">
            <div class="container-fluid">
                <a class="navbar-brand order-2 order-lg-1 mr-auto mr-lg-3 ml-3 ml-lg-0" href="{{ route('home') }}">
                    <img loading="lazy" src="/img/logo-menu.png" alt="logo-menu"></a>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="overlay d-flex d-lg-none"></div>


                <div class="order-lg-2 d-lg-flex justify-content-end w-100 pb-3 pb-lg-0 sidebar-main-navigation" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-lg-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2 {{ UrlMatchesMenuItem('home', 'active') }}" aria-current="page" href="{{ route('home') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2" href="{{ route('product-catalogue') }}">Product
                                Catalogue</a>
                        </li>
                        @can('manage-platform')
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2 {{ UrlMatchesMenuItem('administration.marketplace.overview.index', 'active') }}" href="{{ route('administration.marketplace.overview.index') }}">
                                Marketplace Overview
                            </a>
                        </li>
                        @endcan
                        @guest()
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2 " href="{{ route('netapp-creators') }}">Net-App Creators</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-3 px-3 px-lg-2 " id="login" href="{{ route('login') }}">
                                <i class="far fa-user me-2"></i>Login/Register
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2 " href="{{ route('welcome-dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 px-lg-2 " href="http://evolved5g-marketplace-forum.evolved-5g.gr/" target="_blank">Support</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">
                                        My account
                                    </a>
                                </li>
                                @can('manage-platform')
                                <li>
                                    <a class="dropdown-item {{ UrlMatchesMenuItem('administration.users.index', 'active') }}" href="{{ route('administration.users.index') }}">
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
        </nav>

    </div>
</header>
