<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liste des adéherents</title>
</head>
<body>
	<h1>Liste des adhérents</h1>
 
	<?php

$bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');

$reponse=$bdd->query("SELECT nom, prenom FROM adherent");

while ($donnees=$reponse->fetch()) {
	echo $donnees['nom'].' '.$donnees['prenom'].'<br />';
}

	?>
	
	<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>