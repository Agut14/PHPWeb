<?php

function app_autoloader($classname){
    include 'controller/'.$classname.'.php';
}

spl_autoload_register("app_autoloader");


?>