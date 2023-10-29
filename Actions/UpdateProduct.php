<?php require_once "../Everything.php";

    session_start();

    if(!isset($_POST["ProductId"]) || !isset($_POST["Name"]) || !isset($_POST["Description"]) || !isset($_POST["Price"])){
        $_SESSION["Error"] = "Could not update product";
        header('Location: '."../Pages/AdminPage.php");
        die();
    }
    else{
        try{
            PutProduct($_POST["ProductId"], $_POST["Name"], $_POST["Description"], $_POST["Price"], $_POST["ImagePath"]);
        }
        catch(Exception $e){
            $_SESSION["Error"] = "Cannot delete product when some one has that product in their cart";
        }
    }

    header('Location: '."../Pages/AdminPage.php");
    die();
?>
