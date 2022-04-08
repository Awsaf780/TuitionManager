<?php 
    session_destroy();

    $username = $_COOKIE['admin_username'];

    setcookie("admin_username", $username, time() - 360,'/');

    header("Location:index.php");
?>