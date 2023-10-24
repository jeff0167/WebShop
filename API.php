<?php require_once "./DbConnection.php";

    function getProducts()  // don't like globals, added complexity to work with them
    {
        return mysqli_query($GLOBALS['con'], "SELECT * FROM product");
    }

    function PostProductCart($Product_id, $Cart_id, $Amount)
    {
        $value = "(" . $Product_id . ",". $Cart_id . "," . $Amount . ")";
        $data = mysqli_query($GLOBALS['con'], "INSERT INTO ProductCart VALUES" . $value);
    }

    function PutProductCart($Product_id, $Cart_id, $Amount)
    {
        $SQL = "UPDATE ProductCart SET " . "Amount=" . $Amount . " WHERE ( Product_id =" . $Product_id . " AND Cart_id" . "=" . $Cart_id . ")";
        echo $SQL;
        $data = mysqli_query($GLOBALS['con'], $SQL);
    }
?>