
<html>
<head>
	<title>Inscription cours </title>
</head>
<body>


<?php
include 'connexion_bdd.php';
        ?>
    <form method="post">

        <fieldset><legend>Jour de votre prochain cours</legend><?php
            $today = date('Y-m-d');
            for($x = 1; $x < 7; $x++){
                ?>
                <label>
                    <input type="radio" value="<?php echo $today;?>" name="jour">
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
                <p><select name="heure"></p>

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
                <input type="submit" name="envoyer" value="Réserver">
            </form>
        </fieldset>
    <?php
    }
    ?>
</body>
</html>