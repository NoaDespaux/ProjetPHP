<?php

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
        $selectReq = $linkpdo->prepare('DELETE FROM Rencontre where id_match = ?');
        $selectReq->execute(array($id_match));
        echo "Match supprimé";
        header('index.php');
    } catch(Exception $e) {
        echo"erreur";
        die('Erreur:'.$e->getMessage());
    }

?>