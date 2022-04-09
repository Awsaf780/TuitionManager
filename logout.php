<?php 
    session_destroy();

    $username = $_COOKIE['admin_username'];

    setcookie("admin_username", $username, time() - 360,'/');
    setcookie("logged_in_as", $_COOKIE['logged_in_as'], time() - 360,'/');
    setcookie("logged_in_user", $_COOKIE['logged_in_user'], time() - 360,'/');
    

    header("Location:index.php");
?>