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


		<form method="post" action="reservation_terrain.php">


        <label for="semaine_reservation">Semaine de réservation</label>
        <p><input type="number" name="semaine_reservation"></p>


		<label for="jour_reservation">Jour de la reservation</label>
		<p><input type="text" name="jour_reservation"></p>

            <p><label for="type_terrain">Type de Terrain</label></p>
            <select name="type_terrain">
                <option value="Simple">Simple</option>
                <option value="Double">Double</option>
                <p> </select></p>
		



            <p><label for="nombre_invite">Selectionner le nombre d'adherents avec qui vous voulez jouer </label></p>

            <select name="nombre_invite">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
                <p></select></p>


		<label for="autre_adherent">Adherent partageant votre réservation </label>
		<p><select name="autre_adherent"></p>

            <?php

            $bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');

            $reponse=$bdd->query('SELECT nom FROM adherent');
            $reponse->execute();

            while ($donnees=$reponse->fetch())
            {
                ?>
                <option value="<?php echo $donnees['nom'];?>"> <?php echo $donnees['nom'];?> </option>



                <?php
				}

		?>


		</select>

            <input type="submit" name="Valider">


		
		 </form>


    <?php
    if(isset($_POST['Valider']))
    {
        echo '
        <form method="post" action "resultat_reservation_terrain">
             <p><label for="resultat">Voici les terrains disponibles en fonction de vos choix </label></p>
             <select name="resultat">';

          
         $rep=$bdd->query("SELECT email FROM adherent");
          $rep->execute();

		while ($donnee=$rep->fetch())
		 {
		     ?>
             <option value="<?php echo $donnee['email'];?>"> <?php echo $donnee['email'];?> </option>

            <?php
         }
    }
            ?>




            </select>  
            </form>


        </fieldset>
</body>
</html>