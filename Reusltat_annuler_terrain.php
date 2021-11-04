<!doctype html>
<html lang="en">
<head>

    <title>Résultat annuler terrain</title>
</head>
<body>
<?php

    $id_reservationp=$_POST['id_reservationn'];
     $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
     $reponse = $bdd->prepare("DELETE FROM inviter WHERE id_reservation =?");

     $reponse->execute(array($id_reservationp));
            echo 'fait';


    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
    $reponse = $bdd->prepare("DELETE FROM repertoire WHERE id =?");
    $reponse->execute(array($id_reservationp));
    echo 'fait';
?>
<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>