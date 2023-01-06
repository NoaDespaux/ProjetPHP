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

        $num_license=$_GET['num_license'];

        try{
            $selectReq = $linkpdo->prepare('DELETE FROM Joueur where num_license = ?');
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
