
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
    $miConsulta = $miPDO->prepare('SELECT prestamos.*, libros.titulo as libro, usuarios.first_name as usuario, TIMESTAMPDIFF(day, CURRENT_TIMESTAMP , fecha_devolucion) as fecha_dif FROM prestamos LEFT JOIN libros ON prestamos.libro_id = libros.codigo LEFT JOIN  LEFT JOIN usuarios ON prestamos.usuario_id = usuarios.id WHERE usuario LIKE CONCAT("%", :usuario, "%")');
    $miConsulta->execute(['first_name' => $usuario]);
} else {
    $miConsulta = $miPDO->prepare('SELECT prestamos.*, libros.titulo as libro, usuarios.first_name as usuario, TIMESTAMPDIFF(day, CURRENT_TIMESTAMP , fecha_devolucion) as fecha_dif FROM prestamos LEFT JOIN libros ON prestamos.libro_id = libros.codigo LEFT JOIN usuarios ON prestamos.usuario_id = usuarios.id');
    $miConsulta->execute();
}
$datos = $miConsulta -> fetchAll();


echo $blade -> run("prestamos.index", [
    "datos" => $datos
]);


?>