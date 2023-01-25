<?php

    if(!($_COOKIE['logged_in'] == true)){
        header("Location: pageConnexion.php");
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un joueur</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
    <table class="menu">
        <tr>
            <th><a class="btnmenu" href="index.php">Accueil</a></th>
            <th><a class="btnmenu" id ="btndeco" href="deconnexion.php">Déconnexion</a></th>
        </tr>
    </table>
</header>

        <body>
            <h1>Création du joueur</h1>
            <form action="ajoutJoueurAction.php" method="post">
                Nom : <input type="text" name="nom_saisi"><br />
                Prenom : <input type="text" name="prenom_saisi"><br />
                Numéro de license : <input type="text" name="num_license_saisi"><br />
                Date de naissance : <input type="text" name="date_naissance_saisie"><br />
                Taille : <input type="text" name="taille_saisie"><br />
                Poids : <input type="text" name="poids_saisi"><br />
                Poste préféré : <input type="text" name="poste_saisi"><br />
                Statut : <input type="text" name="statut_saisi"><br />
                <input type="reset" name="annuler" value="Annuler">
                <input type="submit" name="valider" value="Valider">
            </form>

        </body>
    </html>
