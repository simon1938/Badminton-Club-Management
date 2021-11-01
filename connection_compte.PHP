<?php
session_start();



if ($_SESSION['session_active']==1)
{
     $email=$_SESSION['email'];
     $mot_de_passe=$_SESSION['mot_de_passe'];

}else{
	$email=$_POST['email'];
	$mot_de_passe=$_POST['mot_de_passe'];
	}

include 'connexion_bdd.php';
$requser=$bdd->prepare("SELECT mot_de_passe FROM adherent WHERE email=?");
$requser->execute(array($email));
while ($donnees=$requser->fetch())
{
    $result = password_verify($mot_de_passe, $donnees['mot_de_passe']);
}

if ($result == 1)
 {
     $req = $bdd->prepare('SELECT id, nom, prenom, statut FROM `adherent` WHERE email = ?');
     $req->execute(array($email));
     while ($donnees = $req->fetch()){$id = $donnees['id']; $nom = $donnees['nom']; $prenom = $donnees['prenom'];;$statut = $donnees['statut'];};

     $_SESSION['email']=$email;
     $_SESSION['mot_de_passe']=$mot_de_passe;
     $_SESSION['session_active']=1;
     $_SESSION['id']=$id;
     $_SESSION['nom']=$nom;
     $_SESSION['prenom']=$prenom;

     if($statut == 1){
         $_SESSION['statut']= "administrateur";
     }else{
         $_SESSION['statut']= "utilisateur";
     }

     echo '<strong>'.'Vous êtes bien connecter '.$_SESSION['prenom'].' '.$_SESSION['nom'].'  </br></strong>';
     echo $_SESSION['statut'];
}else{
		$_SESSION['session_active']=2;
		header("Location: Page_acceuil.php");
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Portail de votre compte</title>
</head>
<body>
	<h1>Veuillez choisir ce que vous voulez faire</h1>
    <?php
    if($_SESSION['statut']=="administrateur") {
        echo '<p><a href="VIP_ajouter_modifier_terrain.php"><input type="submit" value="Ajouter/modifier les terrains existant"></a></p>';
    }
    ?>
	<a href="liste des adherents.PHP"><input type="submit" value="Voir liste des adherents"></a>
	<br><br>
	<a href="reservation_terrain.php"><input type="submit" value="Reserver un terrain"></a>
	<br><br>
	<a href="voir_terrain.php"><input type="submit" value="Voir les terrain disponible"></a>
	<br><br>
	<a href="location_materiel.PHP"><input type="submit" value="Location de materiel"></a>
	<br><br>
	<a href="cours2.PHP"><input type="submit" value="cours"></a>
    <br><br>
    <a href="modifier_information_compte.php"><input type="submit" value="Modifier vos information personnelle "></a>
    <br><br>
    <a href="modifier_reservation_existante.php"><input type="submit" value="Modifier vos reservation de terrain "></a>
    <br><br>
    <a href="Page_acceuil.php"><input type="submit" value="Déconnexion"></a>
	<!--

	consulter liste adherent
	//reserver un terrain
	// voir les terrain disponible
	//rechercher un autre adherent (nom email trié liste par nom)</!-->

</body>
</html>
