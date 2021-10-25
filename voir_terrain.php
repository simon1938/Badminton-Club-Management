<!doctype html>
<html lang="en">
<head>

    <title>Voir les terrains</title>
</head>
<body>
    <h1>Voici les créneaux déja pris</h1>

    <form method="post"action="voir_terrain.php">
        <input type="submit" name="BT_Trier_terrain" value="Trier par nom de terrain">
        <input type="submit" name="BT_Trier_date" value="Trier par date de reservation">
        <input type="submit" name="BT_Trier_horaire" value="Trier par horaire de reservation"><br/>

<?php
    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');




if (isset($_POST['BT_Trier_date'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire ORDER BY date_reservation");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}

if (isset($_POST['BT_Trier_terrain'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire ORDER BY nom_terrain");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}

if (isset($_POST['BT_Trier_horaire'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire ORDER BY horaire");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}

    ?>
        <a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
    </form>
</body>
</html>