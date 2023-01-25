<?php
    if($_COOKIE['logged_in'] == true){

        include("bd/Connexion.php");

        $date_heure=$_POST['date_heure_saisie'];
        $nom_adverse=$_POST['nom_adverse_saisi'];
        $lieu=$_POST['lieu_saisi'];
        if($_POST['lieu_saisi'] == "oui"){
            $lieu=1;
        } elseif($_POST['lieu_saisi'] == "non"){
            $lieu=0;
        }
        $domicile=$_POST['domicile_saisi'];
        
        try{
            $bdd = new BDD();
            $req = $bdd->linkpdo->prepare('INSERT INTO rencontre(date_heure, nom_adverse, lieu, domicile) VALUES(?, ?, ?, ?)');
            $req->execute(array($date_heure, $nom_adverse, $lieu, $domicile));
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