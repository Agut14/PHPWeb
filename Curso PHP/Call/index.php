<?php

class Persona {
    public $nombre;
    public $edad;
    

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    public function __call($name, $arguments)
    {
        if(substr($name, 0, 3) == "get"){
            $nombre_metodo = substr(strtolower($name), 3);
            return $this->$nombre_metodo;
        }
    }
}


$carlos = new Persona("Carlos", 25);

echo $carlos->getEdad();

?>