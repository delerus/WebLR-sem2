<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Главная страница')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('extra-css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>
    <header>
        @include('partials.menu')
    </header>


    @if (session('isLogged'))
    <a href="{{ url('/logout') }}">
        {{ session('name') }}
    </a>
    @else
    <a href="{{ url('/login') }}">Войти</a>
    @endif

    <div class="container">
        @yield('content')
    </div>

    @vite('resources\js\scripts\date.js')
    @yield('extra-js')
</body>
</html>
