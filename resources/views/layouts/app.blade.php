<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    .card {
        padding:5px;
        margin-top:5px;
        margin-bottom: 5px;
        border:1px solid black;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div><img  src="/svg/logo2.svg" alt=""></div>
                    <div style="position: relative; left:8px; top:12px;"><b>StudyON</b></div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    {{-- if Not logged in, nothing to see which makes sense :thumbsup: --}}
                    @else
                        @if(!Auth::user()->member_of->isEmpty())
                            <ul class="navbar-nav ms-left">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Study Groups
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">      
                                        @foreach(Auth::user()->member_of as $studygroup)
                                            <a href="/studygroup/{{$studygroup->id}}" class="dropdown-item" >
                                                "{{$studygroup->name}}"
                                            </a>
                                        @endforeach
                                        <a href="/studygroup/create" class="dropdown-item">Create a Group</a>
                                        {{-- THIS IS HOW I CAN LINK MY GROUPS TO THEIR PAGE 'SEE BELOW -LOGOUT FORM-' --}}
                                        {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form> --}}
                                    </div>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav ms-left">
                                <li class="nav-item">
                                    <a href="/studygroup/create" class="nav-link"><b>Create a Group</b></a>
                                </li>
                            </ul>
                            
                        @endif
                    @endguest
                    
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
                        <li class="nav-item">
                            {{-- HOME ILE PROFILE ARASINDA PROBLEM YASADIM --}}
                            <a class="nav-link" href="#">Notifications</a> 
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.profile')}}">{{ __('Profile') }}</a> 
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
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
