@extends('plantilla')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar registro</title>
</head>
<body>

<h1>Modificar Editorial</h1>

<form method="post">
    <p>
        <label for="nombre">Editorial</label>
        <input id="nombre" type="text" name="nombre" value="<?= $editoriales['nombre'] ?>">
    </p>

    <p>
        <input type="hidden" name="codigo" value="<?= $codigo ?>">
        <input type="submit" value="Modificar">
        <a href="index.php">Cancelar</a>
    </p>
</form>
</body>
</html>
@endsection