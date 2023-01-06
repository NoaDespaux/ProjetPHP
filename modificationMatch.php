<!DOCTYPE HTML>
<html>
    <head>
        <title>Modifier Match</title>
    </head>
    <body>
    	<?php
            if($_COOKIE['logged_in'] == true){
                include ("Match.php");
                include ("Connexion.php");

                $id_match=$_GET['id_match'];
                $infos=Match::getInfosMatch($id_match);
            }else{
                header("Location: pageConnexion.php");
            }
    	?>
    	<form action="modificationMatchAction.php?id_match=<?php echo $id_match?>" method="post">
            date_heure : <input type="text" value="<?php echo $infos[0]['date_heure']?>" name="date_heure_saisie"><br />
            nom_adverse : <input type="text" value="<?php echo $infos[0]['nom_adverse']?>" name="nom_adverse_saisi"><br />
            lieu : <input type="text" value="<?php echo $infos[0]['lieu']?>" name="lieu_saisi"><br />
            domicile : <input type="text" value="<?php echo $infos[0]['domicile']?>" name="domicile_saisi"><br />
            resultat_equipe : <input type="text" value="<?php echo $infos[0]['resultat_equipe']?>" name="resultat_equipe_saisi"><br />
            resultat_adverse : <input type="text" value="<?php echo $infos[0]['resultat_adv']?>" name="resultat_adverse_saisi"><br />
            <input type="reset" name="annuler" value="Annuler">
            <input type="submit" name="valider" value="Valider">
        </form>

    </body>
</html>