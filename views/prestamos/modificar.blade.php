@extends('plantilla-admin')
@section('content')

        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar registro</title>
</head>
<body>

<h1>Modificar Prestamo</h1>

<form method="post">
    <p>
        <label for="libro">Libro</label>
        <input id="libro" type="text" name="libro" value="<?= $prestamos['libro'] ?>">
    </p>
    <p>
        <label for="usuario">Usuario</label>
        <input id="usuario" type="text" name="usuario" value="<?= $prestamos['usuario'] ?>">
    </p>


    <p>
        <label for="fecha_devolucion">Fecha de devolución:</label><br>
        <input type="date" name="fecha_devolucion" min="2015-02-20" max="2045-04-24">

    </p>

    <p>
    <div>¿Devuelto?</div>

    <input id="si-disponible" type="radio" name="disponible" value="1"<?= $prestamos['devolucion'] ? ' checked' : '' ?>> <label for="si-devuelto">Si</label>
    <input id="no-disponible" type="radio" name="disponible" value="0"<?= !$prestamos['devolucion'] ? ' checked' : '' ?>> <label for="no-devuelto">No</label>
    </p>
    <p>


        <input type="submit" value="Modificar">
        <a href="index.php">Cancelar</a>
    </p>
</form>
</body>
</html>

@endsection
