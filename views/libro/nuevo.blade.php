@extends('plantilla')
@section('content')

        <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />

</head>
<body>

<div class="container">

    <h1>Añadir libro</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <p>
            <label for="titulo">Titulo</label>
            <input class="form-control" id="titulo" type="text" name="titulo">
        </p>
        <p>
            <label for="autor">Autor</label>
            <input class="form-control" id="autor" type="text" name="autor">
        </p>
        <p>
        <label for="portada">Insertar portada</label>
        <input class="form-control" id="portada" type="file" name="portada">
        </p>
        <p>
        <div>¿Disponible?</div>

        <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
        <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
        </p>
        <p>
            <input class="btn btn-primary btn-sm" type="submit" value="Guardar">
            <a class="btn btn-secondary btn-sm" href="index.php">Cancelar</a>
        </p>
    </form>
</div>
</body>
</html>
@endsection