<?php
	if($_COOKIE['logged_in'] == true){
		include ("bd/Connexion.php");
		include ("Joueur.php");

		
		$id_match=$_GET['id_match'];
		$liste_titulaires=[];
		$liste_remplacants=[];
		$liste_joueurs=Joueur::getListeJoueurs();
		foreach($liste_joueurs as $joueur){
			if($_POST['joueur'.$joueur['num_license'].''] == 'titulaire'){
				array_push($liste_titulaires, $joueur['num_license']);
			} elseif ($_POST['joueur'.$joueur['num_license'].''] == 'remplacant'){
				array_push($liste_remplacants, $joueur['num_license']);
			}
		}

		if(count($liste_titulaires) >= 7){

			foreach($liste_titulaires as $num_license){
				try{
			        $bdd = new BDD();
			        $req = $bdd->linkpdo->prepare('INSERT INTO participer(num_license, titulaire, id_match) VALUES(?, 1, ?)');
			        $req->execute(array($num_license, $id_match));
		    	}
		   		catch(Exception $e){
			        echo"erreur";
			        die('Erreur:'.$e->getMessage());
		    	}
			}

			foreach($liste_remplacants as $num_license){
				try{
			        $bdd = new BDD();
			        $req = $bdd->linkpdo->prepare('INSERT INTO participer(num_license, titulaire, id_match) VALUES(?, 0, ?)');
			        $req->execute(array($num_license, $id_match));
		    	}
		   		catch(Exception $e){
			        echo"erreur";
			        die('Erreur:'.$e->getMessage());
		    	}
			}
			
			header("Location: feuilleDeMatch.php?id_match=".$id_match);

		} else {
			echo "Un match de handball se joue au minimum à 7 joueurs";
		}
	} else {
		header("Location: pageConnexion.php");
	}


?>