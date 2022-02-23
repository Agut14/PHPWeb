<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
</head>
<body>
    <?php 
        require_once "controller/Usuario.php";
        require_once "controller/Nota.php";

        if(isset($_GET['controller'])){
            $nombreControlador = $_GET['controller']. 'Controller';
        }else {
            echo 'La página no existe';
            exit();
        }
        
        if(class_exists($nombreControlador)){
            $controlador = new $nombreControlador();
            
            if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
                $action = $_GET['action'];
                $controlador->$action();
            }else {
                echo "El método no existe";
            }

        }else {
            echo 'El método no existe';
        }


    ?>
    
</body>
</html>


<?php




?>