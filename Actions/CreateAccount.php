<?php require_once "../Everything.php";
      
  session_start();
  if(isset($_SESSION["Error"])){
    unset($_SESSION["Error"]);
  }

  $namePattern = "/^[a-zA-Z]{3,20}$/";
  $phonePattern = "/^[\d]{8}$/"; 
  $addressPattern = "/^[A-Za-z0-9'\.\-\s\,]{3,30}$/"; 
  $emailPattern = "/^[\w]+@[\w]+\.[\w]{2,4}$/"; 
  $passwordPattern = "/^(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,16}$/"; 

  if(isset($_POST["Name"]))
  {
      if(!preg_match($namePattern, $_POST["Name"])) errorLog("Name is invalid, name must be between a length of 3-20 characters");
  }

  if(isset($_POST["PhoneNumber"]))
  {
      if(!preg_match($phonePattern, $_POST["PhoneNumber"])) errorLog("Phone number is invalid, phone number must have a length of 8 characters");
  }

  if(isset($_POST["Address"]))
  {
      if(!preg_match($addressPattern, $_POST["Address"])) errorLog("Address is invalid, address must be between a length of 3-30 characters");
  }

  if(isset($_POST["Email"]))
  {
      if(!preg_match($emailPattern, $_POST["Email"])) errorLog("Email is invalid, email must contain @ followed by a few characters then a . then 2-4 characters");
  }

  if(isset($_POST["Password"]))
  {
      if(!preg_match($passwordPattern, $_POST["Password"])) errorLog("Password is invalid, password must be between a length of 8-16 characters and contain one number and one special character");
  }


  if(isset($_SESSION["Error"]))
  {
      header('Location: '."../Pages/CreateAccountPage.php");
      die();
  }


  $person = PostPerson($_POST["Name"], $_POST["PhoneNumber"], $_POST["Address"], $_POST["Email"], $_POST["Password"]);

  //echo $person->GetName();
  if($person->GetName() == ""){
      errorLog("Could not create person");
  }
  else{
      $_SESSION["Person"] = $person;
      echo "Logged in";
      header('Location: '."../Pages/index");
      die();
      //var_dump($person);
  }

  function errorLog(string $errorMessage)
  {
      $_SESSION["Error"] = $_SESSION["Error"] . $errorMessage . "<br>";
      echo $_SESSION["Error"];
  }
