<?php
include "../../basedatos.php";

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

// Leer parámetros del formulario
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
$autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
$portada = isset($_REQUEST['portada']) ? $_REQUEST['portada'] : null;
$disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE libros SET titulo = :titulo, autor = :autor, disponible = :disponible WHERE codigo = :codigo');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'codigo' => $codigo,
            'titulo' => $titulo,
            'autor' => $autor,
            'portada' => $portada,
            'disponible' => $disponible
        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM libros WHERE codigo = :codigo;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "codigo" => $codigo
        ]
    );
}

// Obtiene un resultado
$libro = $miConsulta->fetch();

echo $blade -> run("libro.modificar", [
    "libro" => $libro
]);

?>
