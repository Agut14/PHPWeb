<?php
//crear un script en php que tenga 4 variables
//un array, un string, un integer y un boolean 
//y que imprima un mensaje según la variable que sea, después de comprobarlo.

//array
$arr = array();

//integer
$num = 1;

//String
$cadena = "Hola";

//Boolean
$boleano = true;



switch(gettype($cadena)){
    case "array":
        echo "Efectivamente, es un array";
        break;

    case "integer":
        echo "Es un integer";
        break;
        
    case "string":
        echo "Es un string";
        break;
        
    case "boolean":
        echo "Es un booleano";
        break;    
        
}


?>