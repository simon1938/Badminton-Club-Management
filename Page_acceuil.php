<?php
session_start();
setcookie('nom','philipe',time()+60*30);
$_SESSION['session_active']=0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Badminton</title>
</head>
<body>
	<h1>Bienvenue sur le site du club de Badminton</h1>

	<form method="post" action="connection_compte.php">

		<fieldset>
			<legend>Vous connnecter</legend>


			<form action="connection_compte.PHP" method="post">

			<label for="nom">Votre Nom</label>
			<input type="text" name="nom" id="nom" maxlength="25" placeholder="jean Lassalle :) ">

			<label for="mot_de_passe">Entrez votre mot de passe</label>
			<input type="text" name="mot_de_passe" id="mot_de_passe" >

			<input type="submit" name="Valider">


				</form>

		</fieldset>
		
		<a href="Formulaire_Creation_compte.php">Ce Créer un compte</a>


	</form>

	
</body>
</html>

