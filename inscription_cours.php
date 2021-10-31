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

    $req=$bdd->prepare('SELECT id_adherent, id_cours FROM inscription_cours WHERE id_adherent = ? AND id_cours = ?');
    $req->execute(array(
        $id,
        $id_cours));
    $verif_adherent = NULL;
    while ($verif = $req->fetch()) {
        $verif_adherent = $verif['id_adherent'];
        $verif_cours = $verif['id_cours'];
    }

    if($verif_adherent != NULL && $verif_cours != NULL) {
        echo "Vous avez déjà réservé un cours sur ce créneau";
    }else{
        echo "Votre cours a bien été réservé";
        $req = $bdd->prepare('INSERT INTO inscription_cours(id_adherent, id_cours) VALUES (?,?)');
        $req->execute(array(
            $id,
            $id_cours));
    }
}

    /*header("Location: connection_compte.php");*/

?><br>
<form action = "connection_compte.PHP">
    <input type="submit" value ="OK">
</form>

