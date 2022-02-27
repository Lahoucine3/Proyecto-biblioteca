<?php
    session_start();

    // Variables
    include "../../basedatos.php";

    // Obtiene codigo del libro a borrar
    $codigo = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM usuarios WHERE id = :id');

    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        "id" => $codigo
    ]);

    $_SESSION["mensajes"] = "Registro eliminado correctamente.";

    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
?>