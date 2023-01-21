<?php
    include("Connexion.php");

    if($_COOKIE['logged_in'] == true){
        $date_heure=$_POST['date_heure_saisie'];
        $nom_adverse=$_POST['nom_adverse_saisi'];
        $lieu=$_POST['lieu_saisi'];
        $domicile=$_POST['domicile_saisi'];
        $resultat_equipe=$_POST['resultat_equipe_saisi'];
        $resultat_adv=$_POST['resultat_adverse_saisi'];
        $id_match=$_GET['id_match'];

        try{
            $bdd = new BDD();
            $req = $bdd->linkpdo->prepare('UPDATE rencontre SET date_heure = ?, nom_adverse = ?, lieu = ?, domicile = ?, resultat_equipe = ?, resultat_adv = ? WHERE id_match = ?');
            $req->execute(array($date_heure, $nom_adverse, $lieu, $domicile, $resultat_equipe, $resultat_adv, $id_match));
            echo 'Le match a bien été modifié !';
            //sleep(3);
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