<?php 
      require_once "../Everything.php";

      session_start();
  
      $person = PostPerson($_POST["Name"], $_POST["PhoneNumber"], $_POST["Address"], $_POST["Email"], $_POST["Password"]);

      //echo $person->GetName();
      if($person->GetName() == ""){
          echo "Could not create person";
        //   header('Location: '."../Pages/ErrorPage.php");
        //   die();
      }
      else{
          $_SESSION["Person"] = $person;
          echo "Logged in";
          header('Location: '."../index");
          die();
          //var_dump($person);
      }
?>
