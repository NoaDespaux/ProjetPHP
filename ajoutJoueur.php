<?php
    $nom=$_POST['nom_saisi'];
    $prenom=$_POST['prenom_saisi'];
    $date_naissance=$_POST['date_naissance_saisie'];
    $taille=$_POST['taille_saisie'];
    $poids=$_POST['poids_saisi'];
    $poste=$_POST['poste_saisi'];
    $statut=$_POST['statut_saisi'];
    $num_license=$_POST['num_license_saisi'];

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

    try{
        $req = $linkpdo->prepare('INSERT INTO joueur(num_license,nom,prenom,date_naissance,taille,poids,poste_prefere, statut) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($num_license,$nom,$prenom, $date_naissance, $taille, $poids, $poste, $statut));
        echo"Joueur ajouté !";
    }
    catch(Exception $e){
        echo"erreur";
        die('Erreur:'.$e->getMessage());
    }
?>  