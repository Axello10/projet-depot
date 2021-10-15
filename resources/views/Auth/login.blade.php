<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $_ENV['APP_NAME'] }} - Connection</title>
<!-- CSS only -->
<!-- MDB -->
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
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
            ul{
              padding:0;
            }
    </style>
</head>
  
<body class="text-center">

    <main class="form-signin ">
      <h4>Commencez par vous connectez</h4>
      <br>
      @if ($errors->any())
        <ul>
        <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
        </ul>
      @endif
      <form action="auth" method="GET">
        <h1 class="mb-4">{{ $_ENV['APP_NAME'] }}</h1>
        <div class="form-floating ">
          <input type="text" class="form-control form-outline mb-4" id="floatingInput" placeholder="nom d'utilisateur" name="username">
          <label for="floatingInput">Identifiant</label>
        </div> 
        <div class="form-floating">
          <input type="password" class="form-control form-outline mb-4" id="floatingPassword" placeholder="******" name="password">
          <label for="floatingPassword">Mot de passe</label>
        </div>
        <button class="mb-2 w-100 btn btn-lg btn-primary " type="submit">Se connecter</button>
      </form>
    </main>
    
  </body>
</html>