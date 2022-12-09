<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Equipe de hand</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

	<?php

		include ("Connexion.php");
	    include ("Joueur.php");

	    $num = 2;

	    $j = new Joueur($num);
	    $j->getNomJoueur();

	?>

</body>

