<!doctype html>
<html lang="en">
<head>
             <title>Résultat de votre requete</title>
</head>
<body>
  <h1>Voici les résultat de votre recherche de réservation</h1>
</body>
</html>
<?php
session_start();
if(empty($_POST['horaire'])
    ||empty($_POST['date_reservation'])||empty($_POST['nom_terrain']))
{
    echo ' "Un des champs est vide "
        <a href="modifier_reservation_existante.php">Recommencer</a>';

}
else {
    $_SESSION['Modif_horaire'] = $_POST['horaire'];
    $_SESSION['Modif_date_reservation']=$_POST['date_reservation'];
    $_SESSION['Modif_nom_terrain']= $_POST['nom_terrain'];
    $id_joueur = $_SESSION['id'];


    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
    $requser = $bdd->prepare("SELECT id FROM repertoire WHERE nom_terrain=? AND date_reservation=? AND horaire=? AND id_joueur=?");
    $requser->execute(array($_SESSION['Modif_nom_terrain'], $_SESSION['Modif_date_reservation'], $_SESSION['Modif_horaire'], $id_joueur));

    $id = $requser->fetch();
    if ($id) {
            $_SESSION['id_reservation_Modif']=$id ['id'];
            header("location:modifier_Reservation_reconue.php");

    }
    else
    {
        echo 'votre résservation pas reconnue';
    }
}

        ?>
<p><a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a></p>
<a href="modifier_reservation_existante.php">Reessayer</a>
