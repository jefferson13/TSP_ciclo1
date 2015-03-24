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
		<form method="post" action="js/procesarCheck.php" autocomplete="on">
			<header name="superior" title="Ikaros - Anime: Sora no Otoshimono">
				<div id="login">		
					<fieldset>
						<legend>Datos de Contacto</legend>
						
						<?php
							session_start();
							if(!isset($_SESSION["session_username"])) {
								echo "
								<div id='visitante' >
								<h2>Bienvenido Visitante</h2>
								<p>Eres nuevo? <a href='registrar.php' >Registrate Aquí</a>!</p>
								</div>
								";
							} 
							else {
						?>
								<div id="bienvenido">
								<h2>Bienvenido, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
								<input type="submit" name="apartar" value="Añadir Al Carrito De Compras" href="js/procesarCheck.php">
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
					$consulta = "SELECT * FROM categoria" or die("Error en la consulta" . mysqli_error($link)); 
					//ejecutar consulta:
					$result = mysqli_query($link, $consulta) or die("La consulta falló: " . mysqli_error($link));
					//display information: 
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
					echo " <li><a href='aplicacionlogin.php' >VISTA GENERAL</a> </li>";
					echo " <li><a href='carrito.php' method='post' name=carrito value='' >VER CARRITO</a> </li>";
					echo "</ul>";
				?>			
				
			</aside>
		
			<section> 
				<?php
					$categoria=$_GET["categoria"];
					//conexion: 
					$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
					//consulta: 
					$query = "SELECT * FROM videogame WHERE id_categoria=$categoria"; 
					//ejecutar consulta:
					$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
					while($row = mysqli_fetch_array($result)) { 
						$id_juego=$row["id_vj"];
						$stock=$row["stock"];						
						echo "
							<article name='vg".$id_juego."' title='".$row["descripcion"]."    Stock: $stock'>
								<a href='vg_individual.php?juegos=$id_juego'><img name='juegos' value='$id_juego' src='".$row["imagen"]."' height=240px width=100% /></a>
								Precio por Día:".$row["precio_dia"]."<br/>
								Consola:".$row["consola"]."<br/>
							";
							//session_start();
							if(isset($_SESSION["session_username"])) {
								echo "<input name='vg".$id_juego."' type='checkbox' value='".$id_juego."' />".$row["nombre"]."";	
							}
							else{
								echo "Nombre: ".$row["nombre"]."";
							}								
							echo "</article>  ";
					}	 	
				?>

			</section>
			
			<aside name="derecho"> </aside>	
			<footer name="pie">	</footer>
		</form>
	</body>
</html>