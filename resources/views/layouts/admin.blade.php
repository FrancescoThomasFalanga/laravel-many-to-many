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

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="fluid-container">

        <nav id="nav-custom" class="fixed-top mb-5">

            <div class="left">

                <div class="logo">
    
                    <a href="{{route('admin.homepage')}}">
                        <img src="" alt="LOGO">
                    </a>
    
                </div>
    
    
                <div class="links">
    
                    <ul>
    
                        <li>
                            <a class="{{str_contains( Route::currentRouteName(), 'admin.homepage') ? 'active' : ''}}" href="{{route('admin.homepage')}}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="{{str_contains( Route::currentRouteName(), 'admin.projects') ? 'active' : ''}}" href="{{route('admin.projects.index')}}">
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
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                            <a class="dropdown-item" href="{{ route('admin.projects.index') }}">{{__('Manage Projects')}}</a>
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

        <div id="admin-layout">

            <div class="area"></div><div class="main-menu">
                <ul>
                    <li>
                        <a href="{{route('admin.dashboard')}}" class="{{str_contains( Route::currentRouteName(), 'admin.dashboard') ? 'active-dashboard' : ''}}">
                            <i class="fa fa-home fa-2x"></i>
                            <span class="nav-text">
                               Dashboard
                            </span>
                        </a>
                      
                    </li>
                    <li class="has-subnav">
                        <a href="{{url('profile')}}" class="{{str_contains( Route::currentRouteName(), 'profile') ? 'active-dashboard' : ''}}">
                            <i class="fa fa-user fa-2x"></i>
                            <span class="nav-text">
                                Profile
                            </span>
                        </a>
                        
                    </li>
                    <li class="has-subnav">
                        <a href="{{route('admin.projects.index')}}" class="{{str_contains( Route::currentRouteName(), 'admin.projects.index') ? 'active-dashboard' : ''}}">
                           <i class="fa fa-diagram-project fa-2x"></i>
                            <span class="nav-text">
                                All Projects
                            </span>
                        </a>
                        
                    </li>
                    <li>
                        <a href="{{route('admin.types.index')}}" class="{{str_contains( Route::currentRouteName(), 'admin.types.index') ? 'active-dashboard' : ''}}">
                            <i class="fa fa-hashtag fa-2x"></i>
                            <span class="nav-text">
                                All Types
                            </span>
                        </a>
                    </li>
                    <li class="has-subnav">
                        <a href="{{route('admin.projects.create')}}" class="{{str_contains( Route::currentRouteName(), 'admin.projects.create') ? 'active-dashboard' : ''}}">
                           <i class="fa fa-plus fa-2x"></i>
                            <span class="nav-text">
                                Add Project
                            </span>
                        </a>
                       
                    </li>
                    <li>
                        <a href="{{route('admin.types.create')}}" class="{{str_contains( Route::currentRouteName(), 'admin.types.create') ? 'active-dashboard' : ''}}">
                            <i class="fa fa-plus fa-2x"></i>
                            <span class="nav-text">
                               Add Type
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            
            <main class="">
                @yield('content')
            </main>
            
        </div>


        <footer class="fixed-bottom">

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