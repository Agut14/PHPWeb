<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Articulos</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <?php

    include "BaseDatos.php";
//comprobamos si la sesión está en marcha.
    session_start();
    if(!isset($_SESSION["Usuario"])){
        header("location:Index.php");
    }
if(isset($_COOKIE["Usuario"])){
        tipoUsuario($_COOKIE["Usuario"]);
        
       }
//Añadimos botón para añadir artículo
if(isset($_COOKIE["Admin"]) || isset($_COOKIE["SuperAdmin"])){
    echo" <form action='formArticulos.php' method='POST'> 
    <button class='btn btn-default mb-3' name='añadir' value='añadir' type='submit'>Añadir artículos</button></form>";  
 }

//Volvemos a comprobar el tipo de usuario.

mostrarArticulosOrdenados();





    
    

    ?>
<br>
	<a class="volver" href="Acceso.php">Volver</a>

    <br>

    <a class="cerrarSesion" href="cierreSesion.php">Cerrar sesión</a>
</body>
</html>