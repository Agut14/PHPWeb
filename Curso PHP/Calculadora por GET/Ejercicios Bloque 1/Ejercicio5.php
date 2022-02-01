<?php
/*
Crear un array con el contenido de la siguiente tabla:
ACCION  AVENTURA  DEPORTES
GTA     ASSASINS  FIFA
COD     CRASH     PES
BTF     PRINCE    MOTOGP
*/

function pintarArray($nombre, $arr){
    $resultado = "";
    for($i = 0; $i < count($arr); $i++){
       $resultado .= json_encode($arr[$nombre][$i]). "</br>";
    }
    return "<td>". $resultado . "</td>";
    
}

$arr = array(
    "Acción" => array("GTA", "COD", "BTF"),
    "Aventura" => array("Assasins", "Crash", "Prince"),
    "Deportes" => array("Fifa", "Pes", "MotoGp")
);

$indices = array_keys($arr);

?>

<table border="1">
    <tr>
        <?php
            foreach($indices as $indice){
                echo "<th>$indice</th>";
            }
        ?>
    </tr>
    <tr>
        <?php
            echo pintarArray("Acción", $arr);
            echo pintarArray("Aventura", $arr);
            echo pintarArray("Deportes", $arr);
        ?>
    </tr>
</table>