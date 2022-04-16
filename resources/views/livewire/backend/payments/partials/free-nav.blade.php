<nav class="user-tabs mb-4">
    <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.payments.show',$wallet->id) ? 'active' : '' }}" href="{{ route('backend.payments.show',$wallet->id) }}">Withdraw Funds</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.payments.invoices',$wallet->id) ? 'active' : '' }}" href="{{ route('backend.payments.invoices',$wallet->id) }}"> Invoices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('backend.payments.transactions',$wallet->id) ? 'active' : '' }}" href="{{ route('backend.payments.transactions',$wallet->id) }}"> Transaction History</a>
        </li>
    </ul>
</nav>
