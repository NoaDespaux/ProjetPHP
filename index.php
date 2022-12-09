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

	<table>
		<thead>
			<tr>
				<th>Player Name</th>
				<th>Position</th>
				<th>Height (cm)</th>
				<th>Weight (kg)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tommy Smith</td>
				<td>Goalkeeper</td>
				<td>195</td>
				<td>92</td>
			</tr>
			<tr>
				<td>John Doe</td>
				<td>Right Wing</td>
				<td>182</td>
				<td>78</td>
			</tr>
			<tr>
				<td>Jane Doe</td>
				<td>Left Wing</td>
				<td>176</td>
				<td>65</td>
			</tr>
		</tbody>
	</table>


</body>

