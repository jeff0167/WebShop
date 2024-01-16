<?php 
    require_once "../Everything.php";

    session_start();

    $person = GetPersonByLoginInfo($_POST["Email"], $_POST["Password"]);

    if($person->GetName() == ""){
        echo "user not found";
        header('Location: '."../Pages/ErrorPage.php");
        die("hello"); // terminate the current script can send a message as input
    }
    else{
        $_SESSION["Person"] = $person;
        echo "Logged in";
        header('Location: '."../Pages/index");
        die();
        //var_dump($person);
    }
?>
