<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP-POO</title>
</head>
<body>
    <form action="index.php" method="POST">
        <label for="marca">Marca del vehículo:</label>
        <input type="text" name="marca" id="">

        <label for="color">Color del vehículo:</label>
        <input type="text" name="color" id="">

        <label for="km">KM del vehículo:</label>
        <input type="number" name="km" id="">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>





<?php 
require 'coche.php';

if(isset($_POST['marca']) && isset($_POST['color']) && isset($_POST['km'])){
    $coche = new coche($_POST['marca'], $_POST['color'], $_POST['km']);

    echo $coche->mostrarInfo();
}




?>