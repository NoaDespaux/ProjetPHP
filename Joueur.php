<?php

	class Joueur{

		private $num_license;

		public function __construct($num_license){
			$this->num_license = $num_license;
		}

		public static function getInfosJoueur($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT num_license,nom, prenom, photo, date_naissance, taille, poids, poste_prefere, statut from joueur WHERE num_license = ?");
		        $selectInfos->execute(array($num_license));
		        $nom = $selectInfos->fetchAll();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nom;
		}

		public static function getListeJoueurs(){
			try{
				$bdd = new BDD();
				$selectListe = $bdd->linkpdo->prepare('SELECT num_license, nom, prenom, date_naissance, taille, poids, poste_prefere, photo, statut from joueur ORDER BY 2, 3');
				$selectListe->execute();
		        $liste = $selectListe->fetchAll();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $liste;
		}

		public static function getNbSelections($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT count(*) FROM participer WHERE num_license = ? ");
		        $selectInfos->execute(array($num_license));
		        $nb = $selectInfos->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nb;
		}

		public static function getNbMatchsJoues($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT count(*) FROM participer p, rencontre r WHERE num_license = ? and r.Id_match = p.Id_match and r.resultat_equipe <> 0 and r.resultat_adv <> 0 ");
		        $selectInfos->execute(array($num_license));
		        $nb = $selectInfos->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nb;
		}

		public static function getNbMatchsGagnes($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT count(*) FROM participer p, rencontre r WHERE num_license = ? and p.id_match = r.id_match and r.resultat_equipe > r.resultat_adv");
		        $selectInfos->execute(array($num_license));
		        $nb = $selectInfos->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nb;
		}

		public static function getNbMatchsPerdus($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT count(*) FROM participer p, rencontre r WHERE num_license = ? and p.id_match = r.id_match and r.resultat_equipe < r.resultat_adv");
		        $selectInfos->execute(array($num_license));
		        $nb = $selectInfos->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nb;
		}

		public static function getNbMatchsNuls($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT count(*) FROM participer p, rencontre r WHERE num_license = ? and p.id_match = r.id_match and r.resultat_equipe = r.resultat_adv and r.resultat_equipe <> 0");
		        $selectInfos->execute(array($num_license));
		        $nb = $selectInfos->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nb;
		}

		public static function getMoyEval($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT Note FROM participer WHERE num_license = ?");
		        $selectInfos->execute(array($num_license));
		        $nb = $selectInfos->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nb;
		}

		public static function setPhoto($num_license, $photo){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("UPDATE joueur SET photo = ? WHERE num_license = ?");
		        $selectInfos->execute(array($photo, $num_license));
		        return 1;
	    	} catch(Exception $e) {
		        echo"erreur";
		        return -1;
	    	}
		}

	}
?>