<?php
    if($_COOKIE['logged_in'] == true){

        include("Connexion.php");

        $date_heure=$_POST['date_heure_saisie'];
        $nom_adverse=$_POST['nom_adverse_saisi'];
        $lieu=$_POST['lieu_saisi'];
        $domicile=$_POST['domicile_saisi'];
        $resultat_equipe=$_POST['resultat_equipe_saisi'];
        $resultat_adv=$_POST['resultat_adverse_saisi'];

        try{
            $bdd = new BDD();
            $req = $bdd->linkpdo->prepare('INSERT INTO rencontre(date_heure, nom_adverse, lieu, domicile, resultat_equipe, resultat_adv) VALUES(?, ?, ?, ?, ?, ?)');
            $req->execute(array($date_heure, $nom_adverse, $lieu, $domicile, $resultat_equipe, $resultat_adv));
            echo"Match ajouté !";
            header("Location: index.php");
        }
        catch(Exception $e){
            echo"erreur";
            die('Erreur:'.$e->getMessage());
        }  
    } else {
        header("Location: pageConnexion.php");
    }

?>  