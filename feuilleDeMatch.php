<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Feuille de Match</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<?php 

		include ("Connexion.php");
	    include ("Joueur.php");
	    include ("Match.php");

	    $listeJoueurs = Joueur::getListeJoueurs();
	    $id_match=$_GET['id_match'];

		echo "<h1>Joueurs participant au match n°".$id_match."</h1>
			<form action=\"feuilleAction.php?id_match=".$id_match."\" method=\"post\">
				<table>
					<thead>
							<th>Titulaires</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Poste préféré</th>
							<th>Statut</th>
						</tr>
					</thead>
					<tbody>";
		foreach ($listeJoueurs as $item) {
    		echo "<tr>
    					<td><input type=\"checkbox\" name=\"liste_titulaires[]\" value=\"".$item["num_license"]."\"></td>
						<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["nom"] . "</td>
						<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["prenom"] . "</td>
						<td>" . $item["poste_prefere"] . "</td>
						<td>" . $item["statut"] . "</td>
					</tr>";
  		}
  		echo "<input type=\"reset\" name=\"annuler\" value=\"Annuler\">
              <input type=\"submit\" name=\"valider\" value=\"Valider\">
            </form>";

	?>