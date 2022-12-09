<?php

	class Joueur{

		private $num_license;

		public function __construct($num_license){
			$this->num_license = $num_license;
		}

		public function getNomJoueur(){
			try{
				$bdd = new BDD();
				$selectNom = $bdd->linkpdo->prepare('SELECT nom from joueur WHERE num_license = ?');
		        $selectNom->execute(array($this->num_license));
		        $nom = $selectNom->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $nom;
		}

		public static function getListeJoueurs(){
			try{
				$bdd = new BDD();
				$selectListe = $bdd->linkpdo->prepare('SELECT nom, prenom, date_naissance, poste_prefere, statut from joueur');
				$selectListe->execute();
		        $liste = $selectListe->fetch();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $liste;
		}

	}
?>