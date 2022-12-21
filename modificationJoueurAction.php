<?php
    $nom=$_POST['nom_saisi'];
    $prenom=$_POST['prenom_saisi'];
    $date_naissance=$_POST['date_naissance_saisie'];
    $taille=$_POST['taille_saisie'];
    $poids=$_POST['poids_saisi'];
    $poste=$_POST['poste_saisi'];
    $statut=$_POST['statut_saisi'];
    $num_license=$_GET['num_license'];

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
        $req = $linkpdo->prepare('UPDATE Joueur SET nom = ?, prenom = ?, date_naissance = ?, taille = ?, poids = ?, poste_prefere = ?, statut = ? WHERE num_license = ?');
        $req->execute(array($nom,$prenom, $date_naissance, $taille, $poids, $poste, $statut, $num_license));
        echo 'Le joueur a bien été modifié !';
        //sleep(3);
        header("index.php");
    }
    catch(Exception $e){
        echo"erreur";
        die('Erreur:'.$e->getMessage());
    }

?>