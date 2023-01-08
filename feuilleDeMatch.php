<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Feuille de Match</title>
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
		if($_COOKIE['logged_in'] == true){
			include ("Connexion.php");
		    include ("Joueur.php");
		    include ("Match.php");
		    include ("Participer.php");

		    $id_match=$_GET['id_match'];
		    $infosMatch=Match::getInfosMatch($id_match);
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
								<th>Commentaire</th>
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
							<td><a href=commentaire.php?id_match=".$id_match."?num_license=".$inscrit["num_license"]."\" method=\"post\">Ajouter un commentaire</td>
						</tr>";
				}
				echo "</tbody>
					</table>";

				if($infosMatch[0]['resultat_equipe'] == null){
					echo "<h1>Renseignez le score :</h1>
					<form action=\"score.php?id_match=".$id_match."\" method=\"post\">
						<input type=\"text\" name=\"score_france\" placeholder=\"Score de la France\">
						<input type=\"text\" name=\"score_adv\" placeholder=\"Score de l'équipe adverse\"><br>
						<input type=\"reset\" name=\"annuler\" value=\"Annuler\">
			            <input type=\"submit\" name=\"valider\" value=\"Valider\">
					</form>";
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
		  		echo "</tbody>
		  			</table>
		  			<input type=\"reset\" name=\"annuler\" value=\"Annuler\">
		            <input type=\"submit\" name=\"valider\" value=\"Valider\">
		            </form>";
			}
		} else {
			header("Location: pageConnexion.php");
		}
	
	?>
</body>