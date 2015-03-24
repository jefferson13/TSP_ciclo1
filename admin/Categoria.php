<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        
        <form action="Categoria.php" method="get">
            <input type="text" name="Categoria" required="required">
            <input type="submit" value="Agregar" name="Agregar" >
            <input type="submit" value="Modificar" name="Modificar">
            <input type="submit" value="Eliminar" name="Eliminar">
            <p><a href="menu.php" >homepage</a>!</p>
        
        <?php
        session_start();
        if(!isset($_SESSION["user"])) { //Modificar esta parte para que sea solo el admin.
            header("Admi.php");
        }else{
        if (isset($_GET['Modificar'])|isset($_GET['Eliminar'])|isset($_GET['Agregar'])|isset($_GET['Aceptar'])) {
        $link = mysqli_connect("localhost","root","","videojuegos") or die("Error " . mysqli_error($link));
            $query = "";
            if (isset($_GET['Agregar'])) { 
                $query = "INSERT INTO categoria(nombre) VALUES ('".$_GET['Categoria']."')";
                $result = mysqli_query($link, $query);
            }
            if (isset($_GET['Eliminar'])) { 
                $query = "DELETE FROM categoria WHERE nombre='".$_GET['Categoria']."'";
                $result = mysqli_query($link, $query);
            }
            if (isset($_GET['Modificar'])) { 
                echo '<br><br>Modificar : <input type="text" name="valor" value="'.$_GET['Categoria'].'" required="required">';
                echo '<input type="submit" value="Aceptar" name="Aceptar">';
            }
            if (isset($_GET['Aceptar'])) { 
                $query = "UPDATE categoria SET nombre='".$_GET['Categoria']."' WHERE nombre='".$_GET['valor']."'";
                $result = mysqli_query($link, $query);
            }
            mysqli_close($link);
        }
    }
        ?>
           
        </form>
        
    </body>
</html>