<?php
    session_start();

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

    include "../../basedatos.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
        $miConsulta = $miPDO->prepare('SELECT * FROM categorias WHERE nombre LIKE CONCAT("%", :nombre, "%")');
        $miConsulta->execute(['nombre' => $titulo]);
    } else {
        $miConsulta = $miPDO->prepare('SELECT * FROM categorias;');
        $miConsulta->execute();
    }
$datos = $miConsulta -> fetchAll();
echo $blade -> run("categoria.index", [
    "datos" => $datos
]);
?>

