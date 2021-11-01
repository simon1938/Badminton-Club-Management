
<p>Voici les résultats :</p>



<?php



include 'connexion_bdd.php';

$req=$bdd->prepare('SELECT id FROM adherent WHERE nom=?');
		$req->execute([$_POST['nom']]);
		$nom=$req->fetch();
		




	$req=$bdd->prepare('SELECT id FROM adherent WHERE email=?');
		$req->execute([$_POST['email']]);
		$email=$req->fetch();
		

if(empty($_POST['nom'])||
   empty($_POST['email'])||
   empty($_POST['adresse'])||
   empty($_POST['prenom'])||
   empty($_POST['date_naissance'])||
   empty($_POST['date_adhesion'])||
   empty($_POST['mot_de_passe'])
)
		{
			echo 'un des champs est vide veuillez réassayer';
			?><br /><a href="Formulaire_Creation_compte.php">Réessayer</a> <?php

		}

elseif($email)
	{
				echo'email existe déja';
				?><br /><a href="Formulaire_Creation_compte.php">Réessayer</a> <?php
	}
else
{

echo'yolamoula';


 if($_POST['code_admin'] == 'XAMPP'){
     $admin = 1;
 }else{
     $admin = 0;
 }


	$req=$bdd->prepare('INSERT INTO adherent(nom,prenom,email,adresse,date_naissance,date_adhesion,mot_de_passe,statut) VALUES (?,?,?,?,?,?,?,?)');
	$req->execute(array(
		 $_POST['nom'],
		 $_POST['prenom'],
		 $_POST['email'],
		 $_POST['adresse'],
		 $_POST['date_naissance'],
		 $_POST['date_adhesion'],
		 password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT),
        $admin
		 )); 

		}
?>

<a href="Page_acceuil.php">Retourner surl'écran d'acceuil</a>
