<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Création d'un compte</title>
</head>
<body>
	<fieldset>
	<legend>Veuillez saisir vos coordonées</legend> 
		<form action="Creation_compte.PHP" method="post">

			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" />
			

			<label for="prenom">Prénom</label>
			<input type="text" name="prenom" id="prenom">

			<label for="email">Email</label>
			<input type="email" name="email" id="email">

			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" id="adresse">


			<label for="date_naissance">Date de naissance</label>
			<input type="date" name="date_naissance" id="date_naissance">	

			<label for="date_adhesion">Date d'adhesion</label>
			<input type="date" name="date_adhesion"id="date_adhesion">

			
			<label for="mot_de_passe">Mot de passe</label>
			<input type="password" name="mot_de_passe" id="mot_de_passe">

            <label>
                <input type="password" name="code_admin" id="code_admin">
            </label>

			<input type="submit" name="Valider">
		
		</form>


	</fieldset>


</body>
</html>