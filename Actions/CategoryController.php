<?php require_once "../Everything.php";

    //https://www.php.net/manual/en/pdostatement.fetch.php

    function GetCategories()  // don't like globals, added complexity to work with them
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Category");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Category");
        return $sth->fetchAll();
    }


?>