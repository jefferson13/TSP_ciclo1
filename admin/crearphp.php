<?php
	echo"hola";
	session_start();
	if(!isset($_SESSION["user"])) { //Modificar esta parte para que sea solo el admin.
		header("Admi.php");
	}else{
	if(isset($_POST["crear"])){
		session_start();
		//conexion: 
		$link = mysqli_connect("localhost","root","","videojuegos") or die("Error en la conexion. " . mysqli_error($link)); 
		//consulta: 
		$query = "SELECT * FROM videogame"; 
		//ejecutar consulta. 
		$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
		echo"primer if";
		$i=1;
		while(isset($_POST["nombre_".$i.""])) {	
			$nombre=$_POST["nombre_".$i.""];
			$descripcion=$_POST["descripcion_".$i.""];
			$precio_dia=$_POST["precio_dia_".$i.""];
			$consola=$_POST["consola_".$i.""];
			$stock=$_POST["stock_".$i.""];
			$video=$_POST["video_".$i.""];
			$id_categoria=$_POST["id_categoria_".$i.""];
			$ruta="Covers";
			$archivos=$_FILES["imagen_".$i.""]['tmp_name'];
			$nombre_archivos=$_FILES['imagen_'.$i.'']['name'];
			$imagen=$ruta."//".$nombre_archivos;
			move_uploaded_file($archivos,"../".$ruta."//".$nombre_archivos);
			
			if(isset($_POST["id_videojuego".$i.""])){

				$id_videojuego=$_POST["id_videojuego".$i.""];
				while($row = mysqli_fetch_array($result)) { 
					if($nombre==$row["nombre"]){
						$actualizacion = "UPDATE videogame SET nombre = '$nombre', descripcion = '$descripcion', precio_dia = '$precio_dia', consola = '$consola', stock = '$stock', imagen = '$imagen', video = '$video', id_categoria = '$id_categoria' WHERE nombre = '$nombre';";
						mysqli_query($link, $actualizacion) or die("La Actualizacion con el Nombre del juego falló: " . mysqli_error($link));
						echo"El NOMBRE del juego es existente y éste ha sido actualizado.";
					}
					if($id_videojuego==$row["id_vj"]){
						$actualizacion = "UPDATE videogame SET nombre = '$nombre', descripcion = '$descripcion', precio_dia = '$precio_dia', consola = '$consola', stock = '$stock', imagen = '$imagen', video = '$video', id_categoria = '$id_categoria' WHERE id_vj = '$id_videojuego';";
						mysqli_query($link, $actualizacion) or die("La Actualizacion con el ID del juego falló: " . mysqli_error($link));
						echo"El ID del juego es existente y éste ha sido actualizado.";
					}
				}
				$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
			}
			else{
				$insercion = "INSERT INTO videogame (id_vj, nombre, descripcion, precio_dia, consola, stock, imagen, video, id_categoria) VALUES (NULL, '$nombre', '$descripcion', '$precio_dia', '$consola', '$stock', '$imagen', '$video', '$id_categoria');";
				mysqli_query($link, $insercion) or die("La Inserción del nuevo juego falló: " . mysqli_error($link));
				echo "Creación con éxito! ";
			}
			$i++;
		}
		
	}
	header("Location: aplicacionadmin.php");
}
?>