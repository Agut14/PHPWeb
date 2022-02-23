<?php

class NotaController{
    public function listar(){
        //Modelo
        require_once "model/Nota.php";
        //Acción del controlador
        $nota = new Nota();
        $nota->setNombre("Hola Mundo");
        $nota->setContenido("Hola Mundo desde PHP");
        //Vista
        require_once "views/Notas/listar.php";


    }
    public function crear(){

    }
    public function borrar(){
        
    }
}

?>