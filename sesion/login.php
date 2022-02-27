<?php

session_start();

require "../vendor/autoload.php";

use eftec\bladeone\BladeOne;

$views = '../views';
$cache = '../cache';

$blade = new BladeOne($views, $cache,BladeOne::MODE_AUTO);

require_once('config.php');



if(isset($_POST['submit'])) {

    if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);



        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $sql = "select * from usuarios where email = :email ";
            $handle = $pdo->prepare($sql);
            $params = ['email'=>$email];
            $handle->execute($params);

            if($handle->rowCount() > 0) {

                $getRow = $handle->fetch(PDO::FETCH_ASSOC);


                if(password_verify($password, $getRow['password'])) {

                    unset($getRow['password']);
                    $_SESSION = $getRow;
                    if($_SESSION['tipo'] == "Bibliotecario"){
                        header('location:dashboard-admin.php');
                    }else {
                        header('location:dashboard-user.php');
                    }
                    exit();

                } else 	{

                    $errors[] = "Wrong Email or Password";

                }

            } else 	{

                $errors[] = "Wrong Email or Password";

            }

        }

        else

        {

            $errors[] = "Email address is not valid";

        }

    }

    else

    {

        $errors[] = "Email and Password are required";

    }

}

echo $blade->run ("sesion.login");

?>


