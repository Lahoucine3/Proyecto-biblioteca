<?php
    session_start();

    // Variables
    include "../../basedatos.php";

    // Obtiene codigo del libro a borrar
    $codigo = isset($_REQUEST['id_editorial']) ? $_REQUEST['id_editorial'] : null;

    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM editoriales WHERE id_editorial = :id_editorial');

    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        "id_editorial" => $codigo
    ]);

    $_SESSION["mensajes"] = "Registro eliminado correctamente.";

    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
?>