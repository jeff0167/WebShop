<?php 
    require_once "../Everything.php";

    session_start();
    session_unset();

    header('Location: '."../Pages/index");
    die();

?>