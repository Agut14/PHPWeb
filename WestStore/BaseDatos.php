<?php  
///////////////////////////////////////////////CONEXIÓN////////////////////////////////////////
	function crearConexion($database) {

		// Datos de conexión
		$host = "localhost";
		$user = "root";
		$password = "";

		// Establecemos la conexión con la base de datos
		$conexion = mysqli_connect($host, $user, $password, $database);

		// Si hay un error en la conexión, lo mostramos y detenemos.
		if (!$conexion) {
			die("<br>Error de conexión con la base de datos: " . mysqli_connect_error());
		}
		// Si está todo correcto, enviamos la conexión con la base de datos.
		
		return $conexion;
	}
//////////////////////////////////USUARIOS///////////////////////////////////////////////

//función para seleccionar los datos de los usuarios de la base de datos.
    function seleccionarUsuario($nombreUsuario){    
		// sentencia de conexión
        $DB = crearConexion("pac3_daw");
		//sentencia para obtener registros de la base de datos
        $sql = "SELECT Email, LastAccess, Enabled, UserID FROM user WHERE FullName ='".$nombreUsuario."'";
		//resultado de la conexión
        $result = mysqli_query($DB, $sql);

        if (mysqli_num_rows($result) > 0) {
			return $result;
		// Si no, enviamos un mensaje de error.
		} else {
			echo "No se encontró el nombre de usuario." . mysqli_error($DB);
		}
		mysqli_close($DB);

    }
//función para validar el usuario
    function validarUsuario($usuario, $email){
		$fecha = date('Y-m-d');
		$DB = crearConexion(("pac3_daw"));
		$sql = "UPDATE user SET LastAccess = '".$fecha."' WHERE FullName = '".$usuario."'";
		$result = mysqli_query($DB, $sql);
//obtenemos datos usuarios y los asignamos a la variable $usuarioSeleccionado
        $usuarioSeleccionado = seleccionarUsuario($usuario);
//Si devuelve String significa que no se han podido obtener los datos y recibimos el 
//mensaje de error de la función anterior.
		if(is_string($usuarioSeleccionado)){
			return $usuarioSeleccionado;
			
		}else{
//Si todo funciona correctamente y el email introducido corresponde al email del usuario
//lanzamos mensaje de bienvenida con enlace para acceder a la siguiente página. 
        while($fila = mysqli_fetch_assoc($usuarioSeleccionado)){
			if($fila["Email"] === $email){
					echo "<p class='col-12 text-center mt-2'>Bienvenido " . $usuario . ", pulsa  <a class='enlaceLogin' href='Acceso.php'> AQUÍ </a>  para continuar.</p>";
					setcookie("Usuario", $_POST["nombreUsuario"], time()+3600);
					session_start();
        			$_SESSION["Usuario"] = $usuario;
					return $result;	
			}else {
					echo "<p class='mensajeEntrada'>Email Incorrecto, vuelva a intentarlo</p>";
			}
		}
	}
//cerramos conexión cuando termina la consulta
	mysqli_close($DB);
}

//función para comprobar si los usuarios son Admin,SuperAdmin o Usuarios normales mediante cookies.
function tipoUsuario($usuario){

	$BD = crearConexion("pac3_daw");
	$sql = "SELECT SuperAdmin FROM setup";
	$result = mysqli_query($BD, $sql);
	$filaS = mysqli_fetch_assoc($result);

	$usuarioSeleccionado = seleccionarUsuario($usuario);
		if(is_string($usuarioSeleccionado)){
			return $usuarioSeleccionado;
			
		}else{	
			
        while($fila = mysqli_fetch_assoc($usuarioSeleccionado)){
			if($filaS["SuperAdmin"] === $fila["UserID"]) {
				setcookie("SuperAdmin", $fila["UserID"], time()+3600);
				if(isset($_COOKIE["Admin"])){
					unset ($_COOKIE ["Admin"]);
				}
			}else if ($fila["Enabled"] == 1) {
				if(isset($_COOKIE["SuperAdmin"]) && $filaS["SuperAdmin"] === $fila["UserID"]){
					setcookie("Admin", $fila["UserID"], time()+3600);
				}else if(!isset($_COOKIE["SuperAdmin"])){
					setcookie("Admin", $fila["UserID"], time()+3600);	
				}else {
					unset($_COOKIE["SuperAdmin"]);
					setcookie("Admin", $fila["UserID"], time()+3600);	
				}
			}else{
				if(isset($_COOKIE["SuperAdmin"]) && isset($_COOKIE["Admin"])){
					unset ($_COOKIE ["SuperAdmin"]);
					unset ($_COOKIE ["Admin"]);
				}else if(isset($_COOKIE["SuperAdmin"])){
					unset ($_COOKIE ["SuperAdmin"]);
					
				}else if(isset($_COOKIE["Admin"])){
					unset($_COOKIE["Admin"]);
				}
			}
		}
	}
}

