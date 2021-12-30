<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulario Artículos</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<?php
/////AÑADIR ARTÍCULO/////
    include "BaseDatos.php";  

	

	if(isset($_POST["Borrar"])){
		if(borrarArticulo($_POST["ID"])){
			echo "Articulo borrado con exito";
		
		}else {
			echo "No se ha podido borrar el articulo";
		}
	
	}else if (isset($_POST["Añadir"])){
		if(isset($_POST["ID"])){
		$ID = $_POST["ID"];
		$nombre = $_POST["Nombre"];
		$coste = $_POST["Coste"];
		$precio = $_POST["Precio"];
		$categoria = $_POST["Categoria"];
		if(anadirArticulo($ID, $nombre, $coste, $precio, $categoria)){
			echo "Artículo añadido correctamente";
		}else {
			echo "No se ha podido añadir el artículo";
		}
		}
	}else if(isset($_POST["Modificar"])){
		if(isset($_POST["ID"])){
			$ID = $_POST["ID"];
			$nombre = $_POST["Nombre"];
			$coste = $_POST["Coste"];
			$precio = $_POST["Precio"];
			$categoria = $_POST["Categoria"];
			if(modificarArticulo($ID, $nombre, $coste, $precio, $categoria)){
				echo "Artículo modificado correctamente";
			}else {
				echo "No se ha podido modificar el artículo";
			}
			}

	}else if(isset($_POST["añadir"])){
		echo "Se va a Añadir un articulo nuevo.";
		echo"<form action='formArticulos.php' method='POST'>
		<label>ID: </label><input type='text' name='ID'><br>
		<label>Nombre:</label><input type='text' name='Nombre'><br>
		<label>Coste: <input type='number' name='Coste'><br>
		<label>Precio:  </label><input type='number' name='Precio'><br>
		<label>Categoría: </label>
		<select name='Categoria'>";
		echo "
			'".
				listaCategorias()
			."'		
		 </select><br>
		<br>
		<input type='submit' name='Añadir' value='Añadir'>
		</form>";
			
	}else if(isset($_POST["modificar"]) && isset($_POST["id"])){ 
			manejoDatosArticulos($_POST["id"], "Modificar");

	}else if(isset($_POST["borrar"]) && isset($_POST["id"])){
			manejoDatosArticulos($_POST["id"], "Borrar");
			
	}
?>

				


<a href="Articulos.php">Volver</a>

    
</body>
</html>

