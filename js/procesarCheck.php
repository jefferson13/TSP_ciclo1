<?php
	var_dump($_POST);
	session_start();
	$cone = mysqli_connect("localhost","root","","videojuegos") or die("Error en la conexion. " . mysqli_error($link)); 
	//consulta: 
	$res = "SELECT * FROM videogame"; 
	//ejecutar consulta. 
	$consult = mysqli_query($cone, $res) or die("La consulta falló: " . mysqli_error($link));
	$i=1;

	if(isset($_POST)){
		while($row = mysqli_fetch_array($consult)) {	
			if (isset($_REQUEST["vg".($i).""])) {
				if(isset($_SESSION['Carrito'])){
					if(isset($_POST["vg".($i).""])){
						$arreglo=$_SESSION['Carrito'];
						$encontro=false;
						$numero=0;
						for ($a=0; $a <=count($arreglo) ; $a++) { 
							if($arreglo[$a]['Id']==$_POST["vg".($i).""]){

								$encontro=true;
								$numero=$a;

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
							$query="SELECT * FROM videogame WHERE id_vj='".$_POST["vg".($i).""]."'"; 
							$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
							while ($f=mysqli_fetch_array($result)) {
								$nombre=$f['nombre'];
								$descripcion=$f['descripcion'];
								$precio=$f['precio_dia'];
								$consola=$f['consola'];
								$stock=$f['stock'];
								$imagen=$f['imagen'];
						
							}
							$datosnuevos=array('Id'=>$_POST["vg".($i).""],
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
					if(isset($_POST["vg".($i).""])){
						$nombre="";
						$precio=0;
						$imagen="";			
						$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link));
						$query="SELECT * FROM videogame WHERE id_vj='".$_POST["vg".($i).""]."'"; 
						$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
						while ($f=mysqli_fetch_array($result)) {
							$nombre=$f['nombre'];
							$descripcion=$f['descripcion'];
							$precio=$f['precio_dia'];
							$consola=$f['consola'];
							$stock=$f['stock'];
							$imagen=$f['imagen'];
				
						}
						$arreglo[]=array('Id'=>$_POST["vg".($i).""],
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
				$update = "UPDATE videogame set stock='".(($row["stock"])-1)."' WHERE nombre='".$row["nombre"]."'";
				mysqli_query($cone, $update) or die("La actualización falló: " . mysqli_error($cone));
				$insert_prestamo = "INSERT INTO prestamo (id_cliente, id_videojuego) VALUES('".$_SESSION['session_cedula']."', '".$row["id_vj"]."')";
				mysqli_query($cone, $insert_prestamo) or die("La inserción de prestamo falló: " . mysqli_error($link));
			}
		$i++;
		}
	}
	
	header("location:http://localhost/TSP_ciclo1/carrito.php");
?>