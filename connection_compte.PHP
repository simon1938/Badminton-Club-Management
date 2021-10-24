<?php
session_start();
include 'connexion_bdd.php';
/*
$nom=$_POST['nom'];
$mot_de_passe=$_POST['mot_de_passe'];
*/

if ($_SESSION['session_active']==1)
{
     $email=$_SESSION['email'];
     $mot_de_passe=$_SESSION['mot_de_passe'];

}else{
	$email=$_POST['email'];
	$mot_de_passe=$_POST['mot_de_passe'];
	}


$requser=$bdd->prepare("SELECT mot_de_passe FROM adherent WHERE email=?");
$requser->execute(array($email));
while ($donnees=$requser->fetch())
{
    $result = password_verify($mot_de_passe, $donnees['mot_de_passe']);
}

if ($result == 1)
 {
     $req = $bdd->prepare('SELECT id, nom, prenom FROM `adherent` WHERE email = ?');
     $req->execute(array($email));
     while ($donnees = $req->fetch()){$id = $donnees['id']; $nom = $donnees['nom']; $prenom = $donnees['prenom'];};

     $_SESSION['email']=$email;
     $_SESSION['mot_de_passe']=$mot_de_passe;
     $_SESSION['session_active']=1;
     $_SESSION['id']=$id;
     $_SESSION['nom']=$nom;
     $_SESSION['prenom']=$prenom;

     echo '<strong>'.'Vous êtes bien connecter '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</strong>';

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

	<a href="liste des adherents.PHP"><input type="submit" value="Voir liste des adherents"></a>
	<br><br>
	<a href="reservation_terrain.php"><input type="submit" value="Reserver un terrain"></a>
	<br><br>
	<a href="voir_terrain_disponible.PHP"><input type="submit" value="Voir les terrain disponible"></a>
	<br><br>
	<a href="location_materiel.PHP"><input type="submit" value="Location de materiel"></a>
	<br><br>
	<a href="cours2.PHP"><input type="submit" value="cours"></a>
    <br><br>

    <a href="Page_acceuil.php"><input type="submit" value="Déconnexion"></a>
	<!--

	consulter liste adherent
	//reserver un terrain
	// voir les terrain disponible
	//rechercher un autre adherent (nom email trié liste par nom)</!-->

</body>
</html>
