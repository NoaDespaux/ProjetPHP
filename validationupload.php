<?php 

	if(!($_COOKIE['logged_in'] == true)){
        header("Location: pageConnexion.php");
    } 

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="UTF-8">
        <title>Ajouter la photo</title>
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
		<main>
			<a class='bouton-retour' href="index.php"> < Retour</a>
			<?php
				if(isset($_POST['uploadphoto']) && isset($_POST['numlicence']))
				{
					$NUMLICENCE = trim(htmlspecialchars($_POST['numlicence']));
					$uploaded_name = $_FILES[ 'photo' ][ 'name' ];
					$uploaded_ext = substr($uploaded_name, strrpos($uploaded_name, '.') + 1);
					$uploaded_size = $_FILES[ 'photo' ][ 'size' ];
					$uploaded_type = $_FILES[ 'photo' ][ 'type' ];
					$uploaded_tmp = $_FILES[ 'photo' ][ 'tmp_name' ];

					$target_path = 'photoJoueurs/';
					$target_file = md5(uniqid().$uploaded_name).'.'.$uploaded_ext;
					$temp_file = ((ini_get('upload_tmp_dir') == '') ? (sys_get_temp_dir()) : (ini_get('upload_tmp_dir')));
					$temp_file .= "/".md5(uniqid().$uploaded_name).'.'.$uploaded_ext;

					if((strtolower($uploaded_ext) == 'jpg' || strtolower($uploaded_ext) == 'jpeg' || strtolower($uploaded_ext) == 'png') &&
						($uploaded_size < 100000) && ($uploaded_type == 'image/jpeg' || $uploaded_type == 'image/png' ) &&
						getimagesize($uploaded_tmp))
					{
						if($uploaded_type == 'image/jpeg')
						{
							$img = imagecreatefromjpeg($uploaded_tmp);
							imagejpeg($img, $temp_file, 100);
						}
						else
						{
							$img = imagecreatefrompng($uploaded_tmp);
							imagepng($img, $temp_file, 9);
						}
						imagedestroy($img);
						if(rename($temp_file, (getcwd()."/".$target_path.$target_file)))
						{
							echo "<pre>Opération réussie, <a href=\"index.php\">retour</a> à la page précédente</pre>";
							if(Joueur::setPhoto($NUMLICENCE, $target_file) != -1)
							{
								echo "<pre>Opération réussie, <a href=\"index.php\">retour</a> à la page précédente</pre>";
								header("refresh:3;url=index.php");
							}
							else
							{
								echo "<pre><strong>ERREUR</strong>3</pre>";
								echo "<a href=\"index.php\">retour à l'acceuil</a>";
							}
						}
						else
						{
							echo "<pre><strong>ERREUR</strong>2</pre>";
							echo "<a href=\"index.php\">retour à l'acceuil</a>";
						}
						if(file_exists($temp_file))
						{
							unlink( $temp_file );
						}
					}
					else
					{
						echo '<pre><strong>ERREUR</strong>: votre image n\'est pas un .png ou un .jpeg</pre>';
						echo "<a href=\"index.php\">retour à l'acceuil</a>";
					}
				}
				else
				{
					echo "<pre><strong>ERREUR</strong>1</pre>";
					echo "<a href=\"index.php\">retour à l'acceuil</a>";
				}
			?>
		</main>
	</body>
</html>