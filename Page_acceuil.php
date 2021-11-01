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
	<h1>Bienvenue sur le site du club de Badminton</h1>
    <div id="header"></div>
	<form method="post" action="connection_compte.php">

		<fieldset>
			<legend>Vous connnecter</legend>


			<form action="connection_compte.PHP" method="post">

			<label for="email" id="email">Adresse mail</label>
			<input type="text" name="email" id="email" maxlength="100" placeholder="jeanlassalle@gmail.com">
            <br><br>
			<label for="mot_de_passe" id="mot_de_passe">Mot de passe</label>
			<input type="password" name="mot_de_passe" id="mot_de_passe" >
                <br><br>

             <label>Entrez le code VIP (facultatif seulement si vous etes un VIP) </label>
             <input type="tel" name="CODE_VIP">
			<input type="submit" name="Valider" id="valid">


				</form>

		</fieldset>
		
		<a href="Formulaire_Creation_compte.php">Ce Créer un compte</a>


	</form>

	
</body>
</html>

