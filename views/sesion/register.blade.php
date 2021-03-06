@extends('plantilla')
@section("content")


<div class="container h-100">

    <div class="row h-100 mt-5 justify-content-center align-items-center">

        <div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">

            <h1 class="mx-auto w-25" >Register</h1>

            <?php

            if(isset($errors) && count($errors) > 0) {

                foreach($errors as $error_msg) 	{

                    echo '<div class="alert alert-danger">'.$error_msg.'</div>';

                }

            }



            if(isset($success))      {



                echo '<div class="alert alert-success">'.$success.'</div>';

            }

            ?>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

                <div class="form-group">

                    <label for="email">First Name:</label>

                    <input type="text" name="first_name" placeholder="Enter First Name" class="form-control" value="<?php echo ($valFirstName??'')?>">

                </div>

                <div class="form-group">

                    <label for="email">Last Name:</label>

                    <input type="text" name="last_name" placeholder="Enter Last Name" class="form-control" value="<?php echo ($valLastName??'')?>">

                </div>



                <div class="form-group">

                    <label for="email">Email:</label>

                    <input type="text" name="email" placeholder="Enter Email" class="form-control" value="<?php echo ($valEmail??'')?>">

                </div>

                <div class="form-group">

                    <label for="email">Password:</label>

                    <input type="password" name="password" placeholder="Enter Password" class="form-control" value="<?php echo ($valPassword??'')?>">

                </div>



                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                <p class="pt-2"> Back to <a href="login.php">Login</a></p>



            </form>

        </div>

    </div>

</div>

@endsection