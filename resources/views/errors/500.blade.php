<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur- 500</title>
</head>

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
<style>
* {
  -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 560px;
  width: 100%;
  padding-left: 0px;
  line-height: 1.1;
}

.notfound .notfound-404 {
  position: absolute;
  left: 0;
  top: 0;
  display: inline-block;
  width: 140px;
  height: 140px;
  background-image: url('/public/img/emoji.png');
  background-size: cover;
}

.notfound .notfound-404:before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-transform: scale(2.4);
      -ms-transform: scale(2.4);
          transform: scale(2.4);
  border-radius: 50%;
  background-color: #f2f5f8;
  z-index: -1;
}

.notfound h1 {
  font-family: 'Roboto', sans-serif;
  font-size: 65px;
  font-weight: 700;
  margin-top: 0px;
  margin-bottom: 10px;
  color: #151723;
  
}

.notfound h2 {
  font-family: 'Roboto', sans-serif;
  font-size: 21px;
  font-weight: 400;
  margin: 0;
  text-transform: uppercase;
  color: #151723;
}

.notfound p {
  font-family: 'Roboto', sans-serif;
  color: #999fa5;
  font-weight: 400;
}

.notfound a {
  font-family: 'Roboto', sans-serif;
  display: inline-block;
  font-weight: 700;
  text-decoration: none;

}

@media only screen and (max-width: 767px) {
  .notfound .notfound-404 {
    width: 110px;
    height: 110px;
  }
  .notfound {
    padding-left: 15px;
    padding-right: 15px;
  }
}
</style>
<body>
    
</body>
<body>

	<div id="notfound">
		<div class="notfound">
			
			<h1>Erreur 500</h1>
            <div class="note note-primary">
            <h2>Oups! Erreur interne du serveur</h2>
			<p>Pardon, Une erreur s’est produite pendant la connexion au serveur et, par conséquent, votre page demandée ne peut pas être chargée.</p>
            </div>
            <br>
			<a href="{{ route('dashboard') }}" class="btn btn-primary">Retourner sur la page d'accueil</a>
		</div>
	</div>

</body>
</html>
  