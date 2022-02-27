<?php
    session_start();

    // Variables
    include "../../basedatos.php";


    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM sanciones WHERE id = :id');

    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        "id" => $id
    ]);

    $_SESSION["mensajes"] = "Registro eliminado correctamente.";

    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
?>