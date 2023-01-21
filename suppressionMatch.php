<?php

    if($_COOKIE['logged_in'] == true) {
        include("bd/Connexion.php");

        $id_match=$_GET['id_match'];

        try{
            $bdd = new BDD();
            $deleteReqParticiper = $bdd->linkpdo->prepare('DELETE FROM participer where id_match = ?');
            $deleteReqParticiper->execute(array($id_match));
            $deleteReqRencontre = $bdd->linkpdo->prepare('DELETE FROM rencontre where id_match = ?');
            $deleteReqRencontre->execute(array($id_match));
            echo "Match supprimé";
            header("Location: index.php"); 
        } catch(Exception $e) {
            echo"erreur";
            die('Erreur:'.$e->getMessage());
        }
    } else {
        header("Location: pageConnexion.php");
    }

?>