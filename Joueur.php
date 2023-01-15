<?php

	class Joueur{

		private $num_license;

		public function __construct($num_license){
			$this->num_license = $num_license;
		}

		public static function getInfosJoueur($num_license){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT nom, prenom, photo, date_naissance, taille, poids, poste_prefere, statut from joueur WHERE num_license = ?");
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

	}
?>