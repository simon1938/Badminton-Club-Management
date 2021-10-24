<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liste des adéherents</title>
</head>
<body>
	<h1>Liste des adhérents</h1>


<form method="post">
	<input type="submit" name="BT_nom" value="trier par nom">
	<input type="submit" name="BT_email" value="trier par email">
	<input type="submit" name="BT_normal" value="ne pas trier">
</form>


<p>
	<?php

    include 'connexion_bdd.php';

if (isset($_POST['BT_nom']))
 {

$reponse=$bdd->query("SELECT nom, prenom FROM adherent ORDER BY nom");

while ($donnees=$reponse->fetch()) {
	echo $donnees['nom'].' '.$donnees['prenom'].'<br />';
}


}


if (isset($_POST['BT_email']))
 {	

$reponse=$bdd->query("SELECT nom, prenom FROM adherent ORDER BY email ");

while ($donnees=$reponse->fetch()) {
	echo $donnees['nom'].' '.$donnees['prenom'].'<br />';
}


}


if (isset($_POST['BT_normal']))
 {

$reponse=$bdd->query("SELECT nom, prenom FROM adherent ");

while ($donnees=$reponse->fetch()) {
	echo $donnees['nom'].' '.$donnees['prenom'].'<br />';
}


}


	?>
</p>
	
	<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>