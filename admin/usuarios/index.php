<?php
    session_start();

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

    include "../../basedatos.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = isset($_REQUEST['buscar']) ? $_REQUEST['buscar'] : null;
        $miConsulta = $miPDO->prepare('SELECT * FROM usuarios WHERE first_name LIKE CONCAT("%", :first_name, "%")');
        $miConsulta->execute(['first_name' => $usuario]);
    } else {
        $miConsulta = $miPDO->prepare('SELECT * FROM usuarios;');
        $miConsulta->execute();
    }
$datos = $miConsulta -> fetchAll();




echo $blade -> run("usuarios.index", [
    "datos" => $datos
]);

?>


