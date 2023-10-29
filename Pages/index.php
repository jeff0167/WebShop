<?php require_once "../Everything.php";

    session_start(); // account Umbrella@edo.com Umibozu       Silversoul@edo.com  Shinpachi    Glasses@edo.com  !Glasses9
    //session_destroy(); // if bugs use this to clear cache
    
    $products = GetProducts();

    if(isset($_SESSION["Person"])){
        $cart = GetCartByPersonId($_SESSION["Person"]->getId());
        $_SESSION["Cart_id"] = $cart->getId();
        $productCart = GetProductCart($cart->getId());
    }

    require_once "../Navbar.php"; // TODO put admin ref in navbar !!

    // if admin show admin things, such as the admin page

    // filter by category
    // filter by tag
    // highlight selected page in navbar
?> 
  
<div class="ProductList">
    <h1>Results</h1>
    <?php  
        if(isset($_SESSION["Person"])){
            if($_SESSION["Person"]->getIsAdmin()) echo "We have an admin watch out";
        }
        foreach ($products as $product) {
            ?>
            <div class="Product">
            <div class="image">
                <img src=<?php echo "../Images/". ($product->getImagePath() != "" ? $product->getImagePath(): "/MSI_1_Monitor") . ".jpg"?>>
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
                        <form action="../Actions/AddToCart.php" method="post"> 
                            <!-- Should be able to see how many you have in cart, and can specificially choose the amount you want to add -->
                            <?php
                                $amount = 0;
                                foreach($productCart as $item){
                                    if($item->getProductId() == $product->getId()) {
                                        $amount = (int)$item->getAmount();
                                        break;
                                    }
                                }
                                echo "Has " . $amount . " amount in cart  <br>";
                                echo "Total price: " . $amount * $product->getPrice() . " $ <br>";
                            ?>
                            <input type="hidden" name="ProductId" value="<?php echo $product->getId(); ?>" />
                            <p>Amount to add</p>
                            <input class="ProductAmount" id="PA" type="number" name="AddAmount" value=1>
                            <br>
                            <button type="submit" class="AddToCart">Add product</button>
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