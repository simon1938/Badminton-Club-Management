<?php

$bdd = new PDO('mysql:host=localhost;dbname=badminton;charset=utf8', 'root', '');
/*
$nom=$_POST['nom'];
$mot_de_passe=$_POST['mot_de_passe'];
*/


$requser=$bdd->prepare("SELECT nom,mot_de_passe FROM adherent WHERE nom=? AND mot_de_passe =?");
$requser->execute(array($_POST['nom'],$_POST['mot_de_passe']));
$userexist=$requser->rowCount();

if ($userexist==1)
 {
		echo 'vous exister bien coool';
}
	else	
{
	echo'erreur';
}

?>
