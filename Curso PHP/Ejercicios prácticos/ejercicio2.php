<?php
/*
Una función
Validar un email con filter var
Recoger varibale por get y validarla
Mostrar el resultado
*/ 

function validarEmail($email){
    $status = "No válido";
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $status = "Válido";
    }
    return $status;
}

if(isset($_GET['email'])){
    echo validarEmail($_GET['email']);
}else{
    echo "Pasa por get un email.";
}

?>