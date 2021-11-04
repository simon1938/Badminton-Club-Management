<?php
include 'connexion_bdd.php';
session_start();
$id = $_SESSION['id'];
?>
<html>
<head>
    <title>Inscription cours </title>
</head>
<body>


<?php
//Lors de l'ouverture de la section cours
if(isset($_POST['cours'])){
    //On récupère l'id des cours qui sont déjà passés
    $requete = $bdd->prepare("SELECT id FROM cours WHERE date_cours < ?");
    $requete->execute(array(date('Y-m-d')));
    while ($donnees=$requete->fetch())
    {
        //On supprime les inscription reliées à cet id
        $supprimer_inscription=$bdd->prepare('DELETE FROM inscription_cours WHERE id_cours = ?');
        $supprimer_inscription->execute([$donnees['id']]);
        //On supprime le cours relié à cet id
        $supprimer_cours=$bdd->prepare('DELETE FROM cours WHERE id = ?');
        $supprimer_cours->execute([$donnees['id']]);
    }

}
//Si la personne connecté est un utilisateur on lui affiche l'espace utilisateur
if($_SESSION['statut'] == 'utilisateur'){
?>
<fieldset>
    <legend>Prochains cours auxquels vous êtes inscrit</legend>
    <?php
    //On affiche tous les cours à venir auxquels l'utilisateur s'est inscrit
    $requete = $bdd->prepare("SELECT heure_debut, heure_fin, nom_prof, date_cours FROM cours INNER JOIN inscription_cours ON cours.id = inscription_cours.id_cours WHERE id_adherent = ?");
    $requete->execute(array($id));
    while ($donnees=$requete->fetch())
    {
        echo 'Vous êtes inscrit au cours de '.$donnees['nom_prof'].' de '.$donnees['heure_debut'].'
         à '.$donnees['heure_fin'].' le '.date('d M Y', strtotime($donnees['date_cours'])).'<br />';
    }
    ?>
</fieldset>
    <!--Grâce à un formulaire on affiche les 7 prochains jours pour lesquels l'utilisateur peut s'inscrire à un cours-->
    <form method="post">
        <fieldset><legend>Sélectionnez le prochain jour pour lequel vous voulez participer à un cours</legend><?php
            $today = date('Y-m-d');
            for($x = 1; $x < 7; $x++){
                ?>
                <label>
                    <input type="radio" value="<?php echo $today;?>" name="jour" required>
                    <?php echo date('d M Y', strtotime($today));?><br>
                </label>
                <?php
                $today = date('Y-m-d');
                $today=strftime("%Y-%m-%d", strtotime("$today +$x day"));
            }
            ?>
            <br>
            <input type="submit" value="Valider" name="valider">
        </fieldset>
    </form>

<?php
//Si la personne connecté est un administrateur on lui affiche l'espace administrateur
}else{?>
    <fieldset>
    <legend>Vos cours</legend>
    <?php

    $requete = $bdd->prepare("SELECT heure_debut, heure_fin, date_cours FROM cours WHERE nom_prof = ?");

    $requete->execute(array($_SESSION['nom']));

    while ($donnees=$requete->fetch())
    {
        echo 'Vous avez cours le '.date('d M Y', strtotime($donnees['date_cours'])).' de '.$donnees['heure_debut'].' à '.$donnees['heure_fin'].'<br />';
    }

    }?>
</fieldset>


<?php
if(isset($_POST['valider'])){
    $today = $_POST['jour'];
    ?>
    <!--On affiche à l'aide d'un menu déroulant les horaires pour lesquels il existe des cours où le joueur peut s'inscrire-->
    <fieldset>
        <legend><?php
            echo "Horaire disponible pour les cours du ".date('d M Y', strtotime($today));
            ?></legend>
        <form method="post" action="inscription_cours.php">
            <input type="hidden" value="<?php echo $_POST['jour']?>" name="jour">
            <p><select name="heure" required></p>
            <?php

            $reponse=$bdd->prepare('SELECT heure_debut, heure_fin FROM cours WHERE date_cours = ?');
            $reponse->execute([$today]);
            while ($donnees=$reponse->fetch())
            {
                ?>
                <option value="<?php echo $donnees['heure_debut'];?>"> <?php echo "de ".$donnees['heure_debut']." à ".$donnees['heure_fin'];?> </option>
                <?php
            }

            ?>
            <input type="submit" name="envoyer" value="Réserver" required>
        </form>
    </fieldset>
    <?php
    }
    //Si la personne connectée est un administrateur on lui propose d'jouter ou de supprimer des cours
    if($_SESSION['statut'] == "administrateur"){
        ?>
            <form method="post" action="ajout_cours.php">
                <input type="submit" name="ajouter_cours" value = "Ajouter un cours">
            </form>

            <form method="post" action="suppression_cours.php">
                <input type="submit" name="suppr_cours" value = "Supprimer un cours">
            </form>
        <?php
    }else{}
    ?>
 <a href="connection_compte.PHP">Retourner sur votre espace utilisateur</a>
</body>
</html>