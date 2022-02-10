<?php
if(!empty($_POST['nombre']) && !empty($_POST['edad'])  && !empty($_POST['email'])  && !empty($_POST['password'])){
    $error = false;



    $nombre = $_POST['nombre'];
    $edad = (int)$_POST['edad'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!is_string($nombre) || !preg_match("/[a-zA-Z]+/", $nombre)){
        $error = "nombre";
        header("location:index.php?error=$error");
    }


    if(!is_int($edad) || !filter_var($edad, FILTER_VALIDATE_INT)){
        $error = "edad";
        header("location:index.php?error=$error");
    }

    if(!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "email";
        header("location:index.php?error=$error");
    }

    if(empty($password) || strlen($password) < 6){
        $error = "contraseña";
        header("location:index.php?error=$error");
    }


}else {
    $error = true;
    header("location:index.php?error=$error");
}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validar Formulario PHP</title>
    </head>
    <body>
        <H3>Formulario procesado correctamente!</H3>
        
    </body>
</html>