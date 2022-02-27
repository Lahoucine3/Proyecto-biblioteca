<?php

session_start();

require "vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

include "basedatos.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
    $miConsulta = $miPDO->prepare('SELECT * FROM libros WHERE titulo LIKE CONCAT("%", :titulo, "%")');
    $miConsulta->execute(['titulo' => $titulo]);
} else {
    $miConsulta = $miPDO->prepare('SELECT * FROM libros;');
    $miConsulta->execute();
}
$datos = $miConsulta->fetchAll();

echo $blade -> run("index", [
    "datos" => $datos
]);

?>

