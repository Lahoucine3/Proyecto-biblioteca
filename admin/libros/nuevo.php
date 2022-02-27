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
    $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
    $autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
    $disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;
    $portada = isset($_REQUEST['portada']) ? $_REQUEST['portada'] : null;



    $portada = $_FILES['portada']['name'];
    $formato = $_FILES['portada']['type'];
    $tamano = $_FILES['portada']['size'];

    if (!empty($portada) && ($_FILES['portada']['size'] <= 200000000)) {
        if (($_FILES["portada"]["type"] == "imagenes/gif")
            || ($_FILES["portada"]["type"] == "image/jpeg")
            || ($_FILES["portada"]["type"] == "image/jpg")
            || ($_FILES["portada"]["type"] == "image/png"))
        {
            $directorio = '../../portadas/';
            move_uploaded_file($_FILES['portada']['tmp_name'],$directorio.$portada);
        }
        else
        {
            echo "No se puede subir una portada con ese formato ";
        }
    } else {
        if($portada == !NULL) echo "La portada es demasiado grande ";
    }


    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO libros (titulo, autor, disponible,portada) VALUES (:titulo, :autor, :disponible, :portada)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible,
            'portada' => $portada
        )
    );


    $_SESSION["mensajes"] = "Registro añadido correctamente.";

    // Redireccionamos a Leer
    header('Location: index.php');
}




echo $blade -> run("libro.nuevo");

?>

