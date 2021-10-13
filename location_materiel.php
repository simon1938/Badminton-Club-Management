<?php 
	session_start();
	$bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', 'root');

	$nom=$_SESSION['nom'];
	$req = $bdd->prepare('SELECT id FROM `adherent` WHERE email = ?');
	$req->execute(array($_SESSION['email']));
	while ($donnees = $req->fetch()){$id = $donnees['id'];};
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

	<?php
	
		if (isset($_POST['Valider']))
		{
			$req=$bdd->prepare('INSERT INTO materiel(date_emprunt,id_emprunteur, type_materiel, date_retour, quantite) VALUES (?,?,?,?,?)');
			$req->execute(array(
			$_POST['date_emprunt'],
			$id,
			$_POST['type_materiel'],
			$_POST['date_retour'],
			$_POST['quantite']));

		}
	
	?>
	
	<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>