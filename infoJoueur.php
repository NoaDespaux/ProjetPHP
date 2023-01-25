<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Informations du joueur</title>
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
	<h1>Informations sur le joueur</h1>
	<?php
		if($_COOKIE['logged_in'] == true){
			include ("Joueur.php");
			include ("bd/Connexion.php");

			$num_license=$_GET['num_license'];
			$infos=Joueur::getInfosJoueur($num_license);

			//echo 'Photo : '.$infos[0]['photo'].'<br>';
			echo '<img src='.$infos[0]['photo'].'><br>';
			echo $infos[0]['nom'].'<br>';
			echo $infos[0]['prenom'].'<br>';
			echo 'Date de naissance : '.$infos[0]['date_naissance'].'<br>';
			echo 'Taille : '.$infos[0]['taille'].'cm<br>';
			echo 'Poids : '.$infos[0]['poids'].'kg<br>';
			echo 'Poste préféré : '.$infos[0]['poste_prefere'].'<br>';
			echo $infos[0]['statut'].'<br>';
			echo '<a href="stats.php?num_license='.$num_license	.'">Voir les statistiques du joueur';
		} else {
			header("Location: pageConnexion.php");	
		}
	?>

</body>