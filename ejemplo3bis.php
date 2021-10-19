<?php 

	if (isset($_COOKIE['eleccion'])) {
		if ($_COOKIE['eleccion'] == "No me gusta la naranja" || $_COOKIE['eleccion'] == "No me gusta el limon") {
			echo "Compre Cola";
		}
		else {
			echo "Compre Fanta";
		}
	}else {
		echo "Compre Cola o Fanta";
	}

?>

