<?php

try{

    if(!isset($_GET['id'])){
        throw new Exception("Error fatal!");
    }

}catch(Exception $e){
    echo "Ha habido un problema: ". $e->getMessage();
}

?>