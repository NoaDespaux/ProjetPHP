<?php

	if(!($_COOKIE['logged_in'] == true)){
		header("Location: pageConnexion.php");
	}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Equipe de Handball</title>
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
	<?php
		
			include ("Connexion.php");
		    include ("Joueur.php");
		    include ("Rencontre.php");

		    $listeJoueurs = Joueur::getListeJoueurs();

			echo "<h1>Joueurs</h1>
				<table>
					<thead>
						<tr>
							<th>Nom Prénom</th>
							<th>Date de naissance</th>
							<th>Poste préféré</th>
							<th>Statut</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>";
			foreach ($listeJoueurs as $item) {
	    		echo "<tr>
							<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["nom"] . "  " . $item["prenom"] . "</td>
							<td>" . $item["date_naissance"] . "</td>
							<td>" . $item["poste_prefere"] . "</td>
							<td>" . $item["statut"] . "</td>
							<td><a href=\"modificationJoueur.php?num_license=".$item['num_license']."\">Modifier</td>
							<td><a href=\"suppressionJoueur.php?num_license=".$item['num_license']."\">Supprimer</td>
						</tr>";
			
	  		}
			echo 	"</tbody>
					</table><br>
					 <div class=\"bouton\"><a href=\"ajoutJoueur.php\">Ajouter un joueur</a></div>";


			$listeMatchs = Rencontre::getListeMatchs();

			echo "<h1>Matchs</h1>
				<table>
					<thead>
						<tr>
							<th>Date - Heure</th>
							<th>Equipe Adverse</th>
							<th>Lieu</th>
							<th>Domicile</th>
							<th>Resultat France</th>
							<th>Resultat Adverse</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>";
			foreach ($listeMatchs as $item) {
	    		echo "<tr>
							<td><a href=\"infoMatch.php?id_match=".$item['id_match']."\">" . $item["date_heure"] . "</td>
							<td><a href=\"infoMatch.php?id_match=".$item['id_match']."\">" . $item["nom_adverse"] . "</td>
							<td>" . $item["lieu"] . "</td>
							<td>";
							 if ($item["domicile"] == 0){echo "Non</td>";}
							 else {echo "Oui</td>";}
					  echo "<td>" . $item["resultat_equipe"] . "</td>
							<td>" . $item["resultat_adv"] . "</td>
							<td><a href=\"feuilleDeMatch.php?id_match=".$item['id_match']."\">Feuille de Match</td>
							<td><a href=\"modificationMatch.php?id_match=".$item['id_match']."\">Modifier</td>
							<td><a href=\"suppressionMatch.php?id_match=".$item['id_match']."\">Supprimer</td>
						</tr>";
	  		}
			echo 	"</tbody><br>
					</table>
					 <div class=\"bouton\"><a href=\"ajoutMatch.php\">Ajouter un match</a></div>";

	?>
</body>