////////////////////////////////////////ARTICULOS/////////////////////////////////////////

//función para obtener articulos de la base de datos ordenados por categoría con un limite por página.
function getArticulos($categoria, $limit, $porPagina){

	$DB = crearConexion("pac3_daw");
	$sql = "SELECT ProductID, product.Name as 'Name', Cost, Price, product.CategoryID, category.Name as 'Nombre' 
	FROM product INNER JOIN category ON product.CategoryID=category.CategoryID  ORDER BY $categoria LIMIT $limit, $porPagina";
	$result = mysqli_query($DB, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "No se encontraron articulos." . mysqli_error($DB);
	}
	mysqli_close($DB);
	
}

//función para pintar los articulos, ordenados por páginas, mediante enlaces.
function mostrarArticulosOrdenados(){
	//limite artículos por página
	$porPagina = 10;

	if(isset($_GET["pagina"])){
		$pagina = $_GET["pagina"];
	}else{
		$pagina = 1;
	}

	$empieza = ($pagina -1) * $porPagina;
	//ordenamos con el post de categoría, o con la cookie si hemos pasado de página.
	if(isset($_POST["categoria"])){
		$categoria = $_POST["categoria"];
		setcookie("categoria", $_POST["categoria"], time()+3600);
		//insertamos los datos en la variable $datos.
		$datos = getArticulos($categoria, $empieza, $porPagina);
	}else{
		if(isset($_COOKIE["categoria"])){
			$datos = getArticulos($_COOKIE["categoria"], $empieza, $porPagina);
		}else{
			$datos = getArticulos("ProductID", $empieza, $porPagina);
		}
	}
	//si no obtenemos datos, mostramos mensaje de error.
	if (is_string($datos)) {
		echo $datos;
	//si todo va bien pintamos los datos.	
	}else{
	//si la cookie superadmin está en marcha, añadimos dos elementos extra(para borrar o modificar artículos).	
	if(isset($_COOKIE["SuperAdmin"])){
		echo "<table class='table'>\n 
					<tr>\n
					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='ProductID' type='submit'>ID</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Name' type='submit'>Nombre</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Cost' type='submit'>Coste</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Price' type='submit'>Precio</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Nombre' type='submit'>Categoría</button></form></th>\n

						<th>Manejo</th>\n
					</tr>\n";

					while ($fila = mysqli_fetch_assoc($datos)) {
						echo "<tr>\n
								<td>" . $fila["ProductID"] . "</td>\n
								<td>" . $fila["Name"] . "</td>\n
								<td>" . $fila["Cost"] . "</td>\n
								<td>" . $fila["Price"] . "</td>\n
								<td>" . $fila["Nombre"] . "</td>\n
								<td><form action='formArticulos.php' method='POST'>
										<input type='hidden' name='id' value='" . $fila["ProductID"] .  "'> 
										<input class=' manejo' type='submit' name='borrar' value='Borrar'></form></td>\n

										<td><form action='formArticulos.php' method='POST'>
										<input type='hidden' name='id' value='" . $fila["ProductID"] .  "'> 
										<input class=' manejo' type='submit' name='modificar' value='Modificar'></form></td>\n
							</tr>";
								// Añado a cada fila un formulario con un elemento oculto y otro de submit que nos llevará a borrar o modificar.
								
					};
					echo"</table>";
	}else{
		echo "<table class='table'>\n 
					<tr>\n
					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='ProductID' type='submit'>ID</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Name' type='submit'>Nombre</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Cost' type='submit'>Coste</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Price' type='submit'>Precio</button></form></th>\n

					<th><form action='articulos.php' method='POST'> 
					<button name= 'categoria' value='Nombre' type='submit'>Categoría</button></form></th>\n
					</tr>\n";

					while ($fila = mysqli_fetch_assoc($datos)) {
						echo "<tr>\n
								<td>" . $fila["ProductID"] . "</td>\n
								<td>" . $fila["Name"] . "</td>\n
								<td>" . $fila["Cost"] . "</td>\n
								<td>" . $fila["Price"] . "</td>\n
								<td>" . $fila["Nombre"] . "</td>\n
							</tr>";
			}
			echo"</table>";
		}
		
	}
	//obtenemos todos los productos para obtener el número total.
	$sql = "SELECT * FROM product";
	$DB = crearConexion("pac3_daw");
	$result = mysqli_query($DB, $sql);

	$totalRegistros = mysqli_num_rows($result);
	$totalPaginas = ceil($totalRegistros/$porPagina);
	//enlaces para las diferentes páginas.
	echo"<div class='mt-3 text-center'>";
	echo "<a href='Articulos.php?pagina=1'>".'Primera'."<a/>\n";
	for($i=2; $i<$totalPaginas;$i++){
		echo "<a href='Articulos.php?pagina=".$i."'>".$i."<a/>\n";
	}

	echo "<a href='Articulos.php?pagina=".$totalPaginas."'>".'Última'."<a/>";
	echo"</div>";

}
//funcion para obtener las categorias.
function getListaCategorias() {
	$DB = crearConexion("pac3_daw");

	$sql = "SELECT Name, CategoryID FROM category";

	$result = mysqli_query($DB, $sql);


	if (mysqli_num_rows($result) > 0) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "No hay categorías.";
	}
	mysqli_close($DB);
}
//función para listar las categorias.
function listaCategorias() {
	$datos = getListaCategorias();
	// Si hemos recibido un menasje de error lo mostramos.
	if (is_string($datos)) {
		echo $datos;

	// Si hemos recibido datos, pintamos las categorías como options.
	} else {
		while ($fila = mysqli_fetch_assoc($datos)) {
			echo "<option value='" . $fila["CategoryID"] . "'>" . $fila["Name"] . "</option>";
		}
	}
}
//función para añadir articulos.
function anadirArticulo($ID, $nombre, $coste, $precio, $categoria) {
	$DB = crearConexion("pac3_daw");

	$sql = "INSERT INTO product (ProductID, Name, Cost, Price, CategoryID) 
			VALUES ('" . $ID . "', '" . $nombre . "', '" . $coste . "', '" . $precio . "', '". $categoria ."')";  

	$result = mysqli_query($DB, $sql);

	if ($result) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "Error al añadir producto." . mysqli_error($DB);
	}
	mysqli_close($DB);
}
//función para borrar articulos
function borrarArticulo($identificador){

		$DB = crearConexion("pac3_daw");
		$sql = "DELETE FROM product WHERE ProductID='" . $identificador . "'";
		$result = mysqli_query($DB, $sql);

		if ($result) {
			return $result;
		// Si no, enviamos un mensaje de error.
		} else {
			echo "No se ha podido borrar el articulo.";
		}
		mysqli_close($DB);
}
//función para modificar artículos.
function modificarArticulo($ID, $nombre, $coste, $precio, $categoria){
	$DB = crearConexion("pac3_daw");

	$sql = "UPDATE product SET ProductID= '$ID', Name= '$nombre',
	Cost= '$coste', Price= '$precio', CategoryID= '$categoria' WHERE ProductID= ' $ID ' ";
			  
	$result = mysqli_query($DB, $sql);

	if ($result) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "Error al modificar el producto." . mysqli_error($DB);
	}
	mysqli_close($DB);
}
//función para obtener datos, para luego manejarlos con otras funciones.
function getDatos($identificador, $tabla, $id){
	
	$DB = crearConexion("pac3_daw");
	$sql = "SELECT * FROM $tabla WHERE $id='" . $identificador . "'";
	$result = mysqli_query($DB, $sql);

	if ($result) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "No se ha podido borrar el articulo.";
	}
	mysqli_close($DB);
}
//función para pintar form con los datos del artículo que hemos seleccionado para borrar o modificar.
function manejoDatosArticulos($identificador, $accion){

		$datos = getDatos($identificador, "product", "ProductID");

		if (is_string($datos)) {
			echo $datos;
	
		// Si hemos recibido datos
		} else {
			
				while($fila = mysqli_fetch_assoc($datos)){
					echo "Se va a  $accion el siguiente artículo";
					echo"<form action='formArticulos.php' method='POST'>
					<label>ID: </label><input type='text' name='ID' value = '".$fila["ProductID"]. "'><br>
					<label>Nombre:</label><input type='text' name='Nombre' value = '".$fila["Name"]. "'><br>
					<label>Coste: <input type='number' name='Coste' value = '".$fila["Cost"]. "'><br>
					<label>Precio:  </label><input type='number' name='Precio' value = '".$fila["Price"]. "'><br>
					<label>Categoría: </label>
					<select name='Categoria'>";
					echo "
						'".
							listaCategorias()
						."'		
					 </select><br>
					<br>
					<input type='submit' name='".$accion."' value='".$accion."'>
					</form>";
		}	
	}
}
///////////////////////////////USUARIOS//////////////////////////////

