<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Equipe de Handball</title>
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
        <h1>Modification du match</h1>
    	<?php
            if($_COOKIE['logged_in'] == true){
                include ("Rencontre.php");
                include ("bd/Connexion.php");

                $id_match=$_GET['id_match'];
                $infos=Rencontre::getInfosMatch($id_match);
            }else{
                header("Location: pageConnexion.php");
            }
    	?>
    	<form action="modificationMatchAction.php?id_match=<?php echo $id_match?>" method="post">
            Date et heure du match : <input type="text" value="<?php echo $infos[0]['date_heure']?>" name="date_heure_saisie"><br />
            Nom de l'équipe adverse : <input type="text" value="<?php echo $infos[0]['nom_adverse']?>" name="nom_adverse_saisi"><br />
            Lieu : <input type="text" value="<?php echo $infos[0]['lieu']?>" name="lieu_saisi"><br />
            Domicile : <input type="text" value="<?php echo $infos[0]['domicile']?>" name="domicile_saisi"><br />
            Résultat France : <input type="text" value="<?php echo $infos[0]['resultat_equipe']?>" name="resultat_equipe_saisi"><br />
            Résultat <?php echo $infos[0]['nom_adverse']?> : <input type="text" value="<?php echo $infos[0]['resultat_adv']?>" name="resultat_adverse_saisi"><br />
            <input type="reset" name="annuler" value="Annuler">
            <input type="submit" name="valider" value="Valider">
        </form>

    </body>
</html>