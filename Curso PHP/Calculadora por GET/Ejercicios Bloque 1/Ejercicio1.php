<?php

//Programa con un array que tenga 8 números, y realizar operaciones con el.

//declaración array
$arr = array(6,2,3,1,5,20,7,8);

//recorrer y mostrar
function mostrar($arr){
    $resultado = "";
    foreach($arr as $x){
        $resultado .= $x."</br>";
    }
    return $resultado;
}
echo mostrar($arr);

echo "///////// </br>";

//ordenar y mostrar
asort($arr);
echo mostrar($arr);

echo "</br>";

//mostrar longitud
echo "Longitud del array". count($arr);
echo "</br>";

//buscar algún elemento
 echo array_search(1,$arr);



?>