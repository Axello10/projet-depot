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
            <p class="logo">{{ $_ENV['APP_NAME'] }}</p>
        </div>
        <div class="links">
            <ul>
                <li><a href="{{ route('users.create') }}">new account</a></li>
                <li><a href="{{ route('login') }}">login</a></li>
                <li><a href="{{ route('logout') }}">logout</a></li>
                <li><a href="{{ route('dashboard') }}">dashboard</a></li>
            </ul>
        </div>
    </header>
    @yield('content')
</body>
</html>