<?php
$archivo = $_FILES['archivo'];
$nombre = $archivo['name'];
$tipo = $archivo['type'];


if($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png"){
    if(!is_dir('images')){
        mkdir('images', 0777);
    }
    move_uploaded_file($archivo['tmp_name'], 'images/'.$nombre);
    echo "Imagen subida correctamente";
    header("Refresh: 3; URL=index.php");
}else {
    header("Refresh: 3; URL=index.php");
    echo "Sube una imagen con un formato correcto";
}

?>