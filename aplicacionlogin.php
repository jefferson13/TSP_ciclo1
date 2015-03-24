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
								header("location:aplicacion.php");
							} 
							else {
								$user=$_SESSION['session_username'];
								$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link));
								$consulta = "SELECT imagen FROM cliente WHERE nombre='$user'" or die("Error en la consulta" . mysqli_error($link));
								$result = mysqli_query($link, $consulta) or die("La consulta falló: " . mysqli_error($link));
								$row = mysqli_fetch_array($result);
						?>
								<div id="bienvenido">
								<h2>Bienvenido/a, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
								<?php echo "<img id='imagen' src='imagenes/".$row["imagen"]."' height='25%' width='25%' type='image'/>";?>
								</br/>
								<input type="submit" name="apartar" value="Añadir Al Carrito De Compras" href="js/procesarCheck.php">
								<p><a href="perfil.php">Perfil</a><?php echo " &#32";?><a href="logout.php">Cerrar Sesión</a></p>
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
					echo " <li><a href='carrito.php' method='post' name=carrito value='' >VER CARRITO</a> </li>";
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
								<a href='vg_individual.php?juegos=$i'><img name='juegos' value='".$i."' src='".$row["imagen"]."' height=240px width=100% /></a>
								<div style='overflow: auto'>
								Precio por Día:".$row["precio_dia"]."<br/>
								Consola:".$row["consola"]."<br/>
								<input name='vg".$i."' type='checkbox' value='".$i."' />".$row["nombre"]."
								</div>
							</article>  ";
						$i++;
					}	 	
				?>

			</section>
		</form>	
			<aside name="derecho">
            <form action="aplicacion.php" method="get" >
                <input list="Busquedas" name="Busqueda" required="requiered">
                <datalist id="Busquedas">
                <?php
                $query = "SELECT * FROM videogame";
                $result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
				while($row = mysqli_fetch_array($result)) { 
					echo "<option>".$row["nombre"]."</option>";
				}	 	
                ?>
                </datalist>
                <input type="submit" name="Buscar" value="Buscar">
            </form>
			 </aside>
			<footer name="pie">	</footer>
		
	</body>
</html>
