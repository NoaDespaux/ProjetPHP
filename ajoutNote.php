<?php 

	if($_COOKIE['logged_in'] == true){

		include("Connexion.php");

		$num_license = $_GET['num_license'];
		$id_match = $_GET['id_match'];
		$note = $_POST['note'];

		$bdd = new BDD();
		$req = $bdd->linkpdo->prepare('UPDATE participer SET note = ? WHERE id_match = ? AND num_license = ?');
		$req->execute(array($note, $id_match, $num_license));
		header("Location: feuilleDeMatch.php?id_match=".$id_match);
	} else {
		header("Location: index.html");
	}

?>