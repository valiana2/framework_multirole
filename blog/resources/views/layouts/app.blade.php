<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Banque Française') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f3f7ff;
        }
        .navbar {
            background-color: #3e6fb9;
        }
    </style>

</head>

<body>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">

            <div class="container">

                <h5 style="text-align: center; color: white; font-size: 40px;">Banque Française</h5>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->

                        @guest

                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>

                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>

                        @else

                            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Customer</a></li>

                            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>

                            <li><a class="nav-link" href="{{ route('products.index') }}">Manage Account</a></li>

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                    {{ Auth::user()->name }} <span class="caret"></span>

                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"

                                       onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Logout') }}

                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

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

            <div class="container">

            @yield('content')

            </div>

        </main>

    </div>

</body>

</html>