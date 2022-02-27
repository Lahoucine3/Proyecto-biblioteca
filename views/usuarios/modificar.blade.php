@extends('plantilla')
@section('content')

        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar registro</title>
</head>
<body>

<h1>Modificar Usuario</h1>

<form method="post">
    <p>
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="first_name" value="<?= $usuario['first_name'] ?>">
    </p>

    <p>
        <label for="apellido">Apellido</label>
        <input id="apellido" type="text" name="last_name" value="<?= $usuario['last_name'] ?>">
    </p>

    <p>
        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="<?= $usuario['email'] ?>">
    </p>

    <input type="text" name="id" value="<?= $usuario['id'] ?>" hidden>

    <p>
        <label for="tipo">Tipo de usuario:</label>
        <select name="tipo" class="form-control">
            <option value="">Seleccione tipo</option>
                <option value="{{ $usuario["tipo"] }}">Alumnado</option>
                <option value="{{ $usuario["tipo"] }}">Bibliotecario</option>
        </select>
    </p>



        <input type="submit" value="Modificar">
        <a href="index.php">Cancelar</a>
    </p>
</form>
</body>
</html>

@endsection