 
 <?php
	session_start();
	if(isset($_POST["iniciar"])){
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['pass'] = $_POST['pass'];
		if($_SESSION['user']=="admi" && $_SESSION['pass']=="admi"){
			echo "<a href=listadoclientes.php>Usuarios Registrados</a><br><br>	";
			echo "<a href=actualizarVJ.php>CRUD Video Juegos</a><br><br>";
			echo "<a href=Categoria.php>CRUD Categorias</a><br><br>";
		}
	}
	else{
		header("Location:Admi.php");
	}
?>