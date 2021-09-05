
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $_ENV['APP_NAME'] }} - Page de connection</title>
<!-- CSS only -->
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

  
<body class="text-center">
    
    
<main class="form-signin">
    
    @if ($errors->any())
        <ul style="list-style: none">
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

  <form action="auth" method="GET">
    
      <h1 class="mb-4">Se Connecter</h1>
      <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
      <label for="floatingInput">nom d'utilisateur</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="******" name="password">
      <label for="floatingPassword">Mot de passe</label>
    </div>
    <br>
    <button class="mb-2 w-100 btn btn-lg btn-primary " type="submit">Se connecter</button>
  </form>
</main>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>