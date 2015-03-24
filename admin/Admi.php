<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="Admicss.css" type="text/css" />
</head>
<body>
	<form method="POST" action="menu.php" enctype="multipart/form-data" >
		<h1>ADMINISTRADOR</h1>
		<?php echo '<input type="text" placeholder="Ingrese su Usuario" name="user" id="user" required="required" />'?>
		<?php echo '<input type="password" placeholder="Ingrese su Contraseña" name="pass" id="pass" required="required" />'?>
		<button type="submit" name="iniciar" value="iniciar">Iniciar Sesion</button>
	</form>
</body>
</html>