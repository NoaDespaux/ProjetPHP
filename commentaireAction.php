<?php 
	if($_COOKIE['logged_in'] == true){
		include("bd/Connexion.php");
		include("participer.php");
		include("Joueur.php");
		include("Rencontre.php");

		$num_license = $_GET['num_license'];
		$id_match = $_GET['id_match'];

		$commentaire = $_POST['commentaire'];
		$infoJoueur = Joueur::getInfosJoueur($num_license);
		$infosMatch = Rencontre::getInfosMatch($id_match);

		$bdd = new BDD();
		$req = $bdd->linkpdo->prepare('UPDATE participer SET commentaire = ? WHERE id_match = ? AND num_license = ?');
		$req->execute(array($commentaire, $id_match, $num_license));
		header("Location: feuilleDeMatch.php?id_match=".$id_match);
	} else {
		header("Location: pageConnexion.php");
	}
?>