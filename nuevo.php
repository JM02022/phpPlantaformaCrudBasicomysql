<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo']:null;
    $autor = isset($_REQUEST['autor']) ? $_REQUEST['autor']:null;
    $disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible']:null;
    $hostDB = '127.0.0.1';
    $nombreDB = 'ejemplo';
    $usuarioDB = 'root';
    $contrasenyaDB = '';
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    $miInsert = $miPDO->prepare('INSERT INTO libros (titulo, autor,disponible) values (:titulo,:autor,:disponible)');
    $miInsert -> execute(
        array(
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible
        )
        );
    header('Location:listar.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear -CRUD PHP</title>
    <style>
		.button{
			border-radius: .5rem;
			color:white;
			background-color: orange;
			padding: 0.7rem;
			text-decoration:none;
        }
	</style>
</head>
<body>
    <div class="contenedor">
    <form action="" method="post">
        <p>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo">
        </p>
        <p>
            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor">
        </p>
        <p>
            <div>¿Disponible?</div>
            <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
            <input id="no-disponible" type="radio" name="disponible" value="0" checked> <label for="ni-disponible">No</label>
        </p>
        <p>
            <input class="button" type="submit" value="Guardar">
        </p>
    </form>
    </div> 
</body>
</html>