//función para obtener usuarios.
function getUsuarios($categoria){

	$DB = crearConexion("pac3_daw");
	$sql = "SELECT UserID, FullName, Email, LastAccess, Enabled FROM user ORDER BY $categoria";
	$result = mysqli_query($DB, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "No se encontraron usuarios." . mysqli_error($DB);
	}
	mysqli_close($DB);
	
}
//función para pintar los usuarios.
function mostrarUsuarios(){
	if(isset($_GET["categoria"])){
		$categoria = $_GET["categoria"];
		$datos = getUsuarios($categoria);
	}else{
		$datos = getUsuarios("UserID");
	}
//si ha habido algún error en la función de getUsuarios, nos lo muestra.
	if (is_string($datos)) {
		echo $datos;
	}else{

	if(isset($_COOKIE["SuperAdmin"])){
		echo "<table>\n 
					<tr>\n
					<th><form action='Usuarios.php' method='GET'> 
					<button name= 'categoria' value='UserID' type='submit'>ID de Usuario</button></form></th>\n

					<th><form action='Usuarios.php' method='GET'> 
					<button name= 'categoria' value='FullName' type='submit'>Nombre</button></form></th>\n

					<th><form action='Usuarios.php' method='GET'> 
					<button name= 'categoria' value='Email' type='submit'>Email</button></form></th>\n

					<th><form action='Usuarios.php' method='GET'> 
					<button name= 'categoria' value='LastAccess' type='submit'>Último Acceso</button></form></th>\n

					<th><form action='Usuarios.php' method='GET'> 
					<button name= 'categoria' value='Enabled' type='submit'>Habilitado</button></form></th>\n

						<th>Manejo</th>\n
					</tr>\n";

					while ($fila = mysqli_fetch_assoc($datos)) {
						
						//comprobamos quien es el superadmin,no le mostramos los botones de manejo y lo pintamos en rojo.
						if($fila["UserID"]== $_COOKIE["SuperAdmin"]){
							echo "<tr style='color: Red;'>\n
								<td>" . $fila["UserID"] . "</td>\n
								<td>" . $fila["FullName"] . "</td>\n
								<td>" . $fila["Email"] . "</td>\n
								<td>" . date('d/m/y', strtotime($fila["LastAccess"])) . "</td>\n
								<td>" . $fila["Enabled"] . "</td>\n
							</tr>";
						}else{
							echo "<tr>\n
								<td>" . $fila["UserID"] . "</td>\n
								<td>" . $fila["FullName"] . "</td>\n
								<td>" . $fila["Email"] . "</td>\n
								<td>" . date('d/m/y', strtotime($fila["LastAccess"])) . "</td>\n
								<td>" . $fila["Enabled"] . "</td>\n
								<td><form action='formUsuarios.php' method='POST'>
										<input type='hidden' name='id' value='" . $fila["UserID"] .  "'> 
										<input class='manejo' type='submit' name='borrar' value='Borrar'></form></td>\n

										<td><form action='formUsuarios.php' method='POST'>
										<input type='hidden' name='id' value='" . $fila["UserID"] .  "'> 
										<input class='manejo' type='submit' name='modificar' value='Modificar'></form></td>\n
							</tr>";
						}	
								// Añado a cada fila un formulario con un elemento oculto y otro de submit que no llevará a borrar o modificar.
					};
					echo"</table>";
		}
	}
}

