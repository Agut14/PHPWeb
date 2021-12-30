<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Usuarios</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>


<?php

include "BaseDatos.php";
//comprobamos si la sesión está en marcha
session_start();
if(!isset($_SESSION["Usuario"])){
    header("location:Index.php");
}

//volvemos a comprobar el tipo de usuario para ver si es el superadmin.
if(isset($_COOKIE["Usuario"])){
    tipoUsuario($_COOKIE["Usuario"]);
   
}
//llamamos a la función que pinta los usuarios

if(isset($_COOKIE["SuperAdmin"])){
    echo" <form action='formUsuarios.php' method='POST'> 
    <button name='añadir' value='añadir' type='submit'>Añadir nuevo usuario</button></form>";
    mostrarUsuarios();
   
 }

?>

<a class="volver" href="Acceso.php">Volver</a>

<br>

<a class="cerrarSesion" href="cierreSesion.php">Cerrar sesión</a>
    
</body>
</html>