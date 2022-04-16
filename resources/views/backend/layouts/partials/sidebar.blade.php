<div class="col-xl-3 col-md-4 theiaStickySidebar">
    <div class="settings-widget">
        <div class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
            <a href="user-account-details"><img alt="profile image" src="{{ asset('assets/img/img-04.jpg') }}" class="avatar-lg rounded-circle"></a>
            <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                <p class="mb-2">{{ __('Welcome') }},</p>
                <a href="user-account-details"><h3 class="mb-0">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h3></a>
                <p class="mb-0">{{ '@'.auth()->user()->pseudo }} </p>
            </div>
        </div>
        <div class="settings-menu">
            <ul>
                <li class="nav-item">
                    <a href="dashboard" class="nav-link active">
                        <i class="material-icons">verified_user</i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="manage-projects" class="nav-link">
                        <i class="material-icons">business_center</i> {{ __('Projects') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="manage-projects" class="nav-link">
                        <i class="material-icons">business_center</i> {{ __('Freelancers') }}
                    </a>
                </li>{{--
                <li class="nav-item">
                    <a href="favourites" class="nav-link">
                        <i class="material-icons">local_play</i> {{ __('Favourites') }}
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="favourites" class="nav-link">
                        <i class="material-icons">person_add</i> {{ __('Packs') }}
                    </a>
                </li>{{--
                <li class="nav-item">
                    <a href="review" class="nav-link">
                        <i class="material-icons">record_voice_over</i> {{ __('Reviews') }}
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="chats" class="nav-link">
                        <i class="material-icons">chat</i> {{ __('Messages') }}
                    </a>
                </li>{{--
                <li class="nav-item">
                    <a href="membership-plans" class="nav-link">
                        <i class="material-icons">person_add</i> {{ ('Membership') }}
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="milestones" class="nav-link">
                        <i class="material-icons">pie_chart</i> {{ __('Milestones') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="verify-identity" class="nav-link">
                        <i class="material-icons">person_pin</i> {{ __('Verify Identity') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="deposit-funds" class="nav-link">
                        <i class="material-icons">wifi_tethering</i> {{ __('Payments') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile-settings" class="nav-link">
                        <i class="material-icons">settings</i> {{ __('Settings') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons">power_settings_new</i> {{ ('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
