<?php

require_once "autoload.php";

/*
$usuario1 = new Usuario();
$categoria1 = new Categoria();
echo $usuario1 ->name;
echo $categoria1->description;
*/

//NAMESPACES
use misClases\Usuario;
use misClases\Categoria;
use misClases\Entrada;
use PanelAdmin\Usuario as UserAdmin;

class Principal{
    public $usuario;
    public $entrada;
    public $categoria;
    public $userAdmin;

    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->userAdmin = new UserAdmin();
    }
}

$carlosAdmin = new Principal();
var_dump($carlosAdmin->userAdmin);

$carlos = new Principal();
var_dump($carlos->usuario);

?>