<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido!</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php
    include "BaseDatos.php";
    session_start();

    if(!isset($_SESSION["Usuario"])){
        header("location:Index.php");
    }

    

    if (isset($_COOKIE["Usuario"])) {
        tipoUsuario($_COOKIE["Usuario"]);
        
      
        if(isset($_COOKIE["SuperAdmin"])){
            echo "<div class='container-fluid text-center'>";
            echo "<div class='row mt-4 justify-content-center'>";
            echo "<div class='col-4 card border-primary'>";
            echo"<a class='enlaceAcceso' href='Articulos.php'>Artículos</a>\n";
            echo"</div>";
            echo "<div class='col-4 offset-2 card border-primary'>";
            echo"<a class='enlaceAcceso' href='Usuarios.php'>Usuarios</a>";
            echo"</div>";
            echo"</div>";
            echo"</div>";
        }else{
            echo "<div class='container-fluid text-center'>";
            echo"<a class='card border-primary' href='Articulos.php'>Artículos</a>";
            echo"</div>";
        }
    }else {
        echo "Error de autentificación";
    }

    
    
?>

<br>
	<a class="volver" href="cierreSesion.php">Volver</a>


    
</body>
</html>