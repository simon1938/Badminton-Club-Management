 <?php
    session_start();

    ?>
<!doctype html>
<html lang="en">
<head>
    <title>Resultat modifier terrain</title>
</head>
<body>


<form method="POST" action="Resultat_modifier_terrain.php">

    <label>Type du nouveau Terrain</label>
    <input type="text" name="type_new_terrain">

    <input type="submit" name="Valider1" value="Valider">
</form>
        <?php

           if (isset($_POST['Valider1'])) {
               if ($_POST['type_new_terrain'] != 'Simple' && $_POST['type_new_terrain'] != 'Double') {
                   echo '<strong>Type de terrain inconnu,
            Vous pouvez seulement creer des terrain Simple ou Double</strong>';
               } else {


                   $nom_terrain_amodif = $_SESSION['nom_terrain_amodif'];


                   $bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');
                   $requser = $bdd->prepare("UPDATE terrain SET type_terrain=? WHERE nom_terrain=? ");
                   $requser->execute(array($_POST['type_new_terrain'], $nom_terrain_amodif));
                   echo 'Votre modification a bien été faite';

               }
           }
        ?>
<p><a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a></p>
</body>
</html>
