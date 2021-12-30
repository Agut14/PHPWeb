<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
</head>
<body>
    <form action="index.php" method="GET">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1">

        <label for="num2">Número 2:</label>
        <input type="number" name="num2">

        <label for="operacion">Operación:</label>
        <select name="operacion" id="">
<option value="suma">Suma</option>
<option value="resta">Resta</option>
   <option value="multiplicacion">Multiplicación</option>     
<option value="division">División</option>
            
        </select>

        <input type="submit" name="resultado">
        <input type="reset" value="Reset" name="Reset">
    </form>
   

    <p id="resultado">
        <?php 
         require "calculadora.php";
            if(isset($_GET["resultado"])){
                echo  "Resultado: " . Calculadora();
            }
            
            
        ?></p>

        
</body>
</html>