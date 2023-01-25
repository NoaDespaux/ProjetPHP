<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Informations du match</title>
    <link rel="stylesheet" href="styles.css">
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
	<h1>Informations sur le match</h1>
	<?php
		if($_COOKIE['logged_in'] == true){
		include ("Rencontre.php");
		include ("bd/Connexion.php");

		$id_match=$_GET['id_match'];
		$infos=Rencontre::getInfosMatch($id_match);

		echo 'Date et heure du match : '.$infos[0]['date_heure'].'<br>';
		echo "Nom de l'équipe adverse : ".$infos[0]['nom_adverse']."<br>";
		echo 'Lieu : '.$infos[0]['lieu'].'<br>';
		if($infos[0]['domicile'] == 1){
			echo "Match joué à domicile<br>";
		} else {
			echo "Match joué à l'extérieur<br>";
		}
		if(!(empty($infos[0]['resultat_equipe'])) || !(empty($infos[0]['resultat_adv']))){
			echo 'Résultat : France  '.$infos[0]['resultat_equipe'].' - '.$infos[0]['resultat_adv'].'  '.$infos[0]['nom_adverse'].'<br>';
		} else {
			echo 'Résultat non renseigné<br>';
		}
		
	} else {
		header("Location: pageConnexion.php");
	}
	?>

</body>