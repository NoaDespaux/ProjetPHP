<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modifier le joueur</title>
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
    	<?php
            if($_COOKIE['logged_in'] == true){
                include ("Joueur.php");
                include ("bd/Connexion.php");

                $num_license=$_GET['num_license'];
                $infos=Joueur::getInfosJoueur($num_license);
            } else {
                header("Location: pageConnexion.php");
            }

    	?>
    	<form action="modificationJoueurAction.php?num_license=<?php echo $num_license?>" method="post">
            Nom : <input type="text" value="<?php echo $infos[0]['nom']?>" name="nom_saisi"><br />
            Prenom : <input type="text" value="<?php echo $infos[0]['prenom']?>" name="prenom_saisi"><br />
            Date de naissance : <input type="text" value="<?php echo $infos[0]['date_naissance']?>" name="date_naissance_saisie"><br />
            Taille : <input type="text" value="<?php echo $infos[0]['taille']?>" name="taille_saisie"><br />
            Poids : <input type="text" value="<?php echo $infos[0]['poids']?>" name="poids_saisi"><br />
            Poste préféré : <input type="text" value="<?php echo $infos[0]['poste_prefere']?>" name="poste_saisi"><br />
            Statut : <input type="text" value="<?php echo $infos[0]['statut']?>" name="statut_saisi"><br />
            <input type="reset" name="annuler" value="Annuler">
            <input type="submit" name="valider" value="Valider">
        </form>

    </body>
</html>