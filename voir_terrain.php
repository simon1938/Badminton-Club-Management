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
        <h2>Pour trier jour par jour</h2>
        <input type="submit" name="B_LUNDI" value="LUNDI">
        <input type="submit" name="B_MARDI" value="MARDI">
        <input type="submit" name="B_MERCREDI" value="MERCREDI">
        <input type="submit" name="B_JEUDI" value="JEUDI">
        <input type="submit" name="B_VENDREDI" value="VENDREDI">
        <input type="submit" name="B_SAMEDI" value="SAMEDI">
        <input type="submit" name="B_DIMANCHE" value="DIMANCHE"><br>
        <h2>Pour trier heure par heure </h2>
        <input type="submit" name="B_10H" value="10H">
        <input type="submit" name="B_11H" value="11H">
        <input type="submit" name="B_12H" value="12H">
        <input type="submit" name="B_13H" value="13H">
        <input type="submit" name="B_14H" value="14H">
        <input type="submit" name="B_15H" value="15H">
        <input type="submit" name="B_16H" value="16H"><br>



<?php
    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');

    //HEURE par HEURE//

if (isset($_POST['B_10H'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE horaire LIKE '10%'  ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }
}

if (isset($_POST['B_11H'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE horaire LIKE '11%'  ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_12H'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE horaire LIKE '12%'  ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_13H'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE horaire LIKE '13%'  ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_14H'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE horaire LIKE '14%'  ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_15H'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE horaire LIKE '15%'  ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_16H'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE horaire LIKE '16%'  ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}


    //FIN HEURE PAR HEURE//
//JOUR PAR JOUR//
if (isset($_POST['B_LUNDI'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE DAYOFWEEK(date_reservation)=2 ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}

if (isset($_POST['B_MARDI'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE DAYOFWEEK(date_reservation)=3 ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}

if (isset($_POST['B_MERCREDI'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE DAYOFWEEK(date_reservation)=4 ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_JEUDI'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE DAYOFWEEK(date_reservation)=5 ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_VENDREDI'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE DAYOFWEEK(date_reservation)=6 ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}
if (isset($_POST['B_SAMEDI'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE DAYOFWEEK(date_reservation)=7 ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}

if (isset($_POST['B_DIMANCHE'])) {

    $reponse = $bdd->query("SELECT date_reservation,horaire,nom_terrain  FROM repertoire WHERE DAYOFWEEK(date_reservation)=1 ");

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' ' . $donnees['horaire'] . $donnees['nom_terrain'] . '<br />';
    }

}


//FIN JOUR par JOUR//
//CATEGORIE

if (isset($_POST['BT_Trier_date'])) {

    $reponse = $bdd->query('SELECT date_reservation,horaire,nom_terrain  FROM repertoire  ORDER BY date_reservation');

    while ($donnees = $reponse->fetch()) {
        echo $donnees['date_reservation'] . ' // ' . $donnees['horaire'] .' // '. $donnees['nom_terrain'] . '<br />';
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
//FIN CATEGORIE//
    ?>
        <a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
    </form>
</body>
</html>