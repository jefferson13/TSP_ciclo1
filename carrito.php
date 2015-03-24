<?php
	$total=0;
	session_start();
	if(isset($_SESSION['Carrito'])){
		if(isset($_POST['id'])){
			$arreglo=$_SESSION['Carrito'];
			$encontro=false;
			$numero=0;
			for ($i=0; $i <count($arreglo) ; $i++) { 
				if($arreglo[$i]['Id']==$_POST['id']){
					$encontro=true;
					$numero=$i;
				}
			}
			if($encontro==true){
				$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
				$_SESSION['Carrito']=$arreglo;
			}else{
				$nombre="";
				$precio=0;
				$imagen="";			
				$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link));
				$query="SELECT * FROM videogame WHERE id_vj='".$_POST['id']."'"; 
				$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
				while ($f=mysqli_fetch_array($result)) {
					$nombre=$f['nombre'];
					$descripcion=$f['descripcion'];
					$precio=$f['precio_dia'];
					$consola=$f['consola'];
					$stock=$f['stock'];
					$imagen=$f['imagen'];
					
				}
				$datosnuevos=array('Id'=>$_POST['id'],
					'Nombre'=>$nombre,
					'Descripcion'=>$descripcion,
					'Precio'=>$precio,
					'Consola'=>$consola,
					'Stock'=>$stock,
					'Imagen'=>$imagen,
					'Cantidad'=>1);
				array_push($arreglo, $datosnuevos);
				$_SESSION['Carrito']=$arreglo;
			}
		}	

	}else{
		if(isset($_POST['id'])){
			$nombre="";
			$precio=0;
			$imagen="";			
			$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link));
			$query="SELECT * FROM videogame WHERE id_vj='".$_POST['id']."'"; 
			$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
			while ($f=mysqli_fetch_array($result)) {
				$nombre=$f['nombre'];
				$descripcion=$f['descripcion'];
				$precio=$f['precio_dia'];
				$consola=$f['consola'];
				$stock=$f['stock'];
				$imagen=$f['imagen'];
				
			}
			$arreglo[]=array('Id'=>$_POST['id'],
				'Nombre'=>$nombre,
				'Descripcion'=>$descripcion,
				'Precio'=>$precio,
				'Consola'=>$consola,
				'Stock'=>$stock,
				'Imagen'=>$imagen,
				'Cantidad'=>1);

			$_SESSION['Carrito']=$arreglo;
			
		}

	}
?>	
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Carrito De Compras</title>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<link rel="stylesheet" href="carritoCSS.css" />
		<style type="text/css"> 
			A:link {text-decoration:none;color:WHITE;} 
			A:visited {text-decoration:none;color:#ffcc33;} 
			A:active {text-decoration:none;color:#ff0000;} 
			A:hover {text-decoration:underline;color:#999999;} 
		</style>
	</head>
	
	<body>
		<header>
			<h1>Carrito De Compras</h1>
		</header>
		<section>
			<?php
				if(isset($_SESSION['Carrito'])){
					$datos=$_SESSION['Carrito'];
					$total=0;
					for($i=0;$i<count($datos);$i++){
			?>
						<div class="producto">
							<center>
								<img src="<?php echo $datos[$i]['Imagen']; ?> " height=240px width=240px /><br>
								<span><?php echo $datos[$i]['Nombre'];?></span><br>
								<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
								<span>Consola: <?php echo $datos[$i]['Consola'];?></span><br>
								<span>Stock: <?php echo $datos[$i]['Stock'];?></span><br>
								<span>descripcion: <?php echo $datos[$i]['Descripcion'];?></span><br>
								<span>Cantidad:
									<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
									data-precio="<?php echo $datos[$i]['Precio'];?>"
									data-id="<?php echo $datos[$i]['Id']; ?>"
									class="cantidad">
								</span><br>
							</center>					
						</div>
			<?php	
					$total=($datos[$i]['Cantidad']*$datos[$i]['Precio']+$total);
					}

				}else{
					echo'<center><h2>Aun el carrito de compras esta vacio</h2></center>';
				}
				echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
			?>
			<center><a href="aplicacionlogin.php">Page Home</center>	
		</section>
	</body>
	</html>

