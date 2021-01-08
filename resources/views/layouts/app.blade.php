<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    @stack('stylesheets')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="far fa-user mr-2"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="far fa-id-card mr-2"></i> {{ __('Profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('login-activities.index') }}">
                                    <i class="fas fa-book mr-2"></i> {{ __('Login Activity') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 navbar-light bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav navbar-nav flex-column">
                            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <a class="nav-link mx-3" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            @can('users_manage')
                            <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <a class="nav-link mx-3" href="{{ route('users.index') }}">{{ __('User') }}</a>
                            </li>
                            @endcan
                            @can('roles_manage')
                            <li class="nav-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                <a class="nav-link mx-3" href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                            </li>
                            @endcan
                            @can('permissions_manage')
                            <li class="nav-item {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                                <a class="nav-link mx-3" href="{{ route('permissions.index') }}">{{ __('Permission') }}</a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ml-sm-auto col-lg-10 px-2">
                    <div class="container-fluid py-2">
                        @include('partials.flash-message')
                        @yield('content')
                    </div>
                </main>
            </div>

        </div>


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    @stack('scripts')
</body>
</html>
