<?php

interface Persona{
    
    public function mostrarDatos();

}

class Usuario implements Persona{
    public $edad;
    public $nombre;

    

    /**
     * Get the value of edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function mostrarDatos()
    {
        echo "La edad de este usuario es de ". $this->edad. " y su nombre es ". $this->nombre;
    }
}


?>