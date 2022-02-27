
<?php
session_start();

include "../../basedatos.php";

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);


// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Recogemos variables
    $libros = isset($_REQUEST['libro']) ? $_REQUEST['libro'] : null;
    $usuarios = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
    $fecha_devolucion = isset($_REQUEST['fecha_devolucion']) ? $_REQUEST['fecha_devolucion'] : null;

//print_r ($_REQUEST);
//xit;
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO prestamos (libro_id, usuario_id,fecha_devolucion) 
                                VALUES (:libro, :usuario, :fecha_devolucion)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
 [
            'libro' => $libros,
            'usuario' => $usuarios,
            //'fecha_prestamo'=>null,
            'fecha_devolucion'=> $fecha_devolucion

        ]
    );



    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    // Redireccionamos a Leer
    header('Location: index.php');
}

$stmt = $miPDO-> prepare("Select * from libros;");
$stmt->execute();
$libros = $stmt->fetchAll();

$stmt = $miPDO-> prepare("Select * from usuarios;");
$stmt->execute();
$usuarios = $stmt->fetchAll();



echo $blade -> run("prestamos.nuevo", [
    "usuarios" => $usuarios,
    "libros" => $libros
    ]);

?>