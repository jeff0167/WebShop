<?php require_once "Everything.php";

    //https://www.php.net/manual/en/pdostatement.fetch.php

    function GetProducts()  // don't like globals, added complexity to work with them
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM product");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Product");
        return $sth->fetchAll();
    }

    function GetProductCart(int $cart_id)
    {
        $SQL = "SELECT * FROM ProductCart WHERE Cart_id = $cart_id";
        $sth = $GLOBALS['pdo']->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "ProductCart");
        return $sth->fetchAll();
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

    // Product

    function PostProduct(string $name, string $description, int $tag_id, int $price, string $imagePath)
    {
        $sth = $GLOBALS['pdo']->query("INSERT INTO Product VALUES (null, '$name', '$description', '$tag_id', $price, '$imagePath')");
    }

    function PutProduct(int $product_id, string $name, string $description, int $price, string $imagePath)
    {
        $sth = $GLOBALS['pdo']->query("UPDATE Product SET Name = '$name', Description = '$description', Price = $price, ImagePath = '$imagePath' WHERE Id = '$product_id'");
    }

    function DeleteProduct(int $id)
    {
        $sth = $GLOBALS['pdo']->query("DELETE FROM Product WHERE Id = $id");
    }

    // Tags

    function GetTags()
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Tag");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Tag");
        return $sth->fetchAll();
    }

    // cart

    function GetCartByPersonId(int $person_id)
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Cart where Person_id = $person_id");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Cart");
        return $sth->fetch();
    }

    function PostCart(int $person_id)
    {
        $sth = $GLOBALS['pdo']->query("INSERT INTO Cart VALUES (null, $person_id)");
    }

    // Person Silversoul@edo.com   Shinpachi

    function GetPersonByLoginInfo(string $email, string $password)
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM Person where email = '$email' and password = '$password'");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Person");
        return $sth->fetch();
    }

    function PostPerson(string $name, string $phoneNumber, string $address, string $email, string $password)
    {
        $SQL = "INSERT INTO Person VALUES (null, '$name', '$phoneNumber', '$address', '$email', '$password', 0)"; // have to add '' around string values
        $sth = $GLOBALS['pdo']->query($SQL);
        $person = GetPersonByLoginInfo($email, $password);
        PostCart($person->getId());
        return $person;
        //$sth->execute(); // you don't have to call execute?
        //return $sth->fetch();
        //return GetPersonByLoginInfo($email, $password);
    }

?>