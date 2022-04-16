<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.partials.head')
@stack('css')
</head>
@if(Route::is(['pagee']))
<body class="home-page">
@endif
@if(Route::is(['404-page','cancelled-projects','change-password','completed-projects','dashboard','delete-account','deposit-funds','favourites','files','freelancer-cancelled-projects','freelancer-change-password','freelancer-completed-projects','freelancer-dashboard','freelancer-delete-account','freelancer-favourites','freelancer-files','freelancer-invitations','freelancer-invoices','freelancer-membership','freelancer-milestones','freelancer-ongoing-projects','freelancer-payment','freelancer-portfolio','freelancer-profile-settings','freelancer-project-proposals','freelancer-review','freelancer-task','freelancer-transaction-history','freelancer-verify-identity','freelancer-view-project-detail','freelancer-withdraw-money','invited-freelancer','manage-projects','membership-plans','milestones','ongoing-projects','pending-projects','post-job','profile-settings','project-payment','review','tasks','transaction-history','verify-identity','view-project-detail','withdraw-money']))
<body class="dashboard-page">
@endif
@if(Route::is(['forgot-password','login','register']))
<body class="account-page">
@endif
@if(Route::is(['chats','freelancer-chats']))
<body class="chat-page">
@endif
@include('layouts.partials.header')
@yield('content')
@if(!Route::is(['chats','freelancer-chats']))
@include('layouts.partials.footer')
@endif
@include('layouts.partials.footer-scripts')

@stack('js')
@livewireScripts
  </body>
</html>
