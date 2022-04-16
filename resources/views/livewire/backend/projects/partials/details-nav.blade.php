<nav class="user-tabs mb-4">
    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.projects.show',$project->id) ? 'active' : '' }}" href="{{ route('backend.projects.show',$project->id) }}">Overview &amp; Discussions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.projects.milestones',$project->id) ? 'active' : '' }}" href="{{ route('backend.projects.milestones',$project->id) }}">Milestones</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.projects.tasks',$project->id) ? 'active' : '' }}" href="{{ route('backend.projects.tasks',$project->id) }}">Tasks</a>
        </li>{{--
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.projects.show',$project->id) ? 'active' : '' }}" href="{{ route('backend.projects.milestones',$project->id) }}">Files</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.projects.payments',$project->id) ? 'active' : '' }}" href="{{ route('backend.projects.payments',$project->id) }}">Payments</a>
        </li>
    </ul>
</nav>
