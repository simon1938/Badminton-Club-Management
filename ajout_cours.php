<?php
include 'connexion_bdd.php';
session_start();
$nom = $_SESSION['nom'];
?>
<html>
<body>
<fieldset>
    <legend>Ajout d'un nouveau cours</legend>
    <form method="post">

        <select name="jour" required>
            <option value = "">Veuillez choisir un jour</option>
            <?php
            //On propose à l'administrateur de créer un cours durant les 30 prochains jour à l'aide d'un menu déroulant
            $today = date('Y-m-d');
            for($x = 1; $x < 30; $x++){
                ?>
                <label>
                    <option type="radio" value="<?php echo $today;?>" name="jour" required>
                        <?php echo date('d M Y', strtotime($today));?></option><br>
                </label>
                <?php
                $today = date('Y-m-d');
                $today=strftime("%Y-%m-%d", strtotime("$today +$x day"));
            }
            ?>
        </select>
        <br><br>

        <select name="heure" required>
            <option value="">Veuillez choisir une horaire</option>
            <option value="8:00">8:00 - 9:00</option>
            <option value="9:00">9:00 - 10:00</option>
            <option value="10:00">10:00 - 11:00</option>
            <option value="11:00">11:00 - 12:00</option>
            <option value="12:00">12:00 - 13:00</option>
            <option value="13:00">13:00 - 14:00</option>
            <option value="14:00">14:00 - 15:00</option>
            <option value="15:00">15:00 - 16:00</option>
            <option value="16:00">16:00 - 17:00</option>
            <option value="17:00">17:00 - 18:00</option>
            <option value="18:00">18:00 - 19:00</option>
        </select>
    <br><br>
        <input type="submit" value="Créer le cours" name="create">
    </form>
</fieldset>


<?php
//ON vérifie que le cours n'existe pas encore
//Si ce n'est pas le cas on le crée
    if(isset($_POST['create'])){
        $requete = $bdd->prepare("SELECT id FROM cours WHERE date_cours = ? AND heure_debut = ? AND nom_prof = ?");

        $requete->execute(array($_POST['jour'], $_POST['heure'], $nom));
            $verification = NULL;
        while ($verif=$requete->fetch())
        {
            $verification = $verif['id'];
        }
        $heure_fin = strtotime("+60 minutes", strtotime ($_POST['heure']));

        if($verification != NULL){
            echo"Ce cours existe déja !";
        }else{
            echo"Le cours a été créé avec succès";
            $req = $bdd->prepare('INSERT INTO cours(heure_debut, heure_fin, nom_prof, date_cours) VALUES (?,?,?,?)');
            $req->execute(array(
                $_POST['heure'],
                date('H:i',$heure_fin),
                $nom,
                $_POST['jour']));
        }
    }
?>
<a href="cours2.php">Retourner sur l'espace cours</a>
</body>
</html>