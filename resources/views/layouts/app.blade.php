<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'mypetcare') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jua&family=Julius+Sans+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-color: orange;
        }
        .auth-logo {
            display: block;
            margin: 20px auto;
            max-width: 100px; /* Adjust size as needed */
        }
        
        .card-body.bg-white {
            background-color: white;
            text-align: center; /* Center the text */
        }
        .portrait-card {
            width: 100%;
            height: auto;
            max-width: 400px; /* Adjust this value as needed */
            margin: 0 auto;
            margin-top: -50px; /* Adjust this value to move the card up */
        }
        .jua-font {
            font-family: 'Jua', sans-serif;
        }
        .julius-font {
            font-family: 'Julius Sans One', sans-serif;
        }
        .btn-orange {
            background-color: orange;
            border-color: orange;
            color: white;
            width: 100%; /* Make button width same as input */
        }
        .btn-orange:hover {
            background-color: darkorange;
            border-color: darkorange;
        }
        .btn-block {
            display: block;
            width: 100%;
        }
        .form-check {
            text-align: left;
        }
        .btn-link {
            text-align: left;
            padding-left: 0;
        }
        main {
            margin-top: 50px; /* Adjust margin to push content down */
        }
        .navbar-brand img {
            height: 40px; /* Adjust logo size */
            margin-right: 10px; /* Space between logo and text */
        }
        .alert-success {
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
        }
        /* Custom CSS for navbar links */
        .navbar-nav .nav-link {
            color: black !important; /* Set the text color to black */
        }
        .navbar-nav .nav-link:hover {
            color: darkorange !important; /* Set the hover color */
        }
        .btn-orange i {
            margin-right: 5px; /* Add some space between icon and text */
        }
        .btn-white {
        background-color: white;
        color: orange;
        border: 2px solid orange;
    }
    .btn-white:hover {
        background-color: #f8f9fa; /* Slightly darker white for hover effect */
        color: darkorange;
        border-color: darkorange;
    }
    .btn-white i {
        margin-right: 5px; /* Add some space between icon and text */
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('build/assets/petcare/logo.png') }}" alt="Logo"> <!-- Path to your logo -->
                    MY PetCare
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/grooming') }}">{{ __('Grooming') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/pet-hotel') }}">{{ __('Pet Hotel') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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
