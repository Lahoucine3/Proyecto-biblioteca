@extends('plantilla-admin')
@section('content')



<div class="container">

    <h1>Administración de Libros</h1>

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

        <a class="btn btn-success btn-sm" href="nuevo.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear</a>

    </div>


    <table class="table table-striped table-bordered">
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Portada</th>
            <th>¿Disponible?</th>
            <th colspan="2">Opciones</th>
        </tr>
        <?php foreach ($datos as $clave => $valor) { ?>
        <tr>
            <td><?= $valor['codigo']; ?></td>
            <td><?= $valor['titulo']; ?></td>
            <td><?= $valor['autor']; ?></td>
            <td><img src="../../portadas/{{ $valor["portada"] }}" alt="imagen" style="width: 100px;"></td>
            <td><i class='fa fa-circle {{ $valor['disponible'] ? 'text-success': 'text-danger' }}'></i></td>

            <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
            <td><a class="btn btn-primary btn-sm" href="modificar.php?codigo=<?= $valor['codigo'] ?>">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
            </td>
            <td>
                <a class="btn btn-danger btn-sm" onClick="return confirm('¿ Desea borrar el libro ?')" href="borrar.php?codigo=<?= $valor['codigo'] ?>">
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