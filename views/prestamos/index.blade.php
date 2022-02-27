@extends('plantilla-admin')
@section("content")

        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prestamo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />

</head>
<body>

<div class="container">

    <h1>Préstamos</h1>

    <?php
    if (isset($_SESSION["mensajes"])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" aria-label="close">';
        echo $_SESSION["mensajes"];
        echo '</div>';

        unset($_SESSION["mensajes"]);
    }


    ?>

    <div class="d-flex justify-content-between mb-2">
        <form action="index.php" method="post">
            <div class="input-group">
                <input class="form-control" type="text" name="buscar">
                <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                <a class="btn btn-info btn-sm float-left" href="..\index.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
            </div>
        </form>

        <a class="btn btn-success btn-sm" href="nuevo.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear</a>


    </div>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Libro</th>
            <th>Usuario</th>
            <th>Fecha de préstamos</th>
            <th>Fecha de devolución</th>
            <th>Devolución</th>
            <th>Fecha de creación</th>
            <th>Fecha de modificación</th>
            <th>Dias restantes</th>
            <th colspan="2">Opciones</th>
        </tr>
        <?php foreach ($datos as $clave => $valor) { ?>
        <tr>
            <td><?= $valor['id_prestamo']; ?></td>
            <td><?= $valor['libro']; ?></td>
            <td><?= $valor['usuario']; ?></td>
            <td><?= $valor['fecha_prestamo']; ?></td>
            <td><?= $valor['fecha_devolucion']; ?></td>
            <td><i class='fa fa-circle {{ $valor['devolucion'] ? 'text-success': 'text-danger' }}'></i></td>
            <td><?= $valor['fecha_creacion']; ?></td>
            <td><?= $valor['fecha_modificacion']; ?></td>
            <td><?= $valor['fecha_dif']; ?></td>

            <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
            <td><a class="btn btn-primary btn-sm" href="modificar.php?id_prestamo=<?= $valor['id_prestamo'] ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" onClick="return confirm('¿ Desea borrar el libro ?')" href="borrar.php?id_prestamo=<?= $valor['id_prestamo'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>



</div>
</body>
</html>

@endsection
