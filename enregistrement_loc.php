<?php
    session_start();
    include 'connexion_bdd.php';
    $id = $_SESSION['id'];
    $today = date("Y-m-d");

    if (isset($_POST['Valider']))
    {

        $req=$bdd->prepare('INSERT INTO materiel(date_emprunt,id_emprunteur, type_materiel, date_retour, quantite) VALUES (?,?,?,?,?)');
        $req->execute(array(
            $today,
            $id,
            $_POST['type_materiel'],
            $_POST['date_retour'],
            $_POST['quantite']));

    }
header("Location: location_materiel.php");
?>
