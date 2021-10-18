<?php 
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');

	$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Location de matériel</title>
</head>
<body>
	<h1>Location de matériel</h1>
	<fieldset>
		<legend>Vos locations en cours</legend>
			<?php

				$requete = $bdd->prepare("SELECT type_materiel, date_emprunt, date_retour, quantite FROM materiel INNER JOIN adherent ON id_emprunteur = adherent.id WHERE adherent.id = ?");

				$requete->execute(array($id));

				while ($donnees=$requete->fetch()) 
				{
					echo $donnees['quantite'].' '.$donnees['type_materiel'].' du '.$donnees['date_emprunt'].' au '.$donnees['date_retour'].'<br />';
				}

			?>	
	</fieldset>
	<br>
	<form method="post" action="formulaire_nouvelle_location.html">
		<input type="submit" value="Démarrer une location">
	</form>


	
	<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>