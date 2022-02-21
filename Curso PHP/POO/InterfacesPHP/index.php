<?php

require_once "interfaceClase.php";

$carlos = new Usuario();

$carlos->setEdad(25);
$carlos->setNombre("Carlos");

$carlos->mostrarDatos();

?>