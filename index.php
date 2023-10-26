<?php require_once "./Everything.php";

    session_start();
    
    $products = getProducts();
    $productCart = GetProductCart(1); // remember the param is the cart id which sould come from the person id in the cart table

    $_SESSION["Person"] = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <link href="./index.css" rel="stylesheet">
    <title>Web shop</title>
</head>
<body class="BG-Black text-white center-text">

<ul>
  <li><a href="#home">Product</a></li>
  <li><a href="#news">Cart</a></li>
  <li><a href="./Pages/LoginPage.php">Login</a></li>
</ul>
  
<div class="ProductList">
    <h1>Results</h1>
    <?php  

        foreach ($products as $product) {
            ?>
            <div class="Product">
            <div class="image">
                <img src=<?php echo "./Images/". ($product->getImagePath() != "" ? $product->getImagePath(): "/MSI_1_Monitor") . ".jpg"?>>
            </div>
            <div class="ProductValues">
                <div class="Bold"><?php echo $product->getName() ?></div>
                <div><?php echo $product->getDescription() ?></div>
                <div class="Bold"><?php echo $product->getPrice() . " $"?></div> 
            </div>
            <div class="CartOptions">  
                <?php 
                    if(isset($_SESSION["Person"])){
                        ?>
                        <form action="addToCart.php" method="post"> 
                            <!-- Should be able to see how many you have in cart, and can specificially choose the amount you want to add -->
                            <label for="PA" name="ProductiD">Amount to add</label>
                            <?php
                                $amount = 0;
                                foreach($productCart as $item){
                                    if($item->getProductId() == $product->getId()) $amount+= (int)$item->getAmount();
                                }
                                echo "Has " . $amount . " amount in cart";
                            ?>
                            <input type="hidden" name="ProductId" value="<?php echo $product->getId(); ?>" />
                            <input class="ProductAmount" id="PA" type="number" name="AddAmount" value=1>
                            <button type="submit" class="AddToCart">Add to cart</button>
                            <?php
                    }
                    else echo "login to add to cart";
                ?>
            </form> 
            </div>
        </div>
        <?php
        }
        ?>
</div>
</html>
</body>