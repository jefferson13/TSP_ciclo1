<?php
	session_start();
	if(!isset($_SESSION["session_username"])) {
		header("location:aplicacion.php");
	} 
	else {
		if(isset($_POST["actualizar"])){
			$cedula=$_POST['cedula'];
			$nombre=$_POST['nombre'];
			$telefono=$_POST['telefono'];
			$password=$_POST['pass'];
			$correo=$_POST['correo'];
			$user=$_SESSION['session_username'];
			
			//imagen
			$ruta="imagenes";
			$archivos=$_FILES['imagen']['tmp_name'];
			$nombre_archivos=$_FILES['imagen']['name'];
			move_uploaded_file($archivos,$ruta."/".$nombre_archivos);

			//conexion: 
			$link = mysqli_connect("localhost","root","","videojuegos") or die("Error de conexion" . mysqli_error($link)); 
			$consulta=mysqli_query($link, "SELECT * FROM cliente WHERE cedula='".$cedula."'") or die("Error en la consulta.." . mysqli_error($link));
			$numrows=mysqli_num_rows($consulta);

			$insert="UPDATE cliente SET `cedula`=$cedula,`nombre`='$nombre',`telefono`=$telefono,`password`='$password',`imagen`='$nombre_archivos',`correo`='$correo' WHERE  nombre='$user'"; 
			$result=mysqli_query($link,$insert)or die("Error en la conexion.." . mysqli_error($link));
			if($result){
				$mensaje="Perfil Modificado";
			} 
			else {
				$mensaje = "Error al ingresar datos de la informacion!";
			}
			$_SESSION['session_username']=$nombre;
		}
		echo "$mensaje";
		header("Location: aplicacion.php");
	}		
?>
