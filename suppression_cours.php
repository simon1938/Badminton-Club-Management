<?php
include 'connexion_bdd.php';
session_start();
$nom = 'BONNEFOY'/*$_SESSION['nom']*/;
?>
<html>
<body>

<fieldset>
    <!--On affiche les prochains cours programmés pour l'administrateur connecté-->
    <legend>Prochains cours programmés</legend>
    <form method="post">
    <label> Veuillez choisir  le cours que vous souhaitez supprimer
    <select name="suppr" required>

        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
        $reponse=$bdd->prepare('SELECT id, heure_debut, heure_fin, date_cours FROM cours WHERE nom_prof = ? ORDER BY date_cours;');
        $reponse->execute([$nom]);
        while ($donnees=$reponse->fetch())
        {
            ?>
            <option value="<?php echo $donnees['id'];?>"> <?php echo date('d M Y', strtotime($donnees['date_cours']))." ".date('H:i',strtotime($donnees['heure_debut']))." - ".date('H:i',strtotime($donnees['heure_fin']));?> </option>

            <?php
            $date = date('d M Y', strtotime($donnees['date_cours']));
            $heure_debut = date('H:i',strtotime($donnees['heure_debut']));
            $heure_fin = date('H:i',strtotime($donnees['heure_fin']));
        }
        ?>
    </select>

    </label>

    <input type="submit" value="Supprimer" name="valid_suppr">
    </form>
</fieldset>
<?php
//L'administrateur peut supprimer un des cours qu'il avait programmé à l'aide d'un menu déroulant
if(isset($_POST['valid_suppr'])){
    //On supprime les inscription à ce cours
    $supprimer_inscription=$bdd->prepare('DELETE FROM inscription_cours WHERE id_cours = ?');
    $supprimer_inscription->execute([$_POST['suppr']]);
    //on supprime le cours de la bdd
    $supprimer_cours=$bdd->prepare('DELETE FROM cours WHERE id = ?');
    $supprimer_cours->execute([$_POST['suppr']]);
    header("Location: cours2.php");
}
?>
<br>
<a href="cours2.php">Retourner sur l'espace cours</a>
</body>
</html>
