<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("location:Admi.php");
	} 
	else {
		session_destroy();
		header("location:Admi.php");
	}
?>