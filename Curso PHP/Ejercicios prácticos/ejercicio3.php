<?php
//Hacer una interfaz de usuario con 2 inputs i 4 botones, uno para sumar, restar, dividir y multiplicar. Mostrar resultado.

if(isset($_POST['num1']) && isset($_POST['num2'])){

    function operacion($ope){
        $resultado = 0;
        switch($ope){
            case "sumar":
                $resultado = $_POST['num1'] + $_POST['num2'];
                break;
            case "restar":
                $resultado = $_POST['num1'] - $_POST['num2'];
                break;
            case "dividir":
                $resultado = $_POST['num1'] / $_POST['num2'];
                break;
            case "multiplicar":
                $resultado = $_POST['num1'] * $_POST['num2'];
                break;
                
        }
        return $resultado;
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form action="ejercicio3.php" method="POST">
        <label for="num1">Número 1</label>
        <input type="number" name="num1">

        <label for="num2">Número 2</label>
        <input type="number" name="num2">

        <input type="submit" value="sumar" name="ope">
        <input type="submit" value="restar" name="ope">
        <input type="submit" value="dividir" name="ope">
        <input type="submit" value="multiplicar" name="ope">


    </form>

    <?php
    if(isset($_POST['ope'])){
        echo "<h1> El resultado es: " . operacion($_POST['ope']);
    }
    ?>
    
</body>
</html>