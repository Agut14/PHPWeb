<?php
//programa que compruebe que una variable está vacia y si está vacía rellenarla con texto en minúsculas 
//pero mostrarlo en mayúsculas

$texto = "";

if (empty($texto)){
    $texto = "relleno del texto";
    echo strtoupper($texto);
}



?>