<?php

function Calculadora(){

    if(!empty($_GET["num1"]) && !empty($_GET["num2"])){

        switch ($_GET["operacion"]){

            case "suma":
                return ($_GET["num1"]) + $_GET["num2"];
                break;

            case "resta":
                return $_GET["num1"] - $_GET["num2"];
                break;
                    
                    

            case "multiplicacion":
                return $_GET["num1"] * $_GET["num2"];
                break;


            case "division":
                return $_GET["num1"] / $_GET["num2"];
                break;
        }

}

}



    

?>