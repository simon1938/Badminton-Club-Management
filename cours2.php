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



<fieldset>
    <legend>Vos inscriptions au cours</legend>
    <?php

    $requete = $bdd->prepare("SELECT heure_debut, heure_fin, nom_prof, date_cours FROM cours INNER JOIN inscription_cours ON cours.id = inscription_cours.id_cours WHERE id_adherent = ?");

    $requete->execute(array($id));

    while ($donnees=$requete->fetch())
    {
        echo 'Vous êtes inscrit au cours de'.$donnees['nom_prof'].' de '.$donnees['heure_debut'].' à '.$donnees['heure_fin'].' le '.date('d M Y', strtotime($donnees['date_cours'])).'<br />';
    }

    ?>
</fieldset>

    <form method="post">

        <fieldset><legend>Jour de votre prochain cours</legend><?php
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
    if(isset($_POST['valider'])){
        $today = $_POST['jour'];
    ?>

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