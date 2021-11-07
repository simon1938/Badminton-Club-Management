<?php
session_start();
$_SESSION = array();
setcookie('nom','philipe',time()+60*30);
$_SESSION['session_active']=0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" />
	<title>Badminton</title>
</head>
<body>

    <div id="header">
        <h1>Bienvenue sur le site du club de Badminton</h1>
    </div>
    <div class="img_fond">
        <img src="https://www.neuillysurmarne.fr/wp-content/uploads/2015/10/BADMINTON.jpg">
    </div>

	<form method="post" action="connection_compte.php">

		<fieldset>
			<legend>Connexion</legend>


			<form action="connection_compte.PHP" method="post">

			<label for="email" id="email">Adresse mail</label>
			<input type="text" name="email" id="email" maxlength="100" >
            <br><br>
			<label for="mot_de_passe" id="mot_de_passe">Mot de passe</label>
			<input type="password" name="mot_de_passe" id="mot_de_passe" >
                <br><br>
			<input type="submit" value="Se connecter" name="Valider" id="valid">


				</form>

		</fieldset>
		
		<a href="Formulaire_Creation_compte.php">S'inscrire</a>


	</form>

	
</body>
</html>

