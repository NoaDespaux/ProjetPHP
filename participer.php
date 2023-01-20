<?php

	class Participer{

		private $num_license;
		private $id_match;

		public function __construct($num_license, $id_match){
			$this->num_license = $num_license;
			$this->id_match = $id_match;
		}

		public static function getInfosParticiper($num_license, $id_match){
			try{
				$bdd = new BDD();
				$selectInfos = $bdd->linkpdo->prepare("SELECT note, commentaire, titulaire, poste_occupe FROM participer WHERE num_license = ? AND id_match = ?");
		        $selectInfos->execute(array($num_license, $id_match));
		        $infos = $selectInfos->fetchAll();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $infos;
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

		public static function getListeJoueursFromMatch($id_match){
			try{
				$bdd = new BDD();
				$selectListe = $bdd->linkpdo->prepare('SELECT num_license from participer WHERE id_match = ?');
				$selectListe->execute(array($id_match));
		        $liste = $selectListe->fetchAll();
	    	} catch(Exception $e) {
		        echo"erreur";
		        die('Erreur:'.$e->getMessage());
	    	}
	    	return $liste;
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