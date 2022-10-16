<?php
    session_start();
    // if the user is not logged in, redirect them to the public page
    if ($_SESSION['logged']=false){
        header('location: ../authors/public.php');
    }

    // use the following guidelines to create the function in auth.php
    $_SESSION['logged']=false;
    session_destroy();
    // redirect the user to the public page.
    header('location: ../authors/public.php');