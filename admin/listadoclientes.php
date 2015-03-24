 
 <?php
	session_start();
 	if(isset($_SESSION['user'])){
		if($_SESSION['user']=="admi" && $_SESSION['pass']=="admi"){
		//conexion: 
		$link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link)); 
		//consulta: 
		$query = "SELECT * FROM cliente "; 
		//ejecutar consulta:
		$result = mysqli_query($link, $query) or die("La consulta falló: " . mysqli_error($link));
		echo '<link rel="stylesheet" href="listadocss.css" />
			<h2>USUARIO REGISTRADOS</h2>';
		echo '<table width="90%" border="0px" cellspacing="0px" cellpadding="0px">
  			<tr>
		   	<td><p>CEDULA</p></td>
			<td><p>NOMBRE</p></td>
			<td><p>TELEFONO</p></td>
			<td><p>CORREO</p></td>
  			</tr>'
  			;
		while($row = mysqli_fetch_array($result)){
			$cedula=$row['cedula'];
			$nombre=$row['nombre'];
			$telefono=$row['telefono'];
			$correo=$row['Correo'];
			echo '<tr>
		    	<td><p>'.$cedula.'</p></td>
    			<td><p>'.$nombre.'</p></td>
    			<td><p>'.$telefono.'</p></td>
    			<td><p>'.$correo.'</p></td>
				</tr>';
		}
			echo '</table></br>';
			echo '<p><a href="menu.php" >homepage</a>!</p>';
			}
		else{
			header("Location:Admi.php");
		}
	}
	
?>