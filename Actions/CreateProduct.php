<?php require_once "../Everything.php";

    session_start();

    if(!isset($_POST["Name"]) || !isset($_POST["Description"])  || !isset($_POST["Tag_id"])  || !isset($_POST["Price"])){
        $_SESSION["Error"] = "Error, some fields were not filled in";
        header('Location: '."../Pages/AdminPage");
        die(); // what does die mean, what happens? is it like return?
    }
    if (!isset($_POST["ImagePath"])){
        $_POST["ImagePath"] = "";
    }

    PostProduct($_POST["Name"], $_POST["Description"], $_POST["Tag_id"], $_POST["Price"], $_POST["ImagePath"]);

    header('Location: '."../Pages/AdminPage.php");
    die();
?>
