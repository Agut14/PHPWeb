<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar formularios en PHP</title>
</head>
<body>

<h1>Validar Formulario en PHP</h1>

<?php
if(isset($_GET['error'])){
    switch($_GET['error']){
        case 1: 
            echo "Faltan datos por rellenar";
            break;
        case "nombre":
            echo "Introduce un nombre correcto";
            break;  
        case "edad":
            echo "Introduce una edad correcta";
            break;  
        case "email":
            echo "Introduce un email correcto";
            break;  
            case "contraseña":
            echo "Introduce una contraseña correcta";
            break;            
    }
    
}
?>

    <form action="validarFormulario.php" method="POST">
        <label for="nombre">Nombre:</label></br>
        <input type="text" name="nombre" pattern="[A-Za-z]+"></br>

        <label for="apellidos">Apellidos:</label></br>
        <input type="text" name="apellidos"></br>

        <label for="edad">Edad:</label></br>
        <input type="number" name="edad" ></br>

        <label for="email">Email:</label></br>
        <input type="email" name="email" required="required"></br>

        <label for="password">Contraseña:</label></br>
        <input type="password" name="password" required="required" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$"></br>
        </br>

        <input type="submit" value="Enviar"></br>
    </form>
    
</body>
</html>