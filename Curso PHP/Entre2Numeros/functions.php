<?php

    function entre2(){

        if(!empty($_GET["num1"]) && !empty($_GET["num2"])){
            while ($_GET["num1"] < $_GET["num2"]){
                if($_GET["num1"] % 2 == 0){
                    echo $_GET["num1"] . "<br>";
                }
                
                $_GET["num1"]++;
            }

            while ($_GET["num1"] > $_GET["num2"]){
                
                if($_GET["num2"] % 2 == 0){
                    echo $_GET["num2"] . "<br>";
                }
                $_GET["num2"]++;
            }
        }

        return;
    }


?>