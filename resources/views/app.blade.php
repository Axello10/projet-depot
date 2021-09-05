<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $_ENV['APP_NAME'] }} - @yield('page')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- fin -->
<!-- css supplémentaire -->
    <style>
        html,body {
          height: 100%;
        }

        body {
          display: flex;
          align-items: center;
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #f5f5f5;
          color: #333;
        }

        .form-signin {
          width: 100%;
          max-width: 450px;
          margin: auto;
          
        }

        .form-signin .checkbox {
          font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
          z-index: 2;
          
        }

        .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;

        }

        .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;

          
        }
        .form-signin form{
            color: #999;
            border-radius: 5px;
              margin-bottom: 15px;
                background: #fff;
                box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 40px;
            }
            .form-signin h1{
              color: black;
            }

    </style>
</head>
<body>
    
    <header>
        <div class="">
            <strong><p class="logo"><a href="{{ route('dashboard') }}">{{ $_ENV['APP_NAME'] }}</a></p></strong>
        </div>
        <div class="links">
            <ul>
                @auth
                    <li><a href="{{ route('logout') }}">logout</a></li>
                    <li><a href="{{ route('dashboard') }}">dashboard</a></li>
                    <li>bienvenue, vous travaillez en tant que <em><strong>{{ Auth::user()->username }}</strong></em></li>
                @endauth
                @guest
                    <li><a href="{{ route('users.create') }}">new account</a></li>
                    <li><a href="{{ route('login') }}">login</a></li>
                @endguest
            </ul>
        </div>
        <hr>
    </header>
    
    @yield('content')
</body>
</html>