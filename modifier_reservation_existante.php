<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier vos reservation de terrain</title>
</head>
<body>
    <h1>Modifier vos réservations actuelles</h1>
    <form method="post">
        <p><input type="submit" value="Voir mes reservation" name="Voir_mes_reservation"></p>
        <?php
        session_start();
        if($_SESSION['statut']=='administrateur')
       echo '<p><input type="submit" value="Voir TOUTE les reservation" name="Voir_TOUTE_les_reservation"></p>';
        ?>
    <?php

    if(isset($_POST['Voir_mes_reservation'])) {
        $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
        $reponse = $bdd->prepare('SELECT date_reservation,horaire,nom_terrain FROM repertoire WHERE id_joueur=? ');
        $reponse->execute(array($_SESSION['id']));
        while ($donnees = $reponse->fetch()) {
            echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';

        }
    }
    if(isset($_POST['Voir_TOUTE_les_reservation']))
    {
        $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
        $reponse = $bdd->prepare('SELECT date_reservation,horaire,nom_terrain FROM repertoire ');
        $reponse->execute();
        while ($donnees = $reponse->fetch()) {
            echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';

        }
    }
    ?>
    </form>

    <fieldset>
        <legend>Entrez Les information de votre reservation que vous souhaitez modifier </legend>
        <form method="post" action="Resultat_modifier_reservation.php">

            <label>date de reservation</label>
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

            <input type="submit" name="Valider">

        </form>


    </fieldset>
    <a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>