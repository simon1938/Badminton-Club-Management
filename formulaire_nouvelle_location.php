
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle location</title>
</head>
<body>
<fieldset>
    <form method="post" action="enregistrement_loc.php">

        <label>Type de matériel<br><br></label>
        <select name="type_materiel" required>
            <option value="">--Veuillez sélectionner le matériel que vous souhaitez louer--</option>
            <option value="raquette">raquette</option>
            <option value="vollant">vollant</option>
            <option value="tenue">tenue</option>
        </select>
        <label>date de retour</label>
        <input type="date" name="date_retour" min="<?php echo date("Y-m-d")?>" required>

        <label>Quantité</label>
        <input type="text" name="quantite" required>

        <input type="submit" name="Valider">

    </form>
</fieldset>
</body>
</html>

