<?php
include 'connexion_bdd.php';

if(isset($_POST['envoyer2'])){
echo 'Veuillez choisir l\'heure';
echo $_POST['jour'];
?>
<fieldset>
    <form method="post" action="enregistrement_cours.php">
        <input type="hidden" name="jour" value="<?php echo $_POST['jour'] ?>" />
        <p><select name="heure" ></p>

        <?php

        $rep=$bdd->prepare('SELECT heure_debut FROM cours WHERE date_cours = ?');
        $rep->execute([$_POST['jour']]);

        while ($donnees=$rep->fetch())
        {
            ?>
            <option value="<?php echo $donnees['heure_debut'];?>"> <?php echo $donnees['heure_debut'];?> </option>

            <?php

        }
        }
        ?>

        <input type="submit" name="envoyer2">
    </form>
</fieldset>





