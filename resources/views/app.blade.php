<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $_ENV['APP_NAME'] }} - @yield('page')</title>
</head>
<body>
    <header>
        <div class="">
            <strong><p class="logo">{{ $_ENV['APP_NAME'] }}</p></strong>
        </div>
        <div class="links">
            <ul>
                @auth
                    <li><a href="{{ route('logout') }}">logout</a></li>
                    <li><a href="{{ route('dashboard') }}">dashboard</a></li>
                @endauth
                @guest
                    <li><a href="{{ route('users.create') }}">new account</a></li>
                    <li><a href="{{ route('login') }}">login</a></li>
                @endguest
            </ul>
        </div>
        <hr>
    </header>
    <div class="dashboard-links">
        bienvenue, vous travaillez en tant que <em><strong>{{ Auth::user()->username }}</strong></em>
        <ul>
            <li>role => {{ Auth::user()->role->name }}</li>
        </ul>
        <ul>
            <li><a href="">nouveau entreer</a></li>
            <li><a href="">sorties</a></li>
            <li><a href="">stock</a></li>
        </ul>
    </div>
    @yield('content')
</body>
</html>