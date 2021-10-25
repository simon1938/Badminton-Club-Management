
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terrain Disponible</title>
</head>
<body>
<h1>Voici les Terrains disponibles Actuellement </h1>

<?php
session_start();
if(empty($_POST['horaire'])
    ||empty($_POST['nombre_invite'])||empty($_POST['autre_adherent'])
    ||empty($_POST['date_reservation'])||empty($_POST['nom_terrain']))
{
    echo ' "Un des champs est vide "
        <a href="reservation_terrain.php">Recommencer</a>';

}
else
{
    $horaire=$_POST['horaire'];
    $nombre_invite=$_POST['nombre_invite'];
    $autre_adherent=$_POST['autre_adherent'];
    $date_reservation=$_POST['date_reservation'];
    $nom_terrain=$_POST['nom_terrain'];

//vérifie si la réservation est possible.
    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
    $requser=$bdd->prepare("SELECT date_reservation,horaire,nom_terrain
 FROM repertoire WHERE date_reservation=? AND horaire=?AND nom_terrain=? ");
    $requser->execute(array($date_reservation,$horaire,$nom_terrain));
$i=0;

    while($donnee=$requser->fetch())
    {
    $i=$i+1;

    }

        if($i!=0){
            echo 'Créneaux déja pris veuillez choisir un autre créneaux';
        }else
        {
            echo $date_reservation.
            $horaire.
            $nom_terrain.
            $_SESSION['id'];
            //insert dans la base le créneaux.
            $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
            $requser=$bdd->prepare("INSERT INTO repertoire(date_reservation,horaire,nom_terrain,id_joueur) VALUES(?,?,?,?) ");
            $requser->execute(array(

         $date_reservation,
		 $horaire,
         $nom_terrain,
         $_SESSION['id']
		 ));

		}



        }







?>


<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>

<?php


?>