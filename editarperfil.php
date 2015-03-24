<!Doctype html>
<html>
	<head>
		<title>VideoGames</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="registroCSS.css" />
	</head>
	<body>
		<?php
			session_start();
			if(!isset($_SESSION["session_username"])) {
				header("location:aplicacion.php");
			} 
			else {
				if(isset($_POST["editar"])){
					$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
					$user = $_SESSION["session_username"];
					//consulta: 
					$query = "SELECT * FROM cliente WHERE nombre='$user'";

					$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
					while($row = mysqli_fetch_array($result)){
						$nombre = $row['nombre'];
						$cedula = $row['cedula'];
						$pass = $row['password'];
						$telefono = $row ['telefono'];
						$ima = $row['imagen'];
						$correo = $row['Correo'];
					}
				}
			}
		?>
		<form method="POST" action="perfilbd.php" enctype="multipart/form-data">
					<div id="registro">		
					<fieldset>
						<legend>Actualizacion de Datos del Contacto</legend>
						<ul>
							<li>
								<label for="nombre">Nuevo Nombre</label>
								<?php echo '<input type="text" name="nombre" id="nombre" placeholder="'.$nombre.'" autofocus="autofocus" required="required" maxlength="40" />'?>
							</li>
							<li>
								<label for="cedula">Nueva Cedula</label>
								<?php echo '<input type="number" name="cedula" id="cedula" placeholder="'.$cedula.'" required="required"  min="1" maxlength="15" />'?>
							</li>
							<li>
								<label for="correo">Nuevo Correo</label>
								<?php echo '<input type="text" name="correo" id="correo" placeholder="'.$correo.'" required="required"  min="1" maxlength="50" />'?> 
							</li>
							<li>
								<label for="pass">Nueva Password</label>
								<?php echo'<input type="password" name="pass" id="pase" placeholder="'.$pass.'"  required="required"  min="6" maxlength="15" />'?>
							</li>
							<li>
								<label for="telefono">Nuevo Teléfono</label>
								<?php echo'<input type="number"  name="telefono" id="telefono" placeholder="'.$telefono.'"  required="required"  min="1" maxlength="15" />'?>
							</li>
							<li>
								<label for="ima">Nueva Imagen</label>
								<input type="file" name="imagen" id="imagen"/>
						
							</li>
							<input type="submit" name="actualizar" value="actualizar" />
							<input type="reset" name="reiniciar" value="Reiniciar">
							<a href='perfil.php'>Regresar</a>
						</ul>
					</fieldset>		
				</div>
		</form>
	</body>
</html>