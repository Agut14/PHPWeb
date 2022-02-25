<?php

require_once "config/database.php";

class ModeloBase{

    public $db;

    public function __construct()
    {   
        $this->db = database::conectar();
    }

    public function getAll($tabla){
        $query = $this->db->query("SELECT * FROM $tabla ORDER BY id DESC");
        return $query;
    }

    public function insertar($name, $lastname, $email){
        $query = $this->db->query("INSERT INTO usuarios (nombre, apellidos,email) VALUES ('$name', '$lastname', '$email')");
        return $query;
    }
}


?>