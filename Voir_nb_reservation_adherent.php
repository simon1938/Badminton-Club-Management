<!doctype html>
<html lang="en">
<head>

    <title>Voir nombre de reservation par adherent</title>
</head>
<body>
<h1>Voir nombre de reservation par adherent</h1>

<?php

    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
    $reponse = $bdd->query('SELECT email,COUNT(*) FROM adherent INNER JOIN repertoire ON adherent.id=repertoire.id_joueur GROUP BY email ');
    $reponse->execute();
    while ($donnees = $reponse->fetch()) {
        echo $donnees['email'] . ' // ' . $donnees['COUNT(*)'] . '<br />';
    }
?>

<a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>