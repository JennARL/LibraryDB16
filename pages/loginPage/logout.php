<?php
    /*
        Date Created: 2022_04_06 by Nathan Brueckner
        File Purpose:
            Logout
    */
    session_start();

    unset($_SESSION);
    session_destroy();
    
    header('Location: ../../index.php');
    exit();
?>