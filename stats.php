<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
    <link rel="stylesheet" href="styles.css">
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
            include ("Connexion.php");
            include ("Joueur.php");
            include ("Rencontre.php");
            include ("Participer.php");


        } else {
            header("Location: index.html");
        }

    ?>  

</body>