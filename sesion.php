<!DOCTYPE html>

<?php
	session_start();
	if(isset($_SESSION["session_username"])){
		header("Location: aplicacionlogin.php");
	}
?>

<html lang="es">

	<head>
		<title>Sesion</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="sesionCSS.css" />
		<style type="text/css"> 
			A:link {text-decoration:none;color:#0000cc;} 
			A:visited {text-decoration:none;color:#ffcc33;} 
			A:active {text-decoration:none;color:#ff0000;} 
			A:hover {text-decoration:underline;color:#999999;} 
		</style>
	</head>
	
	<body>
		
		<form method="post" action="login.php" autocomplete="on">
			<header name="superior" title="Ikaros - Anime: Sora no Otoshimono">
				<div id="login">		
					<fieldset>
						<legend>Datos de Contacto</legend>
						<ul>
							<li>
								<label for="cedula">Cedula</label>
								<input type="number" name="cedula" id="cedula" placeholder="123456" autofocus="autofocus" required="required" min="1" maxlength="40" />
							</li>
							<br/>
							<li>
								<label for="pass">Password</label>
								<input type="password" name="pass" id="pass" placeholder="****"  required="required"  min="1" maxlength="15" />
							</li>
							<br/>
							
							<input type="submit" name="login" value="LOGIN" />
							<input type="reset" name="reiniciar" value="Reiniciar"/>
							<br/>
							<p>Eres nuevo? <a href="registrar.php" >Regístrate Aquí</a>!</p>
							<p><a href="aplicacion.php" >PÁGINA PRINCIPAL</a>!</p>
						</ul>
					</fieldset>	
				</div>
			</header>
		</form>
		
	</body>
	
</html>