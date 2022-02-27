@extends('plantilla-admin')
@section('content')



<div class="container">

    <h1>Administración de Usuarios</h1>

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
                <a class="btn btn-info btn-sm float-left" href="..\..\index.php"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
            </div>
        </form>



    </div>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Fecha de creación</th>
            <th>Fecha de modificación</th>
            <th colspan="2">Opciones</th>
        </tr>
        <?php foreach ($datos as $clave => $valor) { ?>
        <tr>
            <td><?= $valor['id']; ?></td>
            <td><?= $valor['first_name']; ?></td>
            <td><?= $valor['last_name']; ?></td>
            <td><?= $valor['email']; ?></td>
            <td><?= $valor['tipo']; ?></td>
            <td><?= $valor['created_at']; ?></td>
            <td><?= $valor['updated_at']; ?></td>


            <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
            <td><a class="btn btn-primary btn-sm" href="modificar.php?id=<?= $valor['id'] ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" onClick="return confirm('¿ Desea borrar el libro ?')" href="borrar.php?id=<?= $valor['id'] ?>">
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