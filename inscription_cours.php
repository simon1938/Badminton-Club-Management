<?php
session_start();
include 'connexion_bdd.php';
$id = $_SESSION['id'];


if(isset($_POST['envoyer'])) {


    $req = $bdd->prepare('SELECT id FROM cours WHERE date_cours = ? AND heure_debut = ?');
    $req->execute(array(
        $_POST['jour'],
        $_POST['heure']));

    while ($donnees = $req->fetch()) {
        $id_cours = $donnees['id'];
    }

    $req=$bdd->prepare('INSERT INTO inscription_cours(id_adherent, id_cours) VALUES (?,?)');
    $req->execute(array(
        $id,
        $id_cours));

}
    header("Location: connection_compte.php");

?>