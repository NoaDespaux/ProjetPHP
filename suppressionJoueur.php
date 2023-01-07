<?php

    if($_COOKIE['logged_in'] == true) {

        $num_license=$_GET['num_license'];

        try{
            $bdd = new BDD();
            $selectReq = $bdd->linkpdo->prepare('DELETE FROM Joueur where num_license = ?');
            $selectReq->execute(array($num_license));
            echo "Joueur supprimé";
            header("Location: index.php");
        } catch(Exception $e) {
            echo"erreur";
            die('Erreur:'.$e->getMessage());
        }
    } else {
        header("Location: pageConnexion.php");
    }


?>