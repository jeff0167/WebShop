<?php require_once "../Everything.php";

    session_start();

    if(!isset($_POST["Product_id"])){
        $_SESSION["Error"] = "Could not find Product id";
        header('Location: '."../Pages/AdminPage.php");
        die();
    }
    else{
        try{
            DeleteProduct($_POST["Product_id"]);
        }
        catch(Exception $e){
            $_SESSION["Error"] = "Cannot delete product when some one has that product in their cart";
        }     
    }

    header('Location: '."../Pages/AdminPage.php");
    die();
?>
