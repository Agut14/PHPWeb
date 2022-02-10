<?php

//Se puede copiar el archivo a otro con copy(), o renombrarlo con rename() o eliminar con unlink()
//comprobar si un archivo existe con file_existe()

//Abrir archivo
$archivo = fopen("ficheroTexto.txt", "a+");

//Leer archivo
while(!feof($archivo)){
    $contenido = fgets($archivo);
    echo $contenido;
}


//Escribir en archivo
fwrite($archivo, " Texto desde PHP");

//Cerrar archivo
fclose($archivo);

?>