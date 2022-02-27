<?php
    session_start();

    // Variables
    include "../../basedatos.php";

    // Obtiene codigo del libro a borrar
    $codigo = isset($_REQUEST['id_categoria']) ? $_REQUEST['id_categoria'] : null;

    // Prepara DELETE
    $miConsulta = $miPDO->prepare('DELETE FROM categorias WHERE id_categoria = :id_categoria');

    // Ejecuta la sentencia SQL
    $miConsulta->execute([
        "id_categoria" => $codigo
    ]);

    $_SESSION["mensajes"] = "Registro eliminado correctamente.";

    // Redireccionamos al PHP con todos los datos
    header('Location: index.php');
?>