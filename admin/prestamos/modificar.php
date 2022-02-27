
<?php

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

include "../../basedatos.php";

// Leer parámetros del formulario
$id_prestamo = isset($_REQUEST['id_prestamo']) ? $_REQUEST['id_prestamo'] : null;
$libros = isset($_REQUEST['libro_id']) ? $_REQUEST['libro_id'] : null;
$usuarios = isset($_REQUEST['usuario_id']) ? $_REQUEST['usuario_id'] : null;
$devolucion = isset($_REQUEST['devolucion']) ? $_REQUEST['devolucion'] : null;
$fecha_devolucion = isset($_REQUEST['fecha_devolucion']) ? $_REQUEST['fecha_devolucion'] : null;


// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE prestamos SET libro_id = :libro_id, usuario_id = :usuario_id, devolucion = :devolucion, fecha_devolucion = :fecha_devolucion WHERE id_prestamo = :id_prestamo');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id_prestamo' => $id_prestamo,
            'libro_id' => $libros,
            'usuario_id' => $usuarios,
            'devolucion' => $devolucion,
            'fecha_devolucion' => $fecha_devolucion

        ]
    );

    if (strtotime($devolucion) > strtotime($fecha_devolucion)){
        echo "no devuelto sancion";
    }
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT prestamos.*, libros.titulo as libro, usuarios.first_name as usuario FROM prestamos LEFT JOIN libros ON prestamos.libro_id = libros.codigo LEFT JOIN usuarios ON prestamos.usuario_id = usuarios.id WHERE id_prestamo = :id_prestamo');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id_prestamo" => $id_prestamo
        ]
    );
}

// Obtiene un resultado
$prestamos = $miConsulta->fetch();

echo $blade -> run("prestamos.modificar", [
    "prestamos" => $prestamos
]);
//var_dump($prestamos);
?>