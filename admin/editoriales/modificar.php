<?php

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

include "../../basedatos.php";

// Leer parámetros del formulario
$id_editorial = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;
$nombre = isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : null;


// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE editoriales SET nombre = :nombre WHERE id_editorial = :id_editorial');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_editorial' => $id_editorial,
            'nombre' => $nombre,
            
        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM editoriales WHERE id_editorial = :id_editorial;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id_editorial" => $id_editorial
        ]
    );
}

// Obtiene un resultado
$editoriales = $miConsulta->fetch();

echo $blade -> run("editoriales.modificar", [
    "editoriales" => $editoriales
]);
//var_dump($editoriales);
?>

