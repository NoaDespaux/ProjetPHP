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

	<input type="textarea">
	   <nom>comment</nom>
	   <libellé>Votre commentaire</libellé>
	   <taille>2,40</taille>
	</input>

	<input type="textarea">
	   <nom>comment</nom>
	   <libellé>Votre commentaire</libellé>
	   <taille>4,64</taille>
	</input>

	<input type="textarea">
	   <nom>comment</nom>
	   <libellé>Votre commentaire</libellé>
	   <taille>8,100</taille>
	</input>
<?php 

	include("Connexion.php");
	include("Participer.php");



?>