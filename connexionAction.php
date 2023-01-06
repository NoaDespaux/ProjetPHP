<?php
		$username = $_POST['username'];
		$password = $_POST['password'];


		if ($username == "root" && $password == "\$iutinfo") {
		    setcookie('logged_in', true , time()+3600);
		    header("Location: index.php");
		} else {
		    echo "Nom d'utilisateur ou mot de passe incorrect.";
		}
?>