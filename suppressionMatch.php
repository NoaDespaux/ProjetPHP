<?php

    if($_COOKIE['logged_in'] == true) {  
        try {
            $server = 'localhost';
            $db = 'bd_php_hand';
            $login = 'root';
            $mdp = '';

            $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
        }
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $id_match=$_GET['id_match'];

        try{
            $deleteReqParticiper = $linkpdo->prepare('DELETE FROM Participer where id_match = ?');
            $deleteReqParticiper->execute(array($id_match));
            $deleteReqRencontre = $linkpdo->prepare('DELETE FROM Rencontre where id_match = ?');
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