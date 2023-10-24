<?php require_once "./DbConnection.php";
    require_once "./API.php";
    session_start();

    if(!isset($_SESSION["Cart"])){
        $_SESSION["Cart"] = array();
        $addItem = array("ProductId" => (int)$_POST["ProductId"], "AddAmount" => (int)$_POST["AddAmount"]);
        array_push($_SESSION["Cart"], $addItem);
    }
    else{

        $added = false; // doesn't work when assigning the amount in a foreach loop, not very preatty code

        for ($i=0; $i < count($_SESSION["Cart"]); $i++) { 
            if($_SESSION["Cart"][$i]["ProductId"] == (int)$_POST["ProductId"]){
                $_SESSION["Cart"][$i]["AddAmount"] += (int)$_POST["AddAmount"];
                
                //dont post if you should only update
                PutProductCart((int)$_POST["ProductId"], 1, $_SESSION["Cart"][$i]["AddAmount"]); 
               
                $added = true;
                break;
            }
        }

        if(!$added){
            $item = array("ProductId" => (int)$_POST["ProductId"], "AddAmount" => (int)$_POST["AddAmount"]);
            array_push($_SESSION["Cart"], $item);
            PostProductCart((int)$_POST["ProductId"], 1, (int)$_POST["AddAmount"]); // the 1, is the cart id, which needs to be assigned asswell
            $added = true;
        }
    }
    
    //session_unset();  //clears session

    header('Location: '."index");
    die();
?>
