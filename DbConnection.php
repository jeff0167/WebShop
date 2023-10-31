<?php
    $servername = "localhost";
    $database = "phpwebshop";
    $username = "root";
    $password = "root";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database;", $username, $password, array(
            PDO::ATTR_PERSISTENT => true
        ));
        //cw("Successfully connected to database");
    } catch (PDOException $e) {
        echo "something went wrong";
    }

?>