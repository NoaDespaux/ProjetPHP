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
            <h1>Création du match</h1>
            <form action="ajoutMatchAction.php" method="post">
                Date et heure du match : <input type="text" name="date_heure_saisie" placeholder="(AAAA-MM-JJ HH:MM:SS)"><br />
                Nom de l'équipe adverse : <input type="text" name="nom_adverse_saisi"><br />
                Lieu : <input type="text" name="lieu_saisi"><br />
                Domicile : <input type="text" name="domicile_saisi" placeholder="oui / non"><br />
                <input type="reset" name="annuler" value="Annuler">
                <input type="submit" name="valider" value="Valider">
            </form>

        </body>
    </html>
