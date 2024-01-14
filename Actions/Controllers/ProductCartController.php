<?php require_once "../Everything.php";

    //https://www.php.net/manual/en/pdostatement.fetch.php

    function GetProductCart(int $cart_id)
    {
        $SQL = "SELECT * FROM ProductCart WHERE Cart_id = $cart_id";
        $sth = $GLOBALS['pdo']->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "ProductCart");
        return $sth->fetchAll(); // this returns a list of all the products for that cart with that id
    }

    function PostProductCart(int $product_id, int $cart_id, int $amount)
    {
        $SQL = "INSERT INTO ProductCart VALUES ($product_id, $cart_id, $amount)";
        $sth = $GLOBALS['pdo']->query($SQL);
        //$sth->execute();
    }

    function PutProductCart(int $product_id, int $cart_id, int $amount)
    {
        $SQL = "UPDATE ProductCart SET Amount = $amount WHERE (Product_id = $product_id AND Cart_id = $cart_id)";
        $sth = $GLOBALS['pdo']->query($SQL);
        //$sth->execute(); // you don't have to call execute?
    }

?>