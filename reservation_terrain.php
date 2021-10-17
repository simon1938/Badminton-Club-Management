<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reservation terrain</title>
</head>
<body>
	<h1>Menus des réservations terrains </h1>
	<h2>Veuillez compléter tout les champs concernant votre réservation </h2>
		<fieldset>
		<from methode="post" action="">

		<label for="numero_terrain">Le numéro de Terrain</label>
		<p><input type="int" name="numero_terrain"></p>
		
		<label for="date_reservation">date de reservation</label>
		<p><input type="date" name="date_reservation"></p>
		
		<label for="horaire">Votre Horaire</label>
		<p><input type="time" name="horaire"></p>
		
		<label for="type_terrain">Type de Terrain</label>
		<p><input type="text" name="type_terrain"></p>
		
		<label for="autre_adherent">Adherent partageant votre réservation </label>
		<select name="autre_adherent">

		<?php

		$bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');

		$reponse=$bdd->query('SELECT nom FROM adherent');


		while ($donnees=$reponse->fetch())
		 {
		 	?>
		 	<option value="<?php echo $donnees['nom'];?>" <?php echo $donnees['nom'];?> </option>
		 
					 
		 
	<?php
			
				}

		?>
		</select>
		
		 </from>	

		</fieldset>
		
	
</body>
</html>