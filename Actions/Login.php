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
        die(); // hmm it still works if you don't call die, but can lead to unexpected behaviour as the script still runs in the background
        //var_dump($person);
    }
?>
