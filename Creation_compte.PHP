<p>Voici les résultats :</p>



<?php

/*echo $_POST['nom'], $_POST['prenom'],$_POST['email'],
		 /*$_POST['adresse'],
		 $_POST['date_naissance'],
		 $_POST['date_adhesion'],
		 $_POST['mot_de_passe'];
*/


	$bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');


	$req=$bdd->prepare('INSERT INTO adherent(nom,prenom,email,adresse,date_naissance,date_adhesion,mot_de_passe) VALUES (?,?,?,?,?,?,?)');
	$req->execute(array(
		 $_POST['nom'],
		 $_POST['prenom'],
		 $_POST['email'],
		 $_POST['adresse'],
		 $_POST['date_naissance'],
		 $_POST['date_adhesion'],
		 $_POST['mot_de_passe'],
		 
		 )); 

		
?>

<a href="Page_acceuil.html">Retourner surl'écran d'acceuil</a