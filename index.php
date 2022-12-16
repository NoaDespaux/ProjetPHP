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
						<th></th>
						<th></th>
					</tr>";

		foreach ($listeJoueurs as $item) {
    		echo "<tr>
						<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["nom"] . "</td>
						<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["prenom"] . "</td>
						<td>" . $item["date_naissance"] . "</td>
						<td>" . $item["poste_prefere"] . "</td>
						<td>" . $item["statut"] . "</td>
						<td><a href=\"modification.php?num_license=".$item['num_license']."\">Modifier</td>
						<td><a href=\"suppression.php?num_license=".$item['num_license']."\">Supprimer</td>
					</tr>";
  		}

		echo 	"</thead>
			<tbody>";
	?>

	


</body>

