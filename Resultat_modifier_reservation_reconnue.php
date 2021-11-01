<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<h1>Résultats:</h1>
<body>

</body>
</html><?php
session_start();
if(empty($_POST['horaire'])
||empty($_POST['date_reservation'])||empty($_POST['nom_terrain']))
{
echo ' "Un des champs est vide "
<a href="reservation_terrain.php">Recommencer</a>';

}
else
{
    $horaire=$_POST['horaire'];
    $date_reservation=$_POST['date_reservation'];
    $nom_terrain=$_POST['nom_terrain'];




    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
    $requser = $bdd->prepare("SELECT date_reservation,horaire,nom_terrain
 FROM repertoire WHERE date_reservation=? AND horaire=?AND nom_terrain=? AND id!=? ");
    $requser->execute(array($date_reservation, $horaire, $nom_terrain, $_SESSION['id_reservation_Modif']));
    $i = 0;

    while ($donnee = $requser->fetch()) {
        $i = $i + 1;

    }

    if ($i != 0) {
        echo 'Créneaux déja pris veuillez choisir un autre créneaux';
    } else
    {

        //insert dans la base le créneaux.
        $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
        $requser = $bdd->prepare("UPDATE repertoire SET date_reservation=?,horaire=?,nom_terrain=? WHERE id=?");
        $requser->execute(array(

            $date_reservation,
            $horaire,
            $nom_terrain,
            $_SESSION['id_reservation_Modif']


        ));
        echo '<h1>Votre réservation a bien été changé </h1> 
<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>';
    }
}
?>

