<?php 
	session_start();

	$nom=$_SESSION['nom'];
	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Location de matériel</title>
</head>
<body>
	<h1>Location de matériel</h1>

<form method="post">
	<input type="submit" name="BT_loc" value="Location en cours">
	<input type="submit" name="BT_new_loc" value="Démarrer une location">
</form>


<?php
	$bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', 'root');

	if (isset($_POST['BT_loc']))
 	{
	
		$requete = $bdd->prepare("SELECT type_materiel, date_emprunt, date_retour, quantite FROM materiel INNER JOIN adherent ON id_emprunteur = adherent.id WHERE nom = ?");
		$requete->execute(array($nom));
	?> <p>Vous avez loué : <br></p> <?php

		while ($donnees=$requete->fetch()) {
		echo $donnees['quantite'].' '.$donnees['type_materiel'].' du '.$donnees['date_emprunt'].' au '.$donnees['date_retour'].'<br />';
		}
	}

	?>
</body>
</html>