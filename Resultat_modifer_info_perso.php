<p>Voici les résultats :</p>
<?php
session_start();
echo '============'.$_SESSION['id'].'==========='.
    $_POST['nom'].
$_POST['prenom'].
$_POST['email'].
$_POST['adresse'].
$_POST['date_naissance'].
$_POST['date_adhesion'].

$_SESSION['id']
;
            $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
            $req=$bdd->prepare('SELECT id FROM adherent WHERE email=? AND email!=?');
            $req->execute(array($_POST['email'],$_SESSION['id']));
            $id=$req->fetch();


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

elseif($id)
{
    echo'email existe déja';
    ?><br /><a href="modifier_information_compte.php">Réessayer</a> <?php
}
else
{

    echo'yolamoula';




    $bdd = new PDO('mysql:host=localhost;dbname=badminton', 'root', '');
    $req=$bdd->prepare ("UPDATE adherent SET prenom=?,nom=?,
                    email=?,mot_de_passe=?,adresse=?,date_naissance=?,date_adhesion=? WHERE id=?");
    $req->execute(array(
        $_POST['prenom'],
        $_POST['nom'],
        $_POST['email'],
        password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT),
        $_POST['adresse'],
        $_POST['date_naissance'],
        $_POST['date_adhesion'],
        $_SESSION['id']
    ));

}
?>

<a href="Page_acceuil.php">Retourner surl'écran d'acceuil</a>
