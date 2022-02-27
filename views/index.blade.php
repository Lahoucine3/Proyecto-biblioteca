@extends('plantilla')
@section('catalogo')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilos.css">
    <script src="https://kit.fontawesome.com/fe280c8931.js" crossorigin="anonymous"></script>
    <title>Biblioteca</title>
</head>
<body>



<div>
    <div>
        <h3>Catálogo</h3>
        <div class="d-flex justify-content-between mb-4">
            <form action="index.php" method="post">
                <div class="input-group">
                    <input class="form-control" type="text" name="buscar">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>


        </div>
        <div class="d-flex justify-content-evenly" >

            <?php foreach($datos as $clave => $valor): ?>
            <div class="card" style="width: 25rem; margin-right: 60px;">
                <img src="portadas/{{ $valor["portada"] }}" alt="imagen" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title "><?=$valor["titulo"]?></h5>
                    <p class="card-text ">Autor: <?=$valor["autor"]?><br></p>
                    <p class="card-text">Disponible: <?=$valor["disponible"] ? 'Si' : 'No';?><br></p>
                    <a href="#" class="btn btn-primary">Solicitar</a>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>

</div>


</body>
</html>
@endsection