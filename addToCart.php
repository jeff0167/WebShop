<?php require_once "./Everything.php";

    $productCart = GetProductCart(1);
    $exists = false;
    foreach ($productCart as $product){
        if((int)$_POST["ProductId"] == $product->getProductId()) {
            echo "it exist";
            $exists = true;
            $currentAmount = $product->getAmount();
            break;
        }
    }

    if($exists){
        PutProductCart((int)$_POST["ProductId"], 1, $currentAmount + (int)$_POST["AddAmount"]); 
    }
    else{
        PostProductCart((int)$_POST["ProductId"], 1, (int)$_POST["AddAmount"]); // the 1, is the cart id, which needs to be assigned asswell
    }
  
    //session_unset();  //clears session

    header('Location: '."index");
    die();
?>
