
<html>
<head>
	<title> </title>
</head>
<body>
<fieldset>
	<form method="post">
		<label>Choisir le cours en fonction de (date/horaire)<input required type="radio" name="choix" value="date"> </label>
		<br><br>
        <label>Choisir le cours en fonction du prof<input required type="radio" name="choix" value="prof"> </label>
        <br><br>
        <input type="submit" name="envoyer">
	</form>
</fieldset>

<?php
include 'connexion_bdd.php';
if(isset($_POST['envoyer'])) {

    if ($_POST['choix'] == "date")
    {
        echo 'Vous avez choisis l\'option date';
        ?>
        <fieldset>
            <form method="post" action="inscription_cours.php">
                <p><select name="jour"></p>

                <?php

                $reponse=$bdd->query('SELECT date_cours FROM cours');
                $reponse->execute();

                while ($donnees=$reponse->fetch())
                {
                    ?>
                    <option value="<?php echo $donnees['date_cours'];?>"> <?php echo $donnees['date_cours'];?> </option>

                    <?php

                }

                ?>

                <br><br>
                <label>Sélectionner une plage horaire<input type="time" name="heure" min="08:00" max="19:00" step="3600" required></label>
                <br><br>
                <input type="submit" name="envoyer2">
            </form>
        </fieldset>
        <?php
    }
    else
    {
        echo 'Vous avez choisis l\'option prof';
    }
}
?>

</body>
</html>