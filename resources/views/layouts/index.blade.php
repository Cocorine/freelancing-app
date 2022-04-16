<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts 
    <script src="{{  asset('js/app.js')  }}" defer></script>
-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles
    <link href="{ asset('css/app.css') }}" rel="stylesheet"> -->
    @stack('css')
    {{-- @livewireStyles --}}
</head>
<body class="home-page">

    <div class="main-wrapper">
        @yield('app-content')
    </div>

    <div class="sidebar-overlay"></div>

    <script>

        window.User = {
            id: {{ optional(auth()->user())->id }}
        };

    </script>

    @livewireScripts
    @stack('js')

</body>
</html>
