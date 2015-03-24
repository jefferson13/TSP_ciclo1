<!DOCTYPE html>

<?php
	session_start();
	if(isset($_SESSION["session_username"])){
		header("Location: aplicacionlogin.php");
	}
	$consulta="";
        if (isset($_GET["Buscar"])) {
            $consulta=" WHERE nombre LIKE '%".$_GET["Busqueda"]."%'";

        }
?>

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
		<form method="post" action="sesion.php">
			<header name="superior" title="Ikaros - Anime: Sora no Otoshimono">
				<div id="login">		
					<fieldset>
						<legend>Datos de Contacto</legend>
						<ul>
							<li>
								<input type="submit" name="login" value="INICIAR SESIÓN" />							
							</li>
							<li>
								<p>Eres nuevo? <a href="registrar.php" >Registrate Aquí</a>!</p>
							</li>
						</ul>
					</fieldset>	
				</div>
			</header>
		</form>
			
		<aside name="izquierdo">
			<?php
				//conexion: 
				$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
				//consulta: 
				$query = "SELECT * FROM categoria" or die("Error in the consult.." . mysqli_error($link)); 
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
				echo " <li><a href='aplicacionlogin.php'>VISTA GENERAL</a> </li>";
				echo "</ul>";
			?>			
		</aside>
		
		<section> 
			<?php
				//conexion: 
				$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
				//consulta: 
				if(isset($_GET["Buscar"])){
					
					$query = "SELECT * FROM videogame WHERE nombre='".$_GET["Busqueda"]."'";

				}
				
				
				else{
					$query = "SELECT * FROM videogame" or die("Error in the consult.." . mysqli_error($link)); 
				}
				//ejecutar consulta:
				$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
				$i=1;
				while($row = mysqli_fetch_array($result)) { 
					echo "
						<article name='vg".$i."' title='".$row["descripcion"]."    Stock:".$row["stock"]."'>
							<form action='vg_individual.php' method='get' > 
								<input name='juegos' value='".$i."' src='".$row["imagen"]."' height=240px width=100% type='image' /> 
							</form>
							Precio por Día: ".$row["precio_dia"]."<br/>
							Consola: ".$row["consola"]."<br/>
							Nombre: ".$row["nombre"]."
						</article>  
						";
					$i++;
				}	 	
			?>
		</section>
			
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