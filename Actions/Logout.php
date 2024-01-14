<?php 
    require_once "../Everything.php";

    session_start(); // do we really need the session start in this instance?
    session_unset();

    header('Location: '."../Pages/index");
    die();

?>