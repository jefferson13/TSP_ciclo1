<!DOCTYPE html>
<Html>
	<head>
		<title>VideoGames</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="registroCSS.css" />
	</head>
	<body>
		<form method="post" action="editarperfil.php">
         <?php
				session_start();
				if(!isset($_SESSION["session_username"])) {
					header("location:aplicacion.php");
				} 
				else {
					//conexion: 
					$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
					$user = $_SESSION["session_username"];
					//consulta: 
					$query = "SELECT * FROM cliente WHERE nombre='$user'"; 
					//ejecutar consulta:
					$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
					$row = mysqli_fetch_array($result);
						echo "<section><div id=registro><fieldset>";
						echo "<legend>PERFIL</legend>";
						echo "<img id='image' src='imagenes/".$row["imagen"]."' height='50%' width='50%' type='image'/>
								<p><a>Nombre: ".$row["nombre"]."</a></p>
								<p><a>Cedula:".$row["cedula"]."</a></p>
								<p><a>Telfono:".$row["telefono"]."</a></p>
								<p><a>Correo:".$row["Correo"]."</a></p>
								<input type='submit' name='editar' value='editar' />
								<a href='aplicacion.php'>Regresar</a>";

						echo "</fieldset></div></section>";
					if($result){
						$mensaje="Ingreso a Perfil";
					} 
					else {
						$mensaje = "Error al ingresar datos de la informacion!";
					}
				}
				?>	

					
		</form>
	</body>
</Html>