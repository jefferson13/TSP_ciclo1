<?php
	session_start();
	if(!isset($_SESSION["session_username"] )){
		header("location:aplicacion.php");
	} 
	else {
	session_destroy();
	header("location:aplicacion.php");
	}
?>
