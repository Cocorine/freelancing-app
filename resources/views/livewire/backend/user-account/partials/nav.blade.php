<nav class="user-tabs mb-4">
    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
        <li class="nav-item">
            <a class="nav-link  {{ $page =='freelancer-profile' ? 'active' : '' }}" href="{{ route('backend.account') }}">Profile Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $page =='freelancer-change-password' ? 'active' : '' }}" href="{{ route('backend.account.reset') }}">Change Password</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $page =='freelancer-profile-settings' ? 'active' : '' }}" href="{{ route('backend.account.delete') }}">Delete Account</a>
        </li>
    </ul>
</nav>
