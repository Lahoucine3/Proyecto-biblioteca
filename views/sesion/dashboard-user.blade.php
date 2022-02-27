@extends('plantilla')

@section("dashboard-user")

<!DOCTYPE html>
<html>
<title>Administración</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
            onclick="w3_close()">Close &times;</button>
    <a href="../index.php" class="w3-bar-item w3-button">Inicio</a>
    <a href="#" class="w3-bar-item w3-button">Link 2</a>
    <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<div id="main">

    <div class="w3-teal">
        <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
            <h1>Panel de alumnado</h1>
            <a href="logout.php?logout=true">Cerrar sesión</a>
        </div>
    </div>



    <div class="container">

        <div class="border border-5">
            <h2>Datos de Usuario</h2>
            <p>Email: <?php echo ucfirst($_SESSION['email']); ?></p>
            <p>Nombre: <?php echo ucfirst($_SESSION['first_name']); ?></p>
            <p>Apellido: <?php echo ucfirst($_SESSION['last_name']); ?></p>
        </div>

        <div class="border border-4">
            <h2>Libros prestados</h2>
            <?php foreach ($datos as $clave => $valor){ ?>
            <div class="d-flex justify-content-between mb-3">
                <p>Libro: <?= $valor['libro']; ?></p>
                <p>Fecha de devolución: <?= $valor['fecha_devolucion']; ?></p>
                <p>Dias restantes: <?= $valor['fecha_dif']; ?></p>
                <a class="btn btn-primary btn-sm" href="devolver.php?id_prestamo=<?= $valor['id_prestamo'] ?>">Devolver</a>
                <button type="submit" name="devolver" class="btn btn-primary" onclick="location.href='devolver.php?id_prestamo=<?= $valor['id_prestamo'] ?>'">Devolver</button>
                </a>
            </div>
            <?php } ?>
        </div>



    </div>


</div>

<script>
    function w3_open() {
        document.getElementById("main").style.marginLeft = "25%";
        document.getElementById("mySidebar").style.width = "25%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
    }
</script>

</body>
</html>

@endsection