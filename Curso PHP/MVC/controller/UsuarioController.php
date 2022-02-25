<?php

class UsuarioController {

    public function mostrarTodos(){
        echo "Mostrando todos los usuarios";
        require_once "model/Usuario.php";
  

        $usuario = new Usuario();
        $todosLosUsuarios = $usuario->getAll('usuarios');

        require_once "views/Usuarios/mostrar-todos.php";

    }

    public function crearUsuario(){
        echo "Creando usuario";
    }

    public function crear(){
        require_once "views/Usuarios/crear.php";
        require_once "model/Usuario.php";

        $usuarioCrear = new Usuario();


        if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email'])){
            $nombre = $_POST['name'];
            $apellidos = $_POST['lastname'];
            $email = $_POST['email'];
            $usuarioCrear->insertar($nombre,$apellidos,$email);
        }

       
    }
    
    

    
}


?>