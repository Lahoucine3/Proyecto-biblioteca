@extends('plantilla-admin')

@section("dashboard-admin")

        <!DOCTYPE html>
<html>
<title>Administración</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
            onclick="w3_close()">Cerrar &times;</button>
    <a href="../index.php" class="w3-bar-item w3-button">Inicio</a>
    <a href="#" class="w3-bar-item w3-button">Link 2</a>
    <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<div id="main">

    <div class="w3-teal">
        <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
            <h1>Panel de administración</h1>
            <a href="logout.php?logout=true">Cerrar sesión</a>
        </div>
    </div>



    <div class="container">

        <h1>Gestión</h1>


        <ul>
            <li><a href="../admin/libros/index.php">Libros</a></li>
            <li><a href="../admin/categorias/index.php">Categorias</a></li>
            <li><a href="../admin/editoriales/index.php">Editoriales</a></li>
            <li><a href="../admin/prestamos/index.php">Prestamos</a></li>
            <li><a href="../admin/usuarios/index.php">Usuarios</a></li>
            <li><a href="../admin/sanciones/index.php">Sanciones</a></li>
        </ul>
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