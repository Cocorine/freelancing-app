<?php error_reporting(0);?>
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ route('frontend.home') }}" class="navbar-brand logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="{{ route('frontend.home') }}" class="menu-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="{{ Route::is('frontend.home') ? 'active' : '' }}">
                    <a href="{{ route('frontend.home') }}">{{ __('Home') }}</a>
                </li>

                @auth
                @if(auth()->user()->active == 1)

                    <li class="{{ Route::is('jobs.*') ? 'active' : '' }}">
                        <a href="{{ route('jobs.index') }}">{{ __('Jobs') }}</a>
                    </li>

                    <li class="{{ Request::is('freelancers') ? 'active' : '' }}">
                        <a href="{{ route('frontend.freelancers') }}">{{ __('Freelancers') }}</a>
                    </li>
                @endif
                @endauth
            </ul>
        </div>

        <ul class="nav header-navbar-rht">

            @auth

            @if(auth()->user()->active == 1)

                <li><a href="{{ route('backend.projects.create') }}" class="login-btn">{{ __('Post a Project') }} </a></li>

                <!-- User Menu -->

                    <li class="nav-item dropdown has-arrow main-drop account-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <img src="{{ asset(optional(auth()->user()->profile)->url ?? 'assets/img/img-04.jpg') }}" alt="">
                            </span>
                            <span>{{ '@'.auth()->user()->pseudo }}</span>
                        </a>
                        <div class="dropdown-menu emp">
                            @if(auth()->user()->isFreelancer())
                            <div class="drop-head">{{ __('Account Details') }}</div>
                            <a class="dropdown-item" href="{{ route('backend.profil') }}"><i class="material-icons">verified_user</i> {{ __('View profile') }}</a>
                            @endif
                            <div class="drop-head">{{ __('Projects Settings') }}</div>
                            <a class="dropdown-item" href="{{ route('backend.projects.index') }}"><i class="material-icons">business_center</i> {{ __('Projects') }}</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="material-icons">local_play</i> @if(auth()->user()->isCompagny()) {{ __('Favourites') }} @else {{ __('Bookmarks') }} @endif</a>
                            <a class="dropdown-item" href="javascript:void(0)"><i class="material-icons">pie_chart</i> {{ __('Reviews') }}</a>

                            @if( auth()->user()->isFreelancer())
                                <div class="drop-head">{{ __('Financial Settings') }}</div>
                                <a class="dropdown-item bal" href="{{ route('backend.payments.show',auth()->user()->wallet->id) }}">Balance <span class="amt">{{ '$'.auth()->user()->wallet->account_wallet.'.00' }}</span></a>
                                <a class="dropdown-item" href="{{ route('backend.payments.show',auth()->user()->wallet->id) }}"><i class="material-icons">wifi_tethering</i> {{ __('Withdraw funds') }}</a>
                            @endif

                            <div class="drop-head">{{ __('Account Details') }}</div>
                            <a class="dropdown-item" href="{{ route('backend.account') }}"> <i class="material-icons">settings</i> {{ __('Profile Settings') }}</a>

                            @if(auth()->user()->isFreelancer() || auth()->user()->isCompagny())
                                <a class="dropdown-item" href="#"><i class="material-icons">person_pin</i> {{ __('Verify Identity') }}</a>
                            @endif

                            <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">power_settings_new</i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                <!-- /User Menu -->

            @else
                    <li class="nav-item dropdown has-arrow main-drop account-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img">
                                <img src="{{ asset(optional(auth()->user()->profile)->url ?? 'assets/img/img-04.jpg') }}" alt="">
                            </span>
                            <span>{{ '@'.auth()->user()->pseudo }}</span>
                        </a>
                        <div class="dropdown-menu emp">

                            <div class="drop-head">{{ __('Account Details') }}</div>
                            

                            @if(auth()->user()->isFreelancer() || auth()->user()->isCompagny())
                                <a class="dropdown-item" href="{{ route('verification.notice') }}"><i class="material-icons">person_pin</i> {{ __('Activate account') }}</a>
                            @endif

                            <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">power_settings_new</i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endif

            @else

                <li class="{{ Route::is('register') ? 'active' : '' }}"><a href="{{ route('register') }}" class="reg-btn"><i class="fas fa-user"></i> {{ __('Register') }}</a></li>
                <li class="{{ Route::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}" class="log-btn"><i class="fas fa-lock"></i> {{ __('Login') }}</a></li>

            @endauth

        </ul>
    </nav>
</header>
