<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo database</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
        include "database.php";
    ?>
    
    <h1>Mundo database</h1>

    <p>Selecciona la ciudad</p>
    <form action="Index.php" method="GET">
    <select name="pais" id="pais" onchange="numHabit(this.value)">
        <option value="">Selecciona la ciudad...</option>
        <?php
            listarCiudades();
        ?>
        
    </select>
    </form>

    <p>El número de habitantes es de: <span id="habitantes"></span></p>

    

<script type="text/javascript" src="script.js"></script>
</body>
</html>