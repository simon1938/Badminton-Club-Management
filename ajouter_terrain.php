<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ajouter terrain</title>
</head>
<body>

<h1>Choisissez le nom du Terrain a ajouter </h1>

<form method="post" action="ajouter_terrain.php">

    <label>Nom du nouveau Terrain</label>
    <input type="text" name="nom_new_terrain">

    <label>Type du nouveau Terrain</label>
    <input type="text" name="type_new_terrain">

    <input type="submit" name="Valider" value="Valider">
</form>

<?php
if(isset($_POST['Valider']))
{
    $bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');
    $requser = $bdd->prepare("SELECT nom_terrain FROM terrain WHERE nom_terrain=? ");
    $requser->execute(array( $_POST['nom_new_terrain']));
    while ($donnee=$requser->fetch())
    {
        $exist=$donnee['nom_terrain'];
    }
    if(isset($exist))
    {
        echo '<strong>le terrain existe déjà</strong>';
    }
    elseif($_POST['type_new_terrain']!='Simple'&&$_POST['type_new_terrain']!='Double')
    {
        echo '<strong>Type de terrain inconnu, 
        Vous pouvez seulement creer des terrain Simple ou Double</strong>';
    }
    else
    {
        $bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');
        $requser = $bdd->prepare("INSERT INTO terrain(nom_terrain,type_terrain)VALUES(?,?)");
        $requser->execute(array( $_POST['nom_new_terrain'],$_POST['type_new_terrain']));
        echo 'Votre Terrain à été ajouter avec succes';
    }

}
?>

<p><a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a></p>
</body>
</html>