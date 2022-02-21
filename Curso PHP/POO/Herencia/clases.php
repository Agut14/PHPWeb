<?php

class Coche{
    protected $km;
    protected $color;


    public function __construct($km, $color)
    {
        $this->km = $km;
        $this->color = $color;
    }

    

    /**
     * Get the value of km
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set the value of km
     *
     * @return  self
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }
}

class Audi extends Coche{
    protected $modelo;

    
    /**
     * Get the value of modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }
}



?>