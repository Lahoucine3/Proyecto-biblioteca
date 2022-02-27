<!doctype html>

<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fe280c8931.js" crossorigin="anonymous"></script>


</head>

<body class="bg-light">

<div class="pos-f-t">

    <nav class="navbar navbar-light bg-light">
        <div class="logo-box">
            <img  style="height: 5rem;" src="imagenes/logo.webp" alt="Logo" class="logo">
        </div>


        <h1>Biblioteca del Sur</h1>
        <div>
            <?php if (isset($_SESSION["first_name"])){
                echo "Usuario:" . $_SESSION["first_name"]. "<br>";
                echo "<a href=\"sesion/logout.php?logout=true\">Cerrar sesión</a>";
            }else{
                echo "<button type=\"button\" class=\"btn btn-secondary\" onclick=\"location.href='sesion/login.php'\">Iniciar sesión</button>";

            } ?>
        </div>
    </nav>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MENU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="sesion/dashboard-admin.php">Administración</a>
                <a class="nav-link" href="sesion/dashboard-user.php">Panel de usuario</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </div>
        </div>
    </div>
</nav>

@yield('dashboard-user')

<div class="container">
    @yield('content')
    @yield('catalogo')
</div>



</body>

<footer style="margin-top: 40px; text-align: center">
    <p>Lahoucine Chekrad Chakrad 2021-2022 ©</p>
</footer>

</html>