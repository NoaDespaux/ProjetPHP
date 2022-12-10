<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Equipe de Handball</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
		include ("Connexion.php");
	    include ("Joueur.php");

	    $listeJoueurs = Joueur::getListeJoueurs();

		echo "<table>
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Date de naissance</th>
						<th>Poste préféré</th>
						<th>Statut</th>
						<td></td>
						<td></td>
					</tr>";

		foreach ($listeJoueurs as $item) {
    		echo "<tr>
						<td>" . $item["nom"] . "</td>
						<td>" . $item["prenom"] . "</td>
						<td>" . $item["date_naissance"] . "</td>
						<td>" . $item["poste_prefere"] . "</td>
						<td>" . $item["statut"] . "</td>
						<td class=\"modif\"><a href=\"modification.php?id=".$item['num_license']."\">Modifier</td>
						<td class=\"modif\"><a href=\"suppression.php?id=".$item['num_license']."\">Supprimer</td>
					</tr>";
  		}

		echo 	"</thead>
			<tbody>";
	?>

	


</body>

