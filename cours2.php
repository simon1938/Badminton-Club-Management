
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
            <form method="post">
                <label>Sélectionner un jour<input type="date" name="jour" max="01/01/2023"> </label>
                <br><br>
                <label>Sélectionner une plage horaire
                    <select>
                        <option>8:00 - 9:00</option>
                        <option>9:00 - 10:00</option>
                        <option>10:00 - 11:00</option>
                        <option>11:00 - 12:00</option>
                        <option>12:00 - 13:00</option>
                        <option>13:00 - 14:00</option>
                        <option>14:00 - 15:00</option>
                        <option>15:00 - 16:00</option>
                        <option>16:00 - 17:00</option>
                    </select> </label>
                <br><br>
                <input type="submit" name="envoyer">
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