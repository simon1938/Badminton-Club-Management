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
	$bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');

	if (isset($_POST['BT_loc']))
 	{
	
		$requete = $bdd->prepare("SELECT type_materiel, date_emprunt, date_retour, quantite FROM materiel INNER JOIN adherent ON id_emprunteur = adherent.id WHERE nom = ?");
		$requete->execute(array($nom));
	?> <p>Vous avez loué : <br></p> <?php

		while ($donnees=$requete->fetch()) {
		echo $donnees['quantite'].' '.$donnees['type_materiel'].' du '.$donnees['date_emprunt'].' au '.$donnees['date_retour'].'<br />';
		}
	}
	if (isset($_POST['BT_new_loc'])){
		?>
		<fieldset>
		<form method="post">

		
		<label for="type_materiel">Type de matériel<br><br></label>

		<select name="materiel">
    		<option value="">--Veuillez sélectionner le matériel que vous souhaitez louer--</option>
    		<option value="raquette">raquette</option>
    		<option value="vollant">vollant</option>
    		<option value="tenue">tenue</option>
		</select>
		
		<label for="date_emprunt"><br><br>date de l'emprunt</label>
		<p><input type="date" name="date_emprunt"></p>
		
		<label for="date_retour">date de retour</label>
		<p><input type="date" name="date_retour"></p>
		
		<label for="quantite">Quantité</label>
		<p><input type="text" name="quantite"></p>
		
		<input type="submit" name="Valider" value="Valider">
		</form>
		</fieldset>
	<?php
	if (isset($_POST['Valider'])){
	$req=$bdd->prepare('INSERT INTO materiel(type_materiel, date_emprunt, date_retour, quantite) VALUES (?,?,?,?)');
	$req->execute(array(
		 $_POST['materiel'],
		 $_POST['date_emprunt'],
		 $_POST['date_retour'],
		 $_POST['quantite'],
		 
		 ));
	}
	}
	?>
	
	<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>