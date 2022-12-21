<?php
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

//http://localhost/Projet_php/ProjetPHP/infoMatch.php?id_match=1

?>