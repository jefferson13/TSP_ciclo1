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
					<fieldset>
						<legend>Datos de Contacto</legend>
						
						<?php
							session_start();
							if(!isset($_SESSION["user"])) { //Modificar esta parte para que sea solo el admin.
								header("Admi.php");
							} 
							else {
						?>
								<div id="bienvenido">
								<h2>Bienvenido/a, <span><?php echo $_SESSION['user'];?>! </span></h2>
								<input type="submit" name="crear" value="Actualizar">  <!-- Dejé el name="crear" para poder usar crearphp.php tambn para actualizar-->
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
					$link = mysqli_connect("localhost","root","","videojuegos") or die("Error en la conexion" . mysqli_error($link)); 
					//consulta: 
					$consulta_categoria = "SELECT * FROM categoria"; 
					$consulta_videogame = "SELECT * FROM videogame";					
					//ejecutar consulta. 
					$resultado_vg= mysqli_query($link, $consulta_videogame) or die("La consulta de los videojuegos falló: " . mysqli_error($link));
					$youtube="https://www.youtube.com/embed/";
					$n=1;
					$i=1;
					while($row = mysqli_fetch_array($resultado_vg)) {	
						if (isset($_POST["vg".$i.""])) {
							$resultado_cate= mysqli_query($link, $consulta_categoria) or die("La consulta de las categorías falló: " . mysqli_error($link));
							$consulta="select nombre from categoria where id_categoria='".$row["id_categoria"]."'";
							$cate= mysqli_query($link, $consulta) or die("La consulta de la categoría falló: " . mysqli_error($link));
							$fila_categoria = mysqli_fetch_array($cate);
							$categoria=$fila_categoria["nombre"];
							$id_videojuego=$row["id_vj"];
							echo"
							<input type='hidden' name='id_videojuego".$n."' value='$id_videojuego' />
							<article id='videojuego".$n."''>		
								<fieldset>
									<legend>Videojuego Número ".$n."</legend>
									<article name='vg".$n."'>
										<ul>
											<li>
												<input type='hidden' name='id_video3' value='$n' />
												<h3>Imagen Antigua:</h3>
												<img id='imagen' src='..//".$row["imagen"]."' height='25%' width='25%' type='image'/> <br/>
												<label for='ima_".$n."'>Imagen NUEVA</label>
												<input type='file' name='imagen_".$n."' id='imagen_".$n."'/>
											</li>
											<br/>
											<li>
												<h3>Nombre Antiguo: ".$row["nombre"]."</h3>
												<label for='name_".$n."'> <h1>Nombre Nuevo: </h1></label>
												<input type='text' name='nombre_".$n."' id='nombre_".$n."' placeholder='Nombre.' autofocus='autofocus' required='required' min='' maxlength='40' />
											</li>
											<br/>
											<li>
												<h3>Descripción Antigua: ".$row["descripcion"]."</h3>
												<label for='descripcion_".$n."'>Descripción NUEVA: </label>
												<input type='text' name='descripcion_".$n."' id='descripcion_".$n."' placeholder='Aquí va una pequeña descripción del Videojuego.' min='' maxlength='1000'/>
											</li>
											<br/>
											<li>
												<h3>Precio por Día Antiguo: ".$row["precio_dia"]."</h3>
												<label for='precio_dia_".$n."'>Precio por Día NUEVO: </label>
												<input type='number' name='precio_dia_".$n."' id='precio_dia_".$n."' placeholder='Valor por día.' required='required' min='1' maxlength='40' />
											</li>
											<br/>
											<li>
												<h3>Consola Antigua: ".$row["consola"]."</h3>
												<label for='consola_".$n."'>Consola NUEVA: </label>
												<input type='text ' name='consola_".$n."' id='consola_".$n."' placeholder='Tipo de Consola.' min='1' maxlength='15'/>
											</li>
											<br/>
											<li>
												<h3>Stock Antiguo: ".$row["stock"]."</h3>
												<label for='stock_".$n."'>Stock NUEVO: </label>
												<input type='number ' name='stock_".$n."' id='stock_".$n."' placeholder='Cantidad en Bodega.' required='required' min='1' maxlength='15'/>
											</li>
											<br/>
											<li>
												<h3>Categoría Antigua: ".$categoria."</h3>
												<label for='categoria_".$n."'>Categoría NUEVA: </label>
												<select name='id_categoria_".$n."'> ";
												while($filas = mysqli_fetch_array($resultado_cate)) {	
													echo "<option value='".$filas["id_categoria"]."' >".$filas["nombre"]."</option>";

												}
											echo "
												</select>
											</li>
											<br/>				    	
											<li>
												<h3>ID del Video Antiguo: ".$row["video"]."</h3>
												<div name='video'>
													<iframe class='youtube-player' type='text/html' src='".$youtube.$row["video"]."' frameborder='0'></iframe>
												</div>
												<label for='video_".$n."'>ID del NUEVO Video de YouTube: </label>
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
						$i++;
					}	 	
				?>

			</section>
			
			<aside name="derecho"> </aside>
			<footer name="pie">	</footer>
		</form>
	</body>
</html>