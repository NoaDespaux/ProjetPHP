<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Informations du match</title>
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
		if($_COOKIE['logged_in'] == true){
		include ("Match.php");
		include ("Connexion.php");

		$id_match=$_GET['id_match'];
		$infos=Match::getInfosMatch($id_match);

		echo 'date_heure : '.$infos[0]['date_heure'].'<br>';
		echo 'nom_adverse : '.$infos[0]['nom_adverse'].'<br>';
		echo 'lieu : '.$infos[0]['lieu'].'<br>';
		echo 'domicile : '.$infos[0]['domicile'].'<br>';
		echo 'resultat_equipe : '.$infos[0]['resultat_equipe'].'<br>';
		echo 'resultat_adverse : '.$infos[0]['resultat_adv'].'<br>';
	} else {
		header("Location: pageConnexion.php");
	}
	?>

</body>