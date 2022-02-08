<?php 
//cerramos la sesión
session_start();

session_destroy();

//reseteo la variable POST
unset($_POST['nombre']);

//volvemos al archivo anterior
header('location:sesiones1.php');



?>