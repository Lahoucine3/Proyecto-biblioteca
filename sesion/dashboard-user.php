<?php

session_start();

require "../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../views';
$cache = '../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

include "../basedatos.php";

if(!$_SESSION['id']){
    header('location:login.php');
}

$usuarios = $_SESSION['id'];

$miConsulta = $miPDO->prepare('SELECT prestamos.*, libros.titulo as libro, usuarios.id as usuarios, TIMESTAMPDIFF(day, CURRENT_TIMESTAMP , fecha_devolucion) as fecha_dif FROM prestamos LEFT JOIN libros ON prestamos.libro_id = libros.codigo LEFT JOIN usuarios ON prestamos.usuario_id = usuarios.id WHERE usuario_id = :usuario;');
//$miConsulta = $miPDO->prepare('SELECT * FROM prestamos WHERE usuario_id = :usuario;');
$miConsulta->execute( ['usuario' => $usuarios]);

$datos = $miConsulta -> fetchAll();

echo $blade->run ("sesion.dashboard-user", [
    "datos" => $datos
]);

?>





