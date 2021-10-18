<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
    $id = $_SESSION['id'];

    if (isset($_POST['Valider']))
    {
        $req=$bdd->prepare('INSERT INTO materiel(date_emprunt,id_emprunteur, type_materiel, date_retour, quantite) VALUES (?,?,?,?,?)');
        $req->execute(array(
            $_POST['date_emprunt'],
            $id,
            $_POST['type_materiel'],
            $_POST['date_retour'],
            $_POST['quantite']));

    }
header("Location: location_materiel.php");
?>
