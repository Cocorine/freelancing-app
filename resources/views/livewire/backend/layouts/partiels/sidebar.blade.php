{{-- <div class="col-xl-3 col-md-4 theiaStickySidebar">
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
                </li>
                <li class="nav-item">
                    <a href="favourites" class="nav-link">
                        <i class="material-icons">local_play</i> {{ __('Favourites') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="favourites" class="nav-link">
                        <i class="material-icons">local_play</i> {{ __('Packs') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="review" class="nav-link">
                        <i class="material-icons">record_voice_over</i> {{ __('Reviews') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="chats" class="nav-link">
                        <i class="material-icons">chat</i> {{ __('Messages') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="membership-plans" class="nav-link">
                        <i class="material-icons">person_add</i> {{ ('Membership') }}
                    </a>
                </li>
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
</div> --}}


<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: relative; transform: none;"><div class="settings-widget">
    <div class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
        <a href="javascript:void(0)"><img alt="profile image" src="{{ asset(optional(auth()->user()->profile)->url ?? 'assets/img/img-04.jpg') }}" class="avatar-lg rounded-circle"></a>
        <div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
            <p class="mb-2">Welcome,</p>
            <h3 class="mb-0"><a href="javascript:void(0)">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</a></h3>
            <p class="mb-0">{{'@'.auth()->user()->pseudo}}</p>
        </div>
    </div>
    <div class="settings-menu">
        <ul>
            <li class="nav-item">
                <a href="{{ route('backend.dashboard') }}" class="nav-link {{ Route::is('backend.dashboard') ? 'active' : '' }}">
                    <i class="material-icons">verified_user</i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.projects.index') }}" class="nav-link {{ Route::is('backend.projects.index') ? 'active' : '' }}">
                    <i class="material-icons">business_center</i> Projects
                </a>
            </li>{{--
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="material-icons">local_play</i> Favourites
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="material-icons">record_voice_over</i> Reviews
                </a>
            </li>--}}
            {{-- @if( auth()->user()->isFreelancer())
            <li class="nav-item">
                <a href="freelancer-portfolio.html" class="nav-link">
                    <i class="material-icons">pie_chart</i> Portfolio
                </a>
            </li>
            @endif --}}
            <li class="nav-item">
                <a href="{{ route('inbox') }}" class="nav-link {{ Route::is('inbox') ? 'active' : '' }}">
                    <i class="material-icons">chat</i> Messages
                </a>
            </li>
            @if(auth()->user()->isAdministrator())
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link {{ Route::is('') ? 'active' : '' }}">
                    <i class="material-icons">person_add</i> Membership
                </a>
            </li>
            @endif

            @if( auth()->user()->isAdministrator())

            <li class="nav-item">
                <a href="#" class="nav-link {{ Route::is('inbox') ? 'active' : '' }}">
                    <i class="material-icons">pie_chart</i> Milestones
                </a>
            </li>

            @endif

            <li class="nav-item">
                <a href="{{ route('backend.verify.account') }}" class="nav-link {{ Route::is('backend.verify.account') ? 'active' : '' }}">
                    <i class="material-icons">person_pin</i> Verify Identity
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.payments.show',auth()->user()->wallet->id) }}" class="nav-link {{ Route::is('backend.payments.show',auth()->user()->wallet->id) ? 'active' : '' }}">
                    <i class="material-icons">wifi_tethering</i> {{ __('Payments') }}
                </a>
            </li>
            @if(auth()->user()->isAdministrator())
            <li class="nav-item">
                <a href="{{ route('backend.plans.index') }}" class="nav-link {{ Route::is('backend.plans.index') ? 'active' : '' }}">
                    <i class="material-icons">settings</i>{{ __('Plans') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.categories.index') }}" class="nav-link {{ Route::is('backend.categories.index') ? 'active' : '' }}">
                    <i class="material-icons">settings</i>{{ __('Categories') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('backend.roles.index') }}" class="nav-link {{ Route::is('backend.roles.index') ? 'active' : '' }}">
                    <i class="material-icons">settings</i>{{ __('Roles') }}
                </a>
            </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('backend.account') }}" class="nav-link {{ Route::is('backend.account') ? 'active' : '' }}">
                    <i class="material-icons">settings</i>{{ __('Settings') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link {{ Route::is('logout') ? 'active' : '' }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">power_settings_new</i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
<div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 294px; height: 673px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div>
</div>
