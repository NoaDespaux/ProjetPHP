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
			include ("bd/Connexion.php");
		    include ("Joueur.php");
		    include ("Rencontre.php");
		    include ("participer.php");

		    $id_match=$_GET['id_match'];
		    $infosMatch=Rencontre::getInfosMatch($id_match);
		    $listeJoueurs = Joueur::getListeJoueurs();
		    $listeInscrits = Participer::getListeJoueursFromMatch($id_match);

			if(!empty($listeInscrits)){
				echo "<h1>Joueurs participant au match</h1>";
				$infos=[];
				$infosParticiper=[];
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
								<th></th>
								<th>Commentaire</th>";
								if($infosMatch[0]['resultat_equipe'] != null){
									echo "<th>Note</th>
										<th></th>";
								}
							echo "</tr>
						</thead>
						<tbody>";
				foreach ($infos as $item) {
					$infosParticiper = Participer::getInfosParticiper($item[0]["num_license"], $id_match);
	    			echo "	
						<tr>
							<td><a href=\"infoJoueur.php?num_license=".$item[0]['num_license']."\">" . $item[0]["nom"] . "</td>
							<td><a href=\"infoJoueur.php?num_license=".$item[0]['num_license']."\">" . $item[0]["prenom"] . "</td>
							<td>" . $item[0]["taille"] . "cm</td>
							<td>" . $item[0]["poids"] . "kg</td>
							<td>" . $item[0]["poste_prefere"] . "</td>";
							if ($infosParticiper[0]['titulaire'] == 1){
								echo '<td>Titulaire</td>';
							} elseif ($infosParticiper[0]['titulaire'] == 0) {
								echo '<td>Remplaçant</td>';
							}
							echo "<td> <img src=".$item[0]["photo"]."></td>
							<td>";
							if($infosParticiper[0]['commentaire'] == null){
								echo "<a href=commentaire.php?id_match=".$id_match."&num_license=".$item[0]["num_license"]."\" method=\"post\">Ajouter un commentaire</td>";
							} else {
								echo $infosParticiper[0]['commentaire'];
							}
							if($infosMatch[0]['resultat_equipe'] != null){	
								if($infosParticiper[0]['note'] == null){
									echo "<td><form action=\"ajoutNote.php?id_match=". $id_match."&num_license=". $item[0]["num_license"]." \"method=\"post\">
									Ajoutez la note : <br><input type=\"text\" name=\"note\"><input type=\"submit\" name=\"valider\" value=\"OK\">
									</form></td>
									<td></td>";
								} else {
								echo "<td>" . $infosParticiper[0]['note'] . "</td>";
								}
							}
						echo "
						</tr>";
				}
				echo "</tbody>
					</table>";

				if($infosMatch[0]['resultat_equipe'] == null || ($infosMatch[0]['resultat_equipe'] == 0 && $infosMatch[0]['resultat_adv'] == 0)){
					echo "<h1>Renseignez le score :</h1>
					<form action=\"score.php?id_match=".$id_match."\" method=\"post\">
						<input type=\"text\" name=\"score_france\" placeholder=\"Score de la France\">
						<input type=\"text\" name=\"score_adv\" placeholder=\"Score de l'équipe adverse\"><br>
						<input type=\"reset\" name=\"annuler\" value=\"Annuler\">
			            <input type=\"submit\" name=\"valider\" value=\"Valider\">
					</form>";
				}
			} else {
				echo "<h1>Joueurs à inscrire au match</h1>";
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
								<th>Statistiques</th>
							</tr>
						</thead>
						<tbody>";
				foreach ($listeJoueurs as $item) {
					if($item['statut'] == "Actif"){
		    		echo "<tr>
		    					<td>
		    						<input type=\"radio\" name=\"joueur".$item['num_license']."\" value=\"titulaire\">
		    						<label for=\"titulaires\">Titulaire</label>
		    						<input type=\"radio\" name=\"joueur".$item['num_license']."\" value=\"remplacant\">
		    						<label for=\"remplacants\">Remplaçant</label>
		    					</td>
								<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["nom"] . "</td>
								<td><a href=\"infoJoueur.php?num_license=".$item['num_license']."\">" . $item["prenom"] . "</td>
								<td>" . $item["taille"] . "cm</td>
								<td>" . $item["poids"] . "kg</td>
								<td>" . $item["poste_prefere"] . "</td>
								<td> <img src=".$item["photo"]."></td>
								<td><a href=\"stats.php?num_license=".$item['num_license']."\">Voir les statistiques du joueur</td>
							</tr>";
					}

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