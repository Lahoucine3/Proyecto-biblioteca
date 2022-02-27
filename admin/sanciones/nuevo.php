
<?php
session_start();

include "../../basedatos.php";

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
    $id_usuario = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;
    $motivo = isset($_REQUEST['motivo']) ? $_REQUEST['motivo'] : null;


//print_r ($_REQUEST);
//xit;
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO sanciones (id_usuario, motivo,fecha_fin) 
                                VALUES (:id_usuario, :motivo, TIMESTAMPADD(DAY, 5, fecha_inicio) as dias)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
 [

            'usuario' => $id_usuario,
            'motivo'=> $motivo

        ]
    );



    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    // Redireccionamos a Leer
    header('Location: index.php');
}


$stmt = $miPDO-> prepare("Select * from usuarios;");
$stmt->execute();
$usuarios = $stmt->fetchAll();



echo $blade -> run("sanciones.nuevo", [
    "usuarios" => $usuarios
    ]);

?>