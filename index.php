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
					</tr>
				</thead>
				<tbody>";
					
		for($i = 0; $i < listeJoueurs->rowCount(); $i++){
			
		}

				/*"</tbody>
			</table>";*/

	?>

	


</body>

