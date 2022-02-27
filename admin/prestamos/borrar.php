<?php
    session_start();

    // Variables
    include "../../basedatos.php";

    // Obtiene codigo del libro a borrar
    $id_prestamo = isset($_REQUEST['id_prestamo']) ? $_REQUEST['id_prestamo'] : null;

    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM prestamos WHERE id_prestamo = :id_prestamo');

    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        "id_prestamo" => $id_prestamo
    ]);

    $_SESSION["mensajes"] = "Registro eliminado correctamente.";

    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
?>