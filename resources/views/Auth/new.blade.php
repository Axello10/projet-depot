<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $_ENV['APP_NAME'] }} - Ajouter un utilisateur</title>
<!-- importation Bootstrap  -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!-- fin -->
<!-- css supplémentaire -->
<style>
	body {
		background-color: #f5f5f5;
		font-family: 'Roboto', sans-serif;
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
	}
    .form-control{
		height: 41px;
		background: #f2f2f2;
		box-shadow: none !important;
		border: none;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
    width: 100%;
    max-width: 450px;
    margin: auto;
	}
	.signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }    
	.signup-form .form-group{
		
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #3598dc;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus{
		background: #2389cd !important;
        outline: none;
	}
    .signup-form a{
		color:  #2389cd;
		text-decoration: underline;
	}
	.signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #3598dc;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}
    .signup-form .hint-text {
		padding-bottom: 15px;
		text-align: center;
    }
</style>
</head>
<body>
<div class="signup-form">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
		<h1>Ajouter un utilisateur...</h1>
		<p>Veuillez completer ce formulaire pour créer un compte!</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6">
                    <label for="deposit">nom de l'utilisateur</label>
                    <input class="form-control" placeholder="Nom utilisateur" type="text" name="username">
                </div>
				<div class="col-xs-6">
                    <label for="deposit">nom complet</label>
                    <input class="form-control" placeholder="Nom complet" type="text" name="fullname">
                </div>
			</div>
        </div>
        <div class="form-group">
            <label for="email">email de l'utilisateur</label>
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <label for="deposit">nom du depot</label>
            <select name="deposit_id" id="deposit_id">
                @foreach ($deposits as $dp)
                <option value="{{ $dp->id }}">{{ $dp->name }}</option>                    
                @endforeach
            </select>
        </div>
        

		<div class="form-group">
            <label for="password">mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> Je confirmes
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">ajouter l'utilisateur</button>
        </div>
    </form>
	<div class="hint-text">Vous avez un compte? <a href="{{ route('login') }}">Connectez-vous ici</a></div>
</div>
</body>
</html>