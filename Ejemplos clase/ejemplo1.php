<?php

	session_start();

	if (!isset($_SESSION["Usuario"])) {
		$_SESSION['Usuario'] = "Carlos";
	} else {
		$_SESSION['Usuario'] = null;
	}

	switch ($_SESSION['Usuario']) {
		case 'Carlos':
			echo "El valor de la variable de sesión es Carlos.";
			break;
		
		default:
			echo "La variable de sesión no está definida";
			break;
	}

?>

