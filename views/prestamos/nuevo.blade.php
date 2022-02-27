@extends('plantilla-admin')
@section('content')

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

    <h1>Gestión de préstamo</h1>

    <form action="" method="post" enctype="multipart/form-data">


        <p>
            <label for="titulo">Usuario:</label>
            <select name="usuario" class="form-control">
                <option value="">Seleccione usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario["id"] }}">{{ $usuario["first_name"] }}</option>
                @endforeach
            </select>
        </p>

        <p>
            <label for="titulo">Libro:</label>
            <select name="libro" class="form-control">
                <option value="">Seleccione libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro["codigo"] }}">{{ $libro["titulo"] }}</option>
                @endforeach
            </select>
        </p>



        <p>
            <label for="fecha_devolucion">Fecha de devolución:</label><br>
            <input type="date" name="fecha_devolucion" min="2015-02-20" max="2045-04-24">

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