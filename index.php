<?php 
    session_start();
    unset($_SESSION);
    print_r($_SESSION);
    session_destroy();
    header('Location: login/formLogin.php');
?>