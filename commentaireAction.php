<?php 
	if($_COOKIE['logged_in'] == true){
		include("Connexion.php");
		include("Participer.php");
		include("Joueur.php");
		include("Match.php");

		$num_license = $_GET['num_license'];
		$id_match = $_GET['id_match'];

		$commentaire = $_POST['commentaire'];
		$infoJoueur = Joueur::getInfosJoueur($num_license);
		$infosMatch = Match::getInfosMatch($id_match);

		$bdd = new BDD();
		$req = $bdd->linkpdo->prepare('UPDATE participer SET commentaire = ? WHERE id_match = ? AND num_license = ?');
		$req->execute(array($commentaire, $id_match, $num_license));
		//header("Location: feuilleDeMatch.php?id_match=".$id_match);
	} else {
		header("Location: pageConnexion.php");
	}
?>