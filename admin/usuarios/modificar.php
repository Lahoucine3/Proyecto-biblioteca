<?php
include "../../basedatos.php";

require "../../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../../views';
$cache = '../../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

// Leer parámetros del formulario
$codigo = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$nombre = isset($_REQUEST['first_name']) ? $_REQUEST['first_name'] : null;
$apellido = isset($_REQUEST['last_name']) ? $_REQUEST['last_name'] : null;
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$tipo = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : null;

// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE usuarios SET first_name = :first_name, last_name = :last_name, email = :email, tipo = :tipo WHERE id = :id');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'id' => $codigo,
            'first_name' => $nombre,
            'last_name' => $apellido,
            'email' => $email,
            'tipo' => $tipo
        ]
    );
    // Redireccionamos a Leer
    header('Location: index.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM usuarios WHERE id = :id;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
            "id" => $codigo
        ]
    );
}

// Obtiene un resultado
$usuario = $miConsulta->fetch();

echo $blade -> run("usuarios.modificar", [
    "usuario" => $usuario
]);

?>
