<?php
include 'connexion_bdd.php';
session_start();
$nom = 'BONNEFOY'/*$_SESSION['nom']*/;
?>
<html>
<body>
<table>

    <?php
    $today = date('Y-m-d');
    $rdv[date('d M Y', strtotime($today))]["16"] = "Mémé -_-";
    $jour = array(null, date('d M Y', strtotime($today)), date('d M Y', strtotime("$today +1 day")),
        date('d M Y', strtotime("$today +2 day")), date('d M Y', strtotime("$today +3 day")),
        date('d M Y', strtotime("$today +4 day")), date('d M Y', strtotime("$today +5 day")),
        date('d M Y', strtotime("$today +6 day")));
    echo "<tr><th>Horaires&nbsp</th>";
    for($x = 1; $x < 8; $x++){
        echo "<th>&nbsp".$jour[$x]."&nbsp</th>";

   }
    echo"</tr>";
    for($j = 8; $j < 20; $j += 1) {
        echo "<tr>";
        for($i = 0; $i < 7; $i++) {
            if($i == 0) {
                $heure = str_replace(".5", ":30", $j);
                echo "<td class=\"time\">".$heure."</td>";
            }
            echo "<td>";
            if(isset($rdv[$jour[$i+1]][$heure])) {
                echo $rdv[$jour[$i+1]][$heure];
            }
            echo "</td>";
        }
        echo "</tr>";
    }
        $requete = $bdd->prepare("SELECT heure_debut, heure_fin, date_cours FROM cours WHERE nom_prof = ?");

        $requete->execute(array($nom));

        while ($donnees = $requete->fetch()) {

        }

    ?>
</table>
</body>
</html>
