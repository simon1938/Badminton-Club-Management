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
    <form method="POST" action="resultat_reservation_terrain.php">


        <label for="date_reservation">date de reservation</label>
        <p><input type="date" name="date_reservation"></p>

        <label for="horaire">Votre Horaire</label>
        <p><input type="time" name="horaire"></p>


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


        <p><label>Selectionner le nombre d'adherents avec qui vous voulez jouer </label></p>
        <select name="nombre_invite" id="nombre_invite">
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
        <p><input type="submit" name="valider" value="Valider"</p>

    </form>

</fieldset>
<a href="voir_terrain.php">Voir les créneaux déja pris</a><br/>
<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>

</body>
</html>