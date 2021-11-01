<!doctype html>
<html lang="en">
<head>
    <title>Modifier cation de votre réservation</title>
</head>
<body>

    <h2>Voici les champs modifiable pour votre réservation </h2>
    <fieldset>
        <form method="POST" action="Resultat_modifier_reservation_reconnue.php">


            <label for="date_reservation">date de reservation</label>
            <p><input type="date" name="date_reservation"></p>

            <label for="horaire">Votre Horaire</label>
            <p><input type="time" name="horaire" value="12:00" step="3600" max="16:00" min="10:00" required></p>


            <label>Choisissez le nom du Terrain </label>
            <p><select name="nom_terrain"></p>

            <?php

            $bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');

            $reponse=$bdd->query('SELECT * FROM terrain');
            $reponse->execute();

            while ($donnee=$reponse->fetch())
            {
                ?>
                <option value="<?php echo $donnee['nom_terrain'];?>"> <?php echo $donnee['nom_terrain'].' ('.$donnee['type_terrain'].')';?> </option>



                <?php

            }

            ?>
            </select>




        <input type="submit" name="envoyer" value="Valider">
        </form>

    </fieldset>
    <a href="voir_terrain.php">Voir les créneaux déja pris</a><br/>
    <a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>




</body>
</html>
!