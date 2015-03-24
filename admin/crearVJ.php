<!DOCTYPE html>

<html lang="es">
	<head>
		<title>VideoGames</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="estilosCrear.css" /> <!--Quitar la W del CSS para que la use.-->
		<style type="text/css"> 
			A:link {text-decoration:none;color:WHITE;} 
			A:visited {text-decoration:none;color:#ffcc33;} 
			A:active {text-decoration:none;color:#ff0000;} 
			A:hover {text-decoration:underline;color:#999999;} 
		</style>
	</head>

	<body>
		<form method="post" action="crearphp.php" autocomplete="on" enctype="multipart/form-data">
			<header name="superior" title="Ikaros - Anime: Sora no Otoshimono">
				<div id="login">		
					<fieldset name="login">
						<legend name="login">Datos de Contacto</legend>
						
						<?php
							session_start();
							if(!isset($_SESSION["user"])) { //Modificar esta parte para que sea solo el admin.
								header("Admi.php");
							} 
							else {
						?>
								<div id="bienvenido">
								<h2>Bienvenido/a, <span><?php echo $_SESSION['user'];?>! </span></h2>
								<input type="submit" name="crear" value="Crear" href="crearphp.php">
								<p><a href="logout.php">Cerrar Sesión</a></p>
								</div>
								<?php
							}
						?>				
					</fieldset>	
				</div>
			</header>
	
			<aside name="izquierdo"></aside>
		
			<section> 
				<?php
					//conexion: 
					$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
					//consulta: 
					$consulta_categoria = "SELECT * FROM categoria"; 
					$n=1;
					while($n<=$_GET["cantidad"]){
						$resultado = mysqli_query($link, $consulta_categoria) or die("La consulta falló: " . mysqli_error($link));
						echo"
						<article id='videojuego'>		
							<fieldset name='videojuego'>
								<legend name='videojuego'>Videojuego Número ".$n."</legend>
								<article name='vg".$n."'>
									<ul>
										<li>
											<label for='nombre_".$n."'>Nombre: </label>
											<input type='text' name='nombre_".$n."' id='nombre_".$n."' placeholder='Nombre.' autofocus='autofocus' required='required' min='' maxlength='40' />
										</li>
										<br/>
										<li>
											<label for='descripcion_".$n."'>Descripción: </label>
											<input type='text' name='descripcion_".$n."' id='descripcion_".$n."' placeholder='Aquí va una pequeña descripción del Videojuego.' min='' maxlength='1000'/>
										</li>
										<br/>
										<li>
											<label for='precio_dia_".$n."'>Precio por Día: </label>
											<input type='number' name='precio_dia_".$n."' id='precio_dia_".$n."' placeholder='Valor por día.' required='required' min='1' maxlength='40' />
										</li>
										<br/>
										<li>
											<label for='consola_".$n."'>Consola: </label>
											<input type='text ' name='consola_".$n."' id='consola_".$n."' placeholder='Tipo de Consola.' min='1' maxlength='15'/>
										</li>
										<br/>
										<li>
											<label for='stock_".$n."'>Stock: </label>
											<input type='number' name='stock_".$n."' id='stock_".$n."' placeholder='Cantidad en Bodega.' required='required' min='1' maxlength='15'/>
										</li>
										<br/>
										<li>
											<label for='categoria_".$n."'>Categoría: </label>
											<select name='id_categoria_".$n."'> ";
											while($filas = mysqli_fetch_array($resultado)) {	
												echo "<option value='".$filas["id_categoria"]."' >".$filas["nombre"]."</option>";

											}
										echo "
											</select>
										</li>
										<br/>
										<li>
											<label for='ima_".$n."'>Imagen</label>
											<input type='file' name='imagen_".$n."' id='imagen_".$n."'/>
										</li>
										<br/>										    	
										<li>
											<label for='video_".$n."'>ID del Video de YouTube: </label>
											<input type='text ' name='video_".$n."' id='video_".$n."' placeholder='youtube.com/watch?v=Hy6V9o3Iono --> ID: Hy6V9o3Iono' min='1' maxlength='15'/>
										</li>
										<br/>
										
										
										
									</ul>								
								</article>										
							</fieldset>	
						</article>
						";
						$n++;
					}	 	
				?>

			</section>
			
			<aside name="derecho"> </aside>
			<footer name="pie">	</footer>
		</form>
	</body>
</html>