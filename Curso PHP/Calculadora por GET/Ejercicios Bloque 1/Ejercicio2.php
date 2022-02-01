<?php
//programa que añada valores aleatorios del 1 al 120 a un array mientras que su longitud sea menor que 120 y luego
//mostrarlo por pantalla

$arr = array();

for($i = 0; $i < 120; $i++){
    $aleatorio = rand(1,100);
    array_push($arr, $aleatorio);
    echo $arr[$i]. "</br>";
}

?>