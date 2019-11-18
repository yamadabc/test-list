<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    
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
<body>
    @if(Auth::check())
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/users') }}">
                    社員管理ページ
                </a>

                
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <ul class='navbar-nav'>
                            
                                    <li ckass='nav-item'>
                                        <a class="nav-link" href="{{ route('users.index') }}">社員一覧</a>
                                    </li>
                                    <li ckass='nav-item'>
                                        <a class="nav-link" href="{{ route('register') }}">社員登録</a>
                                    </li>

                                    <li class='nav-item dropdown'>
                                    
                                    <a href="#" class='nav-link dropdown-toggle' data-toggle='dropdown'>{{ Auth::user() -> name }}</a>
                                    <div class='dropdown-menu'>
                                        {!! link_to_route('mypage', 'マイページ' ,['id'=>Auth::id()],['class'=>'dropdown-item']) !!}

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        </li>
                                        <li ckass='nav-item'>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>

                            </ul>
                               
                            
                        @endguest
                    
                </div>
            </div>
        </nav>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
</html>
