<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="fluid-container">

        <nav id="nav-custom" class="fixed-top mb-5">

            <div class="left">

                <div class="logo">

                    <a href="{{route('homepage')}}">
                        <img src="" alt="LOGO">
                    </a>
    
                </div>
    
    
                <div class="links">
    
                    <ul>
    
                        <li>
                            <a class="{{str_contains( Route::currentRouteName(), 'homepage') ? 'active' : ''}}" href="{{route('homepage')}}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="{{str_contains( Route::currentRouteName(), 'projects') ? 'active' : ''}}" href="{{route('projects.index')}}">
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Contact
                            </a>
                        </li>
    
                    </ul>
    
                </div>

            </div>


            <div class="auth">

                <!-- Right Side Of Navbar -->
                <ul>
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('admin') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        </nav>



        <main class="">
            @yield('content')
        </main>



        <footer>

            <div class="copyright">

                <p>
                    Built From Laravel With 
                    <span>💚</span>    
                    © Copyright 2023, CiccioDev. All Rights Reserved.
                </p>

            </div>

        </footer>


    </div>
</body>

</html>