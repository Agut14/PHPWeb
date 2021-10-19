<?php

if(!isset($_COOKIE['repeticiones'])) {
    setcookie('repeticiones', 10, time() + 5);
    echo "Creo la cookie";
}else {
    echo "ya está definida la cookie";
}
$valor = $_COOKIE['repeticiones'];
for($i = 0; $i < $valor; $i++ ){
    echo $i . "<br>";
}

?>