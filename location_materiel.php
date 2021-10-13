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
	<fieldset>
		<legend>Vos locations en cours</legend>
			<?php
				$bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', 'root');

				$requete = $bdd->prepare("SELECT type_materiel, date_emprunt, date_retour, quantite FROM materiel INNER JOIN adherent ON id_emprunteur = adherent.id WHERE nom = ?");

				$requete->execute(array($nom));

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
			$req=$bdd->prepare('INSERT INTO materiel(date_emprunt, type_materiel, date_retour, quantite) VALUES (?,?,?,?)');
			$req->execute(array(
			$_POST['date_emprunt'],
			 $_POST['type_materiel'],
			 $_POST['date_retour'],
			 $_POST['quantite']));
		}
	
	?>
	
	<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>