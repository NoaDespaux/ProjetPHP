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
			<form method="post" action="validationupload.php" enctype="multipart/form-data">
				<fieldset>
					<legend>Upload photo de joueur</legend>
					
					<label for="photo">PHOTO</label>
					<input type="file" id="photo" name="photo" accept="image/png, image/jpeg" required>

					<input type="hidden" name="numlicence" value="<?php $NUMLICENCE = trim(htmlspecialchars($_GET['num_license'])); echo $NUMLICENCE; ?>">
					<input type="submit" name="uploadphoto">
				</fieldset>
			</form>
		</main>
	</body>
</html>