<?php
session_start();
include 'connexion_bdd.php';
$id = $_SESSION['id'];


if(isset($_POST['envoyer2'])){

            $req=$bdd->prepare('SELECT id FROM inscription_cours WHERE date_cours = ? AND heure_debut = ?');
        $req->execute(array(
            $_POST['jour'],
            $_POST['heure']));

		while ($donnees=$req->fetch()) 
		{
		    echo $donnees['id'];
		}

        $rep=$bdd->prepare('INSERT INTO inscription_cours(id_adherent,id_cours) VALUES (?,?)');
        $rep->execute(array(
            $id,
            $donnees));
        }
/*header("Location: cours2.php");*/
?>