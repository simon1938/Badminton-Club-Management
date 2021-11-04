<!doctype html>
<html lang="en">
<head>
    <title>Modifier des terrrains</title>
</head>
<body>
<h1>Ajouter/supprimer/Modifier des terrains</h1>
    <h2>Veuillez choisir ce que vous voulez faire</h2>
        <form method="post" action="VIP_ajouter_modifier_terrain.php">

    <input type="submit" name="modifier" value="modifier un terrrain">
    <input type="submit" name="ajouter" value="ajouter un terrrain">
        </form>
    <?php

            if(isset($_POST['modifier']))
            {
            header("location:modifier_terrain.php");
             }

        if(isset($_POST['ajouter']))
        {
            header("location:ajouter_terrain.php");
        }

    ?>
<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>
