<!DOCTYPE html>

<html lang="es">
	<head>
		<title>VideoGames</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="estilos.css" />
		<style type="text/css"> 
			A:link {text-decoration:none;color:WHITE;} 
			A:visited {text-decoration:none;color:#ffcc33;} 
			A:active {text-decoration:none;color:#ff0000;} 
			A:hover {text-decoration:underline;color:#999999;} 
		</style>
	</head>

	<body>
		<form method="post" action="actualizarVJ.php" autocomplete="on" name="formulario">
			<header name="superior" title="Ikaros - Anime: Sora no Otoshimono">
				<div id="login">		
					<fieldset>
						<legend>Datos de Contacto</legend>
						
						<?php
							session_start();
							if(!isset($_SESSION["user"])) {
								header("Admi.php");
							} 
							else {
						?>
								<div id="bienvenido">
								<h2>Bienvenido/a, <span><?php echo $_SESSION['user'];?>! </span></h2>
								<input type="submit" name="actualizar" value="Actualizar" onclick="this.form; return true;">
								<input type="submit" name="eliminar" value="Eliminar" onclick="formulario.action='eliminarVG.php'; return true;">									
								<p><a href="logout.php">Cerrar Sesión</a></p>
								</div>
								<?php
							}
						?>				
					</fieldset>	
				</div>
			</header>
	
			<aside name="izquierdo">			
				<?php
					//conexion: 
					$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
					//consulta: 
					$query = "SELECT * FROM categoria"; 
					//ejecutar consulta:
					$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));

					$i=0;					
					echo "<ul><h2>CATEGORIA <h2>";					
					while($row = mysqli_fetch_array($result)) { 
						$nombrecate=$row["nombre"];
						$idcate=$row["id_categoria"];
						echo "							
							<li>
								<a href='aplicacionfiltro.php?categoria=$idcate'>$nombrecate</a>
							</li>
							";
						$i++;
					}
					echo " <li><a href='aplicacionlogin.php' method='post' name=categoria value='' >VISTA GENERAL</a> </li>";
					echo "</ul>";
				?>				
			</aside>
		
			<section> 
				<?php
					//conexion: 
					$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
					//consulta: 
					$consulta = "SELECT * FROM videogame"; 
					//ejecutar consulta:
					$result = mysqli_query($link, $consulta) or die("La consulta falló: " . mysqli_error($link));
					 
					$i=1;
					while($row = mysqli_fetch_array($result)) { 
						echo "
							<article name='vg".$i."' title='".$row["descripcion"]."    Stock:".$row["stock"]."'>
								<a href='vg_individual.php?juegos=".$row["id_vj"]."'><img name='juegos' value='".$i."' src='..\\".$row["imagen"]."' height=240px width=100% /></a>
								<div style='overflow: auto'>
								Precio por Día:".$row["precio_dia"]."<br/>
								Consola:".$row["consola"]."<br/>
								<input name='vg".$i."' type='checkbox' value='vg".$i."' />".$row["nombre"]."
								</div>
							</article>  ";
						$i++;
					}	 	
				?>

			</section>
		</form>
			<aside name="derecho"> 
				<header>
					<form method="get" action="crearVJ.php">
						<input type="submit" name="crear" value="Crear VG"/>
						<input type='number' name='cantidad' placeholder='Cantidad a Crear' />
					</form>
				</header>				
			</aside>
			<footer name="pie">	</footer>		
	</body>
</html>