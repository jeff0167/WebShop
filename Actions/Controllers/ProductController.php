<?php require_once "../Everything.php";

    function GetProducts()  // don't like globals, added complexity to work with them
    {
        $sth = $GLOBALS['pdo']->query("SELECT * FROM product");
        $sth->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Product");
        return $sth->fetchAll();
    }

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

?>