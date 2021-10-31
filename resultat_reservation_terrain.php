
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
    ||empty($_POST['inviter'])||empty($_POST['date_reservation'])||empty($_POST['nom_terrain']))
{
    echo ' "Un des champs est vide "
        <a href="reservation_terrain.php">Recommencer</a>';

}
else
{
    $horaire=$_POST['horaire'];
    $autre_adherent1=$_POST['autre_adherent1'];
    $autre_adherent2=$_POST['autre_adherent2'];
    $autre_adherent3=$_POST['autre_adherent3'];
    $date_reservation=$_POST['date_reservation'];
    $nom_terrain=$_POST['nom_terrain'];
    $inviter=$_POST['inviter'];

    //letruchorrrrible a faire mais marche je pense//
    $A=0;
    $B=0;
    $C=0;
    $AT=$autre_adherent1;
    $BT=$autre_adherent2;
    $CT=$autre_adherent3;


    if($AT!="pas_inviter")
    {
        $A=1;
    }
    elseif($BT!="pas_inviter"&&$BT!=$CT)
    {
        $B=1;
    }
    if($B==0&&$BT!="pas_inviter"&&$BT!=$AT){

        $B=1;
    }
    elseif($CT!="pas_inviter"&&$CT!=$AT)
    {
        $C=1;
    }
    if($C==0&&$CT!="pas_inviter"&&$CT!=$AT&&$CT!=$BT)
    {
        $C=1;
    }


    //letruchorrrrible a faire mais marche je pense//

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
                       ;
            //insert dans la base le créneaux.
            $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
            $requser=$bdd->prepare("INSERT INTO repertoire(date_reservation,horaire,nom_terrain,id_joueur,inviter_non_adherent) VALUES(?,?,?,?,?) ");
            $requser->execute(array(

         $date_reservation,
		 $horaire,
         $nom_terrain,
         $_SESSION['id'],
         $inviter
		 ));

    // insertion dans la table de jointure//

//récuperation id reservation//
            $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
            $requser=$bdd->prepare("SELECT id FROM repertoire WHERE date_reservation=? AND horaire=?AND nom_terrain=? ");
            $requser->execute(array($date_reservation,$horaire,$nom_terrain));

            while($donnee=$requser->fetch())
            {
              $id_repertoire=$donnee['id'];

            }

    echo '================'.$id_repertoire.'===============';

            //insertion ou pas des inviter dans la table de jointure //
            if($A!=0){

                $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
                $requser=$bdd->prepare("SELECT id FROM adherent WHERE nom=? ");
                $requser->execute(array($autre_adherent1));

                while($donnee=$requser->fetch())
                {
                    $id_invite_1=$donnee['id'];

                }
                $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
                $requser=$bdd->prepare("INSERT INTO inviter(id_adherent,id_reservation ) VALUES(?,?) ");
                $requser->execute(array(
                    $id_invite_1,
                    $id_repertoire


                ));
            }


            if($B!=0){
                $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
                $requser=$bdd->prepare("SELECT id FROM adherent WHERE nom=? ");
                $requser->execute(array($autre_adherent2));

                while($donnee=$requser->fetch())
                {
                    $id_invite_2=$donnee['id'];

                }
                $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
                $requser=$bdd->prepare("INSERT INTO inviter(id_adherent,id_reservation ) VALUES(?,?) ");
                $requser->execute(array(
                    $id_invite_2,
                    $id_repertoire


                ));
          }


            if($C!=0) {
                $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
                $requser = $bdd->prepare("SELECT id FROM adherent WHERE nom=? ");
                $requser->execute(array($autre_adherent3));

                while ($donnee = $requser->fetch()) {
                    $id_invite_3 = $donnee['id'];

                }
                $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
                $requser=$bdd->prepare("INSERT INTO inviter(id_adherent,id_reservation ) VALUES(?,?) ");
                $requser->execute(array(
                    $id_invite_3,
                    $id_repertoire


                ));

            }


        }



        }



    ?>




<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>

