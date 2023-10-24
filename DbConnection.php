<?php require_once "../coolLib.php";
    $servername = "localhost";
    $username = "root";
    $password = "root";

    $con = new mysqli($servername, $username, $password, "phpwebshop");

    if($con->connect_error){
        //cw("Failed to connect to database");
        die("Error connecting to" . $con->connect_error);
    }
    else  
    //cw("Successfully connected to database");

?>