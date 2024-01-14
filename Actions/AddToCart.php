<?php require_once "../Everything.php";

    session_start();

    $productCart = GetProductCart((int)$_SESSION["Cart_id"]);
    $exists = false;
    foreach ($productCart as $product){
        if((int)$_POST["ProductId"] == $product->getProductId()) {
            $exists = true;
            $currentAmount = $product->getAmount();
            break;
        }
    }

    if($exists){
        PutProductCart((int)$_POST["ProductId"], (int)$_SESSION["Cart_id"], $currentAmount + (int)$_POST["AddAmount"]); 
    }
    else{
        PostProductCart((int)$_POST["ProductId"], (int)$_SESSION["Cart_id"], (int)$_POST["AddAmount"]); 
    }
  
    //session_unset();  //clears session

    header('Location: '."../Pages/index");
    die();
?>