//función para añadir un usuario nuevo.
function anadirUsuario($ID, $nombre, $email, $acceso, $enabled) {
	$DB = crearConexion("pac3_daw");

	$sql = "INSERT INTO user (UserID, FullName, Email, LastAccess, Enabled) 
			VALUES ('" . $ID . "', '" . $nombre . "', '" . $email . "', '" . $acceso . "', '". $enabled ."')";  
			// Mucho cuidado con las comillas que abren y cierran.

	$result = mysqli_query($DB, $sql);

	if ($result) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "Error al añadir usuario." . mysqli_error($DB);
	}
	mysqli_close($DB);
}

//función para pintar los forms de modificar o borrar usuarios, se hace uso de la función getDatos.
function manejoDatosUsuarios($identificador, $accion){

	$datos = getDatos($identificador, "user", "UserID");

	if (is_string($datos)) {
		echo $datos;

	// Si hemos recibido datos
	} else if($datos) {
			while($fila = mysqli_fetch_assoc($datos)){
				echo "Se va a  $accion el siguiente usuario";
				echo"<form action='formUsuarios.php' method='POST'>
				<label>ID: </label><input type='text' name='ID' value = '".$fila["UserID"]. "'><br>
				<label>Nombre:</label><input type='text' name='Nombre' value = '".$fila["FullName"]. "'><br>
				<label>Email: <input type='text' name='Email' value = '".$fila["Email"]. "'><br>
				<label>Último acceso:  </label><input type='date' name='LastAccess' value = '".$fila["LastAccess"]. "'><br>
				<label>Enabled: </label>
					<select name='Enabled'>;
						<option value='1'>Si</option>
						<option value='0'>No</option>
					</select><br>
					<br>
				<input type='submit' name='".$accion."' value='".$accion."'>
				</form>";
	}	
}
}

//función para borrar usuarios.
function borrarUsuario($identificador){

	$DB = crearConexion("pac3_daw");
	$sql = "DELETE FROM user WHERE UserID='" . $identificador . "'";
	$result = mysqli_query($DB, $sql);

	if ($result) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "No se ha podido borrar el usuario.";
	}
	mysqli_close($DB);
}

//función para modificar usuario.
function modificarUsuario($ID, $nombre, $email, $acceso, $enabled){
	$DB = crearConexion("pac3_daw");

	$sql = "UPDATE user SET UserID= '$ID', FullName= '$nombre',
	Email= '$email', LastAccess= '$acceso', Enabled= '$enabled' WHERE UserID= ' $ID ' ";
			  
			// Mucho cuidado con las comillas que abren y cierran.
	$result = mysqli_query($DB, $sql);

	if ($result) {
		return $result;
	// Si no, enviamos un mensaje de error.
	} else {
		echo "Error al modificar el usuario." . mysqli_error($DB);
	}
	mysqli_close($DB);
}

?>

