<nav class="user-tabs mb-4">
    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.projects.index') ? 'active' : '' }}" href="{{ route('backend.projects.index') }}">

                @if(auth()->user()->isFreelancer())
                    My Proposals
                @else
                    All Projects
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Pending Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{  Route::is('backend.ongoing-projects') ? 'active' : '' }}" href="{{ route('backend.ongoing-projects') }}">Ongoing Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{  Route::is('backend.completed-projects') ? 'active' : '' }}" href="{{ route('backend.completed-projects') }}">Completed Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{  Route::is('backend.cancelled-projects') ? 'active' : '' }}" href="{{ route('backend.cancelled-projects') }}">Cancelled Projects</a>
        </li>
    </ul>
</nav>
