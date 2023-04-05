<?php

$hostDB = '127.0.0.1';
$nombreDB = 'ejemplo';
$usuarioDB = 'root';

$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo']:null;
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo']:null;
$autor = isset($_REQUEST['autor']) ? $_REQUEST['autor']:null;
$disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible']:null;

//Conecta con base de datos
$hostPDO = "mysql:host=$hostDB; dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB);

//Comprobamo si recibimos datos por Post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $miUpdate = $miPDO->prepare('UPDATE libros SET titulo = :titulo, autor=:autor, disponible=:disponible where codigo= :codigo');
    $miUpdate->execute(
        [
            'codigo' => $codigo,
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible
        ]
    );
    header('Location: listar.php');
}else{
    $miConsulta = $miPDO->prepare('SELECT * FROM libros WHERE codigo = :codigo');
    $miConsulta->execute(
        [
            'codigo' => $codigo
        ]
    );
}

$libro = $miConsulta->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear - CRUD PHP</title>
</head>
<body>
    <form method="post">
        <p>
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" value="<?= $libro['titulo'] ?>">
        </p>
        <p>
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" value="<?= $libro['autor']?>">
        </p>
        <p>
            <div>¿Disponible?</div>
            <input id="si-disponible" type="radio" name="disponible" value="1" <?= $libro['disponible'] ? 'checked' : '' ?>> <label for="si-disponible">Si</label>
            <input id="no-disponible" type="radio" name="disponible" value="0" <?= !$libro['disponible'] ? 'checked' : '' ?>> <label for="no-disponible">No</label>
        </p>
        <p>
            <input type="hidden" name="codigo" value="<?= $codigo ?>">
            <input type="submit" value="Modificar">
        </p>
    </form>
</body>
</html>
