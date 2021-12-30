<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario Usuarios</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php
/////AÑADIR ARTÍCULO/////
    include "BaseDatos.php";  
	
	if(isset($_POST["Borrar"])){
		if(borrarUsuario($_POST["ID"])){
			echo "Usuario borrado con exito";
		
		}else {
			echo "No se ha podido borrar el usuario";
		}
	
	}else if (isset($_POST["Añadir"])){
		if(isset($_POST["ID"])){
		$ID = $_POST["ID"];
		$nombre = $_POST["Nombre"];
		$email = $_POST["Email"];
		$lastAccess = $_POST["LastAccess"];
		$enabled = $_POST["Enabled"];
		if(anadirUsuario($ID, $nombre, $email, $lastAccess, $enabled)){
			echo "Usuario añadido correctamente";
		}else {
			echo "No se ha podido añadir el usuario";
		}
		}
	}else if(isset($_POST["Modificar"])){
		if(isset($_POST["ID"])){
            $ID = $_POST["ID"];
            $nombre = $_POST["Nombre"];
            $email = $_POST["Email"];
            $lastAccess = $_POST["LastAccess"];
            $enabled = $_POST["Enabled"];
            if(modificarUsuario($ID, $nombre, $email, $lastAccess, $enabled)){
                echo "Usuario modificado correctamente";
            }else {
                echo "No se ha podido modificar el usuario";
            }
            }
	}else if(isset($_POST["añadir"])){
		echo "Se va a Añadir un usuario nuevo.";
		echo"<form action='formUsuarios.php' method='POST'>
		<label>ID: </label><input type='text' name='ID'><br>
		<label>Nombre:</label><input type='text' name='Nombre'><br>
		<label>Email: <input type='text' name='Email'><br>
		<label>Último Acceso:  </label><input type='date' name='LastAccess'><br>
		<label>Enabled: </label>
		<select name='Enabled'>;
			<option value='1'>Si</option>
			<option value='0'>No</option>
		 </select><br>
		<br>
		<input type='submit' name='Añadir' value='Añadir'>
		</form>";
			
	}else if(isset($_POST["modificar"]) && isset($_POST["id"])){ 
			manejoDatosUsuarios($_POST["id"], "Modificar");

	}else if(isset($_POST["borrar"]) && isset($_POST["id"])){
			manejoDatosUsuarios($_POST["id"], "Borrar");
			
	}
?>

				


<a href="Usuarios.php">Volver</a>

    
</body>
</html>


