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

<div class="pos-f-t">

    <nav class="navbar navbar-light bg-light">
        <div class="logo-box">
            <img  style="height: 5rem;" src="../imagenes/logo.webp" alt="Logo" class="logo">
        </div>


        <h1>Biblioteca del Sur</h1>
        <div>
            <?php if (isset($_SESSION["first_name"])){
                echo "Usuario:" . $_SESSION["first_name"]. "<br>";
                echo "<a href='../../sesion/logout.php?logout=true'>Cerrar sesión</a>";
            }else{
                echo "<button type=\"button\" class=\"btn btn-secondary\" onclick=\"location.href='sesion/login.php'\">Iniciar sesión</button>";

            } ?>
        </div>
    </nav>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="../../index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="../libros/index.php">Libros</a>
            <a class="nav-item nav-link" href="../categorias/index.php">Categorias</a>
            <a class="nav-item nav-link" href="../editoriales/index.php">Editoriales</a>
            <a class="nav-item nav-link" href="../prestamos/index.php">Prestamos</a>
            <a class="nav-item nav-link" href="../usuarios/index.php">Usuarios</a>
            <a class="nav-item nav-link" href="../sanciones/index.php">Sanciones</a>
            <a class="nav-item nav-link " href="../../sesion/dashboard-admin.php">Panel de control</a>
        </div>
    </div>
</nav>

@yield('dashboard-admin')

<div class="container">
    @yield('content')
</div>



</body>

<footer style="margin-top: 40px; text-align: center">
    <p>Lahoucine Chekrad Chakrad 2021-2022 ©</p>
</footer>

</html>