<?php
	include ("Connexion.php");

	$liste_titulaires=$_POST['liste_titulaires'];
	$id_match=$_GET['id_match'];

	if(count($liste_titulaires) >= 7){

		foreach($liste_titulaires as $num_license){

			try{
		        $bdd = new BDD();
		        $req = $bdd->linkpdo->prepare('INSERT INTO participer(num_license, id_match) VALUES(?, ?)');
		        $req->execute(array($num_license, $id_match));
	    	}
	   		catch(Exception $e){
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}

		}

	} else {
		echo "Un match de handball se joue au minimum à 7 joueurs";
	}

?>