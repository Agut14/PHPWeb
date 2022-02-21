<?php

abstract class Ordenador{
    protected $encendido;

    abstract public function encender();

    abstract public function apagar();

}

class Asus extends Ordenador{

    public function encender()
    {
        $this->encendido = true;

        return $this->encendido;
    }

    public function apagar()
    {
        $this->encendido = false;

        return $this->encendido;
    }
}


?>