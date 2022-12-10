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

	    $listeJoueurs = Joueur::getListeJoueurs();

		echo "<table>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Date de naissance</th>
						<th>Poste préféré</th>
						<th>Statut</th>
					</tr>";

		foreach ($listeJoueurs as $item) {
    		echo "<tr>
						<td>" . $item["nom"] . "</td>
						<td>" . $item["prenom"] . "</td>
						<td>" . $item["date_naissance"] . "</td>
						<td>" . $item["poste_prefere"] . "</td>
						<td>" . $item["statut"] . "</td>
					</tr>";
  		}


		echo 	"</thead>
			<tbody>";

	?>

	


</body>

