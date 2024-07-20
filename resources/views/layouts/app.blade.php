<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Guarderia360') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-success-subtle">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm mb-5">
            <div class="container">
                <img src="{{ asset('images/logo.png')}}" width="75" height="75" alt="logo">
                <a class="navbar-brand mx-5" href="{{ url('/') }}">
                    {{ config('app.name', 'Guarderia360') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        @endif
                        @else
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav justify-center">
                            <li class="nav-item">
                                <a class="nav-link mx-5" href="{{ route('home') }}">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-5" href="{{ route('employees.index') }}">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-5" href="{{ route('family.index') }}">Infantes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-5" href="{{ route('services.index') }}">Servicios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-5" href="{{ route('posts.index') }}">Avisos</a>
                            </li>
                        </ul>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('register') }}">Registrar Cuenta</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>