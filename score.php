<?php
	if($_COOKIE['logged_in'] == true){
		include ("Connexion.php");

		$id_match=$_GET['id_match'];
		$score_france=$_POST['score_france'];
		$score_adv=$_POST['score_adv'];


		try{
	        $bdd = new BDD();
	        $req = $bdd->linkpdo->prepare('UPDATE rencontre SET resultat_equipe = ?, resultat_adv = ? WHERE id_match=?');
	        $req->execute(array($score_france, $score_adv, $id_match));
    	}
   		catch(Exception $e){
	        echo"erreur";
	        die('Erreur:'.$e->getMessage());
    	}
		
		header("Location: feuilleDeMatch.php?id_match=".$id_match);

	} else {
		header("Location: pageConnexion.php");
	}

?>