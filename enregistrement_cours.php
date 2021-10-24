<?php
session_start();
include 'connexion_bdd.php';
$id = $_SESSION['id'];


if(isset($_POST['envoyer2'])){

            $req=$bdd->prepare('INSERT INTO cours(date_cours,horaire) SELECT id VALUES (?,?)');
        $req->execute(array(
            $_POST['jour'],
            $_POST['heure']))

		while ($donnees=$req->fetch()) 
		{
		}

        $req=$bdd->prepare('INSERT INTO inscription_cours(id_adherent,id_cours) VALUES (?,?)');
        $req->execute(array(
            $id,
            $donnees));
        }
header("Location: cours2.php");
?>