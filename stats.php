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
            include ("bd/Connexion.php");
            include ("Joueur.php");
            include ("Rencontre.php");
            include ("participer.php");

            $num_license=$_GET['num_license'];
            $infosJoueur=Joueur::getInfosJoueur($num_license);
            $nbSelections=Joueur::getNbSelections($num_license);
            $allEval=Joueur::getMoyEval($num_license);
            $moyEval=0;
            $i=0;
            foreach($allEval as $eval){
                $moyEval+=$eval[0];
                if($eval[0] != null){
                   $i++; 
               }
            }
            $moyEval=$moyEval/$i;

            $nbMatchsJoues=Joueur::getNbMatchsJoues($num_license);
            $nbMatchsGagnes=Joueur::getNbMatchsGagnes($num_license);
            $pMatchsGagnes=($nbMatchsGagnes[0]/$nbMatchsJoues[0])*100;
            $nbMatchsPerdus=Joueur::getNbMatchsPerdus($num_license);
            $pMatchsPerdus=($nbMatchsPerdus[0]/$nbMatchsJoues[0])*100;
            $nbMatchsNuls=Joueur::getNbMatchsNuls($num_license);
            $pMatchsNuls=($nbMatchsNuls[0]/$nbMatchsJoues[0])*100;

            echo 'Nombre de matchs gagnés : ' .$nbMatchsGagnes[0]. ' ('.$pMatchsGagnes.'%)<br>';
            echo 'Nombre de matchs perdus : ' .$nbMatchsPerdus[0]. ' ('.$pMatchsPerdus.'%)<br>';
            echo 'Nombre de matchs nuls : ' .$nbMatchsNuls[0]. ' ('.$pMatchsNuls.'%)<br>';

            echo "<table>
                <thead>
                    <tr>
                        <th>Statut</th>
                        <th>Poste préféré</th>
                        <th>Nombre de sélections</th>
                        <th>Moyenne des évaluations</th>
                        <th>Pourcentage de matchs gagnés</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>".$infosJoueur[0]['statut']."</td>
                        <td>".$infosJoueur[0]['poste_prefere']."</td>
                        <td>".$nbSelections[0]."</td>
                        <td>".$moyEval."</td>
                        <td>".$pMatchsGagnes."%</td>
                    </tr>
                </tbody>
            </table>";
        } else {
            header("Location: index.html");
        }

    ?>  

</body>