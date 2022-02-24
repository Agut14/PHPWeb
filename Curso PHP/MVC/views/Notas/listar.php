<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    <h2><?=$nota->getNombre();?></h2>
    <h2><?=$nota->getContenido();?></h2>
    <h1>Listado de notas</h1>
    <?php while($nota1 = $notas->fetch_object()):?>
    <?= $nota1->titulo;?> - <?= $nota1->fecha;?>
    <?php endwhile; ?>
</body>
</html>