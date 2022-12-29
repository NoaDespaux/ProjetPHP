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
	    include ("Participer.php");

	    $id_match=$_GET['id_match'];
	    $listeJoueurs = Joueur::getListeJoueurs();
	    $listeInscrits = Participer::getListeJoueursFromMatch($id_match);


		if(!empty($listeInscrits)){
			echo "<h1>Joueurs participant au match n°".$id_match."</h1>";
			$infos=[];
			foreach($listeInscrits as $inscrit){
				array_push($infos, Joueur::getInfosJoueur($inscrit['num_license']));
			}
			echo "<table>
					<thead>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Taille</th>
							<th>Poids</th>
							<th>Poste préféré</th>
							<th></th>
						</tr>
					</thead>
					<tbody>";
			foreach ($infos as $item) {
    			echo "	
					<tr>
						<td>" . $item[0]["nom"] . "</td>
						<td>" . $item[0]["prenom"] . "</td>
						<td>" . $item[0]["taille"] . "cm</td>
						<td>" . $item[0]["poids"] . "kg</td>
						<td>" . $item[0]["poste_prefere"] . "</td>
						<td> <img src=".$item[0]["photo"]."></td>
					</tr>";
			}
		} else {
			echo "<h1>Joueurs à inscrire au match n°".$id_match."</h1>";
			echo "<form action=\"feuilleAction.php?id_match=".$id_match."\" method=\"post\">
				<table>
					<thead>
							<th>Titulaires</th>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Taille</th>
							<th>Poids</th>
							<th>Poste préféré</th>
							<th></th>
						</tr>
					</thead>
					<tbody>";
			foreach ($listeJoueurs as $item) {
	    		echo "<tr>
	    					<td><input type=\"checkbox\" name=\"liste_titulaires[]\" value=\"".$item["num_license"]."\"></td>
							<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["nom"] . "</td>
							<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["prenom"] . "</td>
							<td>" . $item["taille"] . "cm</td>
							<td>" . $item["poids"] . "kg</td>
							<td>" . $item["poste_prefere"] . "</td>
							<td> <img src=".$item["photo"]."></td>
						</tr>";
	  		}
	  		echo "<input type=\"reset\" name=\"annuler\" value=\"Annuler\">
	              <input type=\"submit\" name=\"valider\" value=\"Valider\">
	            </form>";
		}
	?>
</body>