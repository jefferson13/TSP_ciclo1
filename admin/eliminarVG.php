<?php
	if(isset($_POST["eliminar"])){
		session_start();
		//conexion: 
		$link = mysqli_connect("localhost","root","","videojuegos") or die("Error en la conexion. " . mysqli_error($link)); 
		//consulta: 
		$query = "SELECT * FROM videogame"; 
		//ejecutar consulta. 
		$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
		
		$i=1;
		while($row = mysqli_fetch_array($result)) {	
			if (isset($_REQUEST["vg".$i.""])) {
				$update = "DELETE FROM videogame WHERE id_vj = ".$row["id_vj"].";";
				mysqli_query($link, $update) or die("La actualización falló: " . mysqli_error($link));
			}
			$i++;
		}
		//echo"Videojuego Eliminado!";
		header("Location:aplicacionadmin.php");
	}
?>