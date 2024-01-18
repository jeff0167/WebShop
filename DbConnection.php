<?php
    $servername = "localhost";
    $database = "phpwebshop";
    $username = "root";
    $password = "root";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database;", $username, $password, array(
            PDO::ATTR_PERSISTENT => true // or PDO::FETCH_PROPS_LATE constant:  or PDO::FETCH_CLASS   Returns instances of the specified class, mapping the columns of each row to named properties in the class. 
        )); // persist the connection
        //cw("Successfully connected to database");
    } catch (PDOException $e) {
        echo "something went wrong";
    }

?>