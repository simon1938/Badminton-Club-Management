<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Modifier terrain</title>
</head>
<body>

<h1>Choisissez le nom du Terrain a Modifier </h1>

<form method="post" action="modifier_terrain.php">
    <p>< <label>Choisissez le nom du Terrain </label>
    <p><select name="nom_terrain"></p>

    <?php
        session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');

    $reponse=$bdd->query('SELECT * FROM terrain');
    $reponse->execute();

    while ($donnee=$reponse->fetch())
    {
        ?>
        <option value="<?php echo $donnee['nom_terrain'];?>"> <?php echo $donnee['nom_terrain'].' ('.$donnee['type_terrain'].')';?> </option>



        <?php

    }

    ?>
    </select>
    <input type="submit" name="Valider" value="Valider">
</form>

    <?php
        if(isset($_POST['Valider']))
        {
            $_SESSION['nom_terrain_amodif']=$_POST['nom_terrain'];

           header('location: Resultat_modifier_terrain.php');
        }
    ?>
<p><a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a></p>
</body>
</html>