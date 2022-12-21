<?php

	class Match{

		private $id_match;

		public function __construct($id_match){
			$this->id_match = $id_match;
		}

		public static function getInfosMatch($id_match){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT id_match, date_heure, nom_adverse, lieu, domicile, resultat_equipe, resultat_adv from rencontre WHERE id_match = ?");
		        $selectInfos->execute(array($id_match));
		        $nom = $selectInfos->fetchAll();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nom;
		}

		public static function getListeMatchs(){
			try{
				$bdd = new BDD();
				$selectListe = $bdd->linkpdo->prepare('SELECT id_match, date_heure, nom_adverse, lieu, domicile, resultat_equipe, resultat_adv from rencontre');
				$selectListe->execute();
		        $liste = $selectListe->fetchAll();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $liste;
		}

	}
?>