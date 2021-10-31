<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier vos information personelle</title>
</head>
<body>
<h1>Modifier vos coordonnées</h1>
<fieldset>
    <legend>Sasissez vos nouvelles informations personnelle</legend>
    <form action="Resultat_modifer_info_perso.php" method="post">

        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" />


        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="adresse">Adresse</label>
        <input type="text" name="adresse" id="adresse">


        <label for="date_naissance">Date de naissance</label>
        <input type="date" name="date_naissance" id="date_naissance">

        <label for="date_adhesion">Date d'adhesion</label>
        <input type="date" name="date_adhesion"id="date_adhesion">


        <label for="mot_de_passe">Mot de passe</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe">

        <input type="submit" name="Valider">

    </form>
    <a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>

</fieldset>


</body>
</html>