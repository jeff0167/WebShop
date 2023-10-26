<?php require_once "Everything.php";

    //https://www.php.net/manual/en/pdostatement.fetch.php

    function getProducts()  // don't like globals, added complexity to work with them
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM product");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Product");
        return $sth->fetchAll();
    }

    function GetProductCart(int $Cart_id)
    {
        $SQL = "SELECT * FROM ProductCart WHERE Cart_id = $Cart_id";
        $sth = $GLOBALS['pdo']->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "ProductCart");
        return $sth->fetchAll();
    }

    function PostProductCart(int $Product_id, int $Cart_id, int $Amount)
    {
        $SQL = "INSERT INTO ProductCart VALUES ($Product_id, $Cart_id,$Amount)";
        $sth = $GLOBALS['pdo']->query($SQL);
        $sth->execute();
    }

    function PutProductCart(int $Product_id, int $Cart_id, int $Amount)
    {
        $SQL = "UPDATE ProductCart SET Amount=$Amount WHERE (Product_id = $Product_id AND Cart_id = $Cart_id)";
        $sth = $GLOBALS['pdo']->query($SQL);
        $sth->execute();
    }

    // Person Silversoul@edo.com   Shinpachi

    function GetPersonByLoginInfo(string $Email, string $Password)
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Person where email = '$Email'");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Person");
        return $sth->fetch();
    }

?>