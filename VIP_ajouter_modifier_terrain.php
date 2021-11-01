<!doctype html>
<html lang="en">
<head>
    <title>Modifier des terrrains</title>
</head>
<body>
<h1>Ajouter/supprimer/Modifier des terrains</h1>
<form method="post" action="">



    <label>Choisissez le nom du Terrain </label>
<p><select name="nom_terrain"></p>

<?php

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
</form>
<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>
