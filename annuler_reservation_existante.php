<!doctype html>
<html lang="en">
<head>


    <title>Annuler réservation</title>
</head>
<body>

<h1>Choisissez la réservation à annuler</h1>
<form method="post" action="Reusltat_annuler_terrain.php">
   <select name="id_reservationn">



<?php
session_start();

$id=$_SESSION['id'];
    if($_SESSION['statut']=='administrateur')
        {
        $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
        $reponse = $bdd->prepare("SELECT id,date_reservation,horaire,nom_terrain  FROM repertoire");

        $reponse->execute();

        while ($donnees = $reponse->fetch()) {
           ?>
            <option value="<?php echo $donnees['id'];?>"> <?php echo $donnees['date_reservation'] . '  ' . $donnees['horaire'] .'  '. $donnees['nom_terrain']?> </option>
        <?php
                    }
        }
    else
    {
        $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
        $reponse = $bdd->prepare("SELECT id,date_reservation,horaire,nom_terrain  FROM repertoire WHERE id_joueur=?");

        $reponse->execute([$id]);

        while ($donnees = $reponse->fetch()) {
            ?>
            <option value="<?php echo $donnees['id'];?>"> <?php echo $donnees['date_reservation'] . '  ' . $donnees['horaire'] .'  '. $donnees['nom_terrain']?> </option>
            <?php
        }
    }



        ?>


   </select>


    <input type="submit" name="envoyer" value="envoyer">
    <form>



        <a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>
