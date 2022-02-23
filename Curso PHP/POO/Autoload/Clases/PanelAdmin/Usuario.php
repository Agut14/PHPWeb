<?php

namespace PanelAdmin;

class Usuario{
    public $name;
    public $email;

    public function __construct()
    {
        $this->name = "Carlos Vives";
        $this->email = "carlosagutvives@gmail.com";
    }
}

?>