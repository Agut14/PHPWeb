<?php

//Conexión a la base de datos

function crearConexión($database){

    //datos conexión
    $host = "localhost";
    $user = "root";
    $password = "";

    //conexión
    $conexion = mysqli_connect($host, $user, $password, $database);

    if (!$conexion) {
        die("<br>Error de conexión con la base de datos: " . mysqli_connect_error());
    }

    return $conexion;

}

function listarCiudades(){
    $DB = crearConexión("world");
    $sql = "SELECT Name from city";

    $result = mysqli_query($DB, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo"<option>" . $row["Name"] . "</option>";
        }
    // Si no, enviamos un mensaje de error.
    } else {
        echo "No hay ciudades disponibles." . mysqli_error($DB);
    }
    mysqli_close($DB);
    
}

//Obtener el número de habitantes
function getPoblacion(){

$mysqli = crearConexión("world");

$sql = "SELECT Population
FROM city WHERE Name = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_POST['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($poblacion);
$stmt->fetch();
$stmt->close();

echo $poblacion;

}



?>