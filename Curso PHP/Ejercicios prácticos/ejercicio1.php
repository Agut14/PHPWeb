<?php
//Sesión que aumente o disminuya su valor en 1 en función al parametro GET, "counter" (0 o 1);

session_start();

if(!isset($_SESSION['numero'])){
    $_SESSION["numero"] = 0;
}

if(isset($_GET['counter']) && $_GET['counter'] == 1){
    $_SESSION['numero']++;
}

if(isset($_GET['counter']) && $_GET['counter'] == 0){
    $_SESSION['numero']--;
}



?>
<h1>El valor de la sesión es: <?=$_SESSION['numero']?></h1>

<a href="ejercicio1.php?counter=1">Aumentar el valor</a>

<a href="ejercicio1.php?counter=0">Disminuir el valor</a>
