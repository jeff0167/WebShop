<?php require_once "../Everything.php";
      
    session_start();
    if(isset($_SESSION["Error"])){
        unset($_SESSION["Error"]);
        $_SESSION["Error"] = "";
    }

    $namePattern = "/^[a-zA-Z]{3,20}$/";
    $phonePattern = "/^[\d]{8}$/"; 
    $addressPattern = "/^[A-Za-z0-9'\.\-\s\,]{3,30}$/"; 
    $emailPattern = "/^[\w]+@[\w]+\.[\w]{2,4}$/"; 
    $passwordPattern = "/^(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,16}$/"; 

    $name = validInput("Name", $namePattern, "Name is invalid, name must be between a length of 3-20 characters");
    $phoneNumber = validInput("PhoneNumber", $phonePattern, "Phone number is invalid, phone number must have a length of 8 characters");
    $address = validInput("Address", $addressPattern, "Address is invalid, address must be between a length of 3-30 characters");
    $email = validInput("Email", $emailPattern, "Email is invalid, email must contain @ followed by a few characters then a . then 2-4 characters");
    $password = validInput("Password", $passwordPattern, "Password is invalid, password must be between a length of 8-16 characters and contain one number and one special character");

    checkIfError();
    $person = PostPerson($name, $phoneNumber, $address, $email, $password);

    function validInput($data, $pattern, $error)
    {
            if(isset($_POST[$data]))
            {   $actualData = $_POST[$data];
                $actualData = trim($actualData);
                $actualData = stripslashes($actualData);
                $actualData = htmlspecialchars($actualData);
            }
            if(!preg_match($pattern, $actualData)) errorLog($error);

            return $actualData;
    }

    function checkIfError()
    {
        if(isset($_SESSION["Error"]))
        { 
            echo $_SESSION["Error"];
            header('Location: '."../Pages/CreateAccountPage.php");
            die();
        }
    }

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
        //echo $_SESSION["Error"];
    }
?>