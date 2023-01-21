<?php

    if(!($_COOKIE['logged_in'] == true)){
        header("Location: pageConnexion.php");
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un match</title>
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

        <form action="ajoutMatchAction.php" method="post">
            date_heure : <input type="text" name="date_heure_saisie"><br />
            nom_adverse : <input type="text" name="nom_adverse_saisi"><br />
            lieu : <input type="text" name="lieu_saisi"><br />
            domicile : <input type="text" name="domicile_saisi"><br />
            <input type="reset" name="annuler" value="Annuler">
            <input type="submit" name="valider" value="Valider">
        </form>

        </body>
    </html>
