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

	Commentaire :
	<input type="textarea" name="commentaire" placeholder="Entrez votre commentaire">
	
<?php 

	include("Connexion.php");
	include("Participer.php");



?>