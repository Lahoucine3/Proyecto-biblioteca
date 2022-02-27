<?php

session_start();

require "../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../views';
$cache = '../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

if ($_SESSION['tipo'] != "Bibliotecario"){
    die('Usuario no autorizado');

}

if(!$_SESSION['id']){
    header('location:login.php');
}


echo $blade->run ("sesion.dashboard-admin");
?>







