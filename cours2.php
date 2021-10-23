
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
if(isset($_POST['envoyer'])) {

    if ($_POST['choix'] == "date")
    {
        echo 'Vous avez choisis l\'option date';
        ?>
        <fieldset>
            <form method="post" action="enregistrement_cours.php">
                <label>Sélectionner un jour<input type="date" name="jour" max="2023-01-01" required> </label>
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