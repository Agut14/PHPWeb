<?php

class coche {

    //variables
    protected $marca;
    protected $color;
    protected $km;

    //constructor
    public function __construct($marca, $color, $km)
    {
        $this->marca = $marca;
        $this->color = $color;
        $this->km = $km;
    }
    //getters
    public function getMarca(){
        return $this->marca;
    }

    public function getColor(){
        return $this->color;
    }
    public function getKm(){
        return $this->km;
    }
    
    public function mostrarInfo(){
        $informacion = '<h1>Información del vehículo</h1>';
        $informacion.= 'Marca: '. $this->marca;
        $informacion.= '<br>Color: '. $this->color;
        $informacion.= '<br>Km: '. $this->km;

        return $informacion;
    }
}

?>