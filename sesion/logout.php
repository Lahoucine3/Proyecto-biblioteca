<?php

session_start();

require "../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../views';
$cache = '../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

if(isset($_SESSION)){

    session_destroy();
    header('location:../index.php');
    exit();

}

?>
