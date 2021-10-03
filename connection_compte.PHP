<?php

$bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');
/*
$nom=$_POST['nom'];
$mot_de_passe=$_POST['mot_de_passe'];
*/


$requser=$bdd->prepare("SELECT nom,mot_de_passe FROM adherent WHERE nom=? AND mot_de_passe =?");
$requser->execute(array($_POST['nom'],$_POST['mot_de_passe']));
$userexist=$requser->rowCount();

if ($userexist==1)
 {
		echo '<strong>'.'Vous êtes bien connecter '.$_POST['nom'].'</strong>';
}
	else	
{
	echo'erreur';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Portail de votre compte</title>
</head>
<body>
	<h1>Veuillez choisir ce que vous voulez faire</h1>

	<a href="liste des adherents.PHP"><input type="submit" value="Voir liste des adherents"></a>
	<a href="reserver_terrain.php"><input type="submit" value="Reserver un terrain"></a>
	<a href="voir_terrain_disponible.PHP"><input type="submit" value="Voir les terrain disponible"></a>
	

	<!--

	consulter liste adherent
	//reserver un terrain
	// voir les terrain disponible
	//rechercher un autre adherent (nom email trié liste par nom)</!-->

</body>
</html>