<?php

	if(!($_COOKIE['logged_in'] == true)){
		header("Location: pageConnexion.php");
	}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un commentaire</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
	<table class="menu">
  		<tr>
    		<th><a class="btnmenu" href="index.php">Accueil</a></th>
    		<th><a class="btnmenu" id ="btndeco" href="deconnexion.php">Déconnexion</a></th>
  		</tr>
	</table>
</header>

<body>

	<?php 

		echo "
			<form action=\"commentaireAction.php?id_match=". $_GET['id_match']."&num_license=". $_GET["num_license"]."method=\"post\">
				Ajoutez le commentaire : <input type=\"text\" name=\"commentaire\">
				<input type=\"reset\" name=\"annuler\" value=\"Annuler\">
		        <input type=\"submit\" name=\"valider\" value=\"Valider\">
			</form>
		";
	 ?>	
</body>