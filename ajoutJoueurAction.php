<?php
    if($_COOKIE['logged_in'] == true){

        include("bd/Connexion.php");

        $nom=$_POST['nom_saisi'];
        $prenom=$_POST['prenom_saisi'];
        $date_naissance=$_POST['date_naissance_saisie'];
        $taille=$_POST['taille_saisie'];
        $poids=$_POST['poids_saisi'];
        $poste=$_POST['poste_saisi'];
        $statut=$_POST['statut_saisi'];
        $num_license=$_POST['num_license_saisi'];

        try{
            $bdd = new BDD();
            $req = $bdd->linkpdo->prepare('INSERT INTO joueur(num_license,nom,prenom,date_naissance,taille,poids,poste_prefere, statut) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
            $req->execute(array($num_license,$nom,$prenom, $date_naissance, $taille, $poids, $poste, $statut));
            echo"Joueur ajouté !";
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