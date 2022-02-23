<?php

class UsuarioController {

    public function mostrarTodos(){
        echo "Mostrando todos los usuarios";
        require_once "model/Usuario.php";
        
        

        $usuario = new Usuario();
        $todosLosUsuarios = $usuario->getAll();

        require_once "views/Usuarios/mostrar-todos.php";

    }

    public function crearUsuario(){
        echo "Creando usuario";
    }

    public function crear(){
        require_once "views/Usuarios/crear.php";
    }
}


?>