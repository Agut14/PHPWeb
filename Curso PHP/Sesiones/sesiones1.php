
<form action="sesiones1.php" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name='nombre' placeholder="Introduce tu nombre...">

    <input type="submit" value="Enviar">
</form>

<a href="logOut.php">Cerrar Sesión</a>


<?php 
//creo la sesión
if(isset($_POST['nombre'])){
    session_start();
    $_SESSION['VariableSesion'] = "Variable asignada a la sesión activa";
}


//variable de sesión


if(isset($_SESSION['VariableSesion'])){
    echo $_SESSION['VariableSesion'];
}




?>
</br>

