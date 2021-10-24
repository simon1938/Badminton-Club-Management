<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Terrain Disponible</title>
</head>
<body>
    <h1>Voici les Terrains disponibles Actuellement </h1>

<?php
    if(isset($_POST['horaire'])&&isset($_POST['type_terrain'])
        &&isset($_POST['nombre_invite'])&&isset($_POST['autre_adherent'])&&isset($_POST['date_reservation']))
    {

    }
    else
    {
        echo ' "Un des champs est vide "
        <a href="reservation_terrain.php">Recommencer</a>';
    }
    if($_POST['nombre_invite']==1)
    {
        echo 'edjeiojded';
    };

?>


</body>
</html>

<?php


?>
