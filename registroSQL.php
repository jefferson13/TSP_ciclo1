<?php
	session_start();
	if(isset($_SESSION["session_username"])){
		header("Location: aplicacionlogin.php");
	}

	if(isset($_POST["registrar"])){
 
		$cedula=$_POST['cedula'];
		$nombre=$_POST['nombre'];
		$telefono=$_POST['telefono'];
		$password=$_POST['pass'];

		$correo=$_POST['correo'];
		//imagen
		$ruta="imagenes";
		$archivos=$_FILES['imagen']['tmp_name'];
		$nombre_archivos=$_FILES['imagen']['name'];
		move_uploaded_file($archivos,$ruta."/".$nombre_archivos);

		//conexion: 
		$link = mysqli_connect("localhost","root","","videojuegos") or die("Error de conexion" . mysqli_error($link)); 
		$consulta=mysqli_query($link, "SELECT * FROM cliente WHERE cedula='".$cedula."'") or die("Error en la consulta.." . mysqli_error($link));
		$numrows=mysqli_num_rows($consulta);

		if($numrows==0){
			$insert="INSERT INTO cliente (cedula, nombre, telefono, password, imagen,correo) VALUES('$cedula','$nombre', '$telefono', '$password','$nombre_archivos', '$correo')";
			echo "$insert";
			$result=mysqli_query($link,$insert)or die("Error en la conexion.." . mysqli_error($link));

			if($result){
				$mensaje="Cuenta Correctamente Creada";
			} 
			else {
				$mensaje = "Error al ingresar datos de la informacion!";
				echo"$mensaje";
			}
		} 
		else {
			$mensaje = "El Numero de Cedula ya existe! Por favor, verifica o Inicia Sesion";
			echo"$mensaje";
		}	
		echo "$mensaje";
		$_SESSION['session_username']=$nombre;
		$_SESSION['session_cedula']=$cedula;
		header("Location: aplicacionlogin.php");
	}
?>
