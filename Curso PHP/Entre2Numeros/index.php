<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entre 2 números</title>
</head>
<body>
    <form action="index.php">
        <label for="num1">Número 1:</label>
        <input type="number" name="num1">

        <label for="num2">Número 2:</label>
        <input type="number" name="num2">

        <input type="submit" name="Enviar">
        
    </form>

    <p>
        <?php
            require "functions.php";

            entre2() . "<br>";
        ?>
    </p>
</body>
</html>