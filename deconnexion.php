<?php 
	setcookie('logged_in', false, time()+3600);
	header("Location: pageConnexion.php");
 ?>