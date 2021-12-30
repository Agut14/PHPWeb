<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="container-fluid">
        
            <h1 class="text-center" id="loginTitle">West Store</h1>

            <div class="row w-auto h-auto justify-content-center align-items-center">
                <form class="card border-primary" action="Index.php" method="POST" id="login">
                <div class="col-xs-5 col-sm-12 col-md-4 col-lg-5">
                    <label>Usuario:</label><input type="text" name="nombreUsuario">
                </div>
                <div class="col-xs-5 col-sm-4 col-md-4 col-lg-5">
                    <label>Email:</label><input type="mail" name="email">
                </div>
                <div class="col-xs-2 col-sm-4 col-md-4 col-lg-2">
                    <input class="mt-2 mb-2 btn btn-default" type="submit" name="acceder" value="Acceder">
                </div>

                </form>

                <?php

                include "BaseDatos.php";



            //Si se ha rellenado el formulario, comprobamos que el usuario sea correcto mediante la función validarUsuario.
            if (isset($_POST["nombreUsuario"]) && isset($_POST["acceder"]) ) {
                    validarUsuario($_POST["nombreUsuario"], $_POST["email"]);
                    
                }

            if (isset($_COOKIE["Usuario"])){
                tipoUsuario($_COOKIE["Usuario"]);
            }    


                ?>
            </div>
    </div>
    
</body>
</html>