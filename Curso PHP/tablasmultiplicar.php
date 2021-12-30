<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
</head>
<body>
        <?php

            echo "<table border='1'>";

                echo "<tr>";
                    for($i=1; $i <= 10; $i++){
                        echo "<td>tabla del ". $i . "</td>";
                    }
                echo "</tr>";

                echo "<tr>";
                    for($i=1; $i <= 10; $i++){
                        echo "<td>";
                            for($j=1; $j<=10; $j++){
                                echo $i . "X" . $j . "=" . ($i*$j) . "<br>";
                            }
                        echo "</td>";
                    }
                echo "</tr>";

            echo "</table>";

        

           
        
        ?>
    
</body>
</html>