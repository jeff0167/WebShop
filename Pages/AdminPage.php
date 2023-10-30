<?php require_once "../Everything.php";

    session_start(); // account Umbrella@edo.com Umibozu       Silversoul@edo.com  Shinpachi    Glasses@edo.com  !Glasses9
    
    $products = GetProducts();
    $tags = getTags();

    require_once "../Navbar.php"; 

    if(isset($_SESSION["Person"])){
        if(!$_SESSION["Person"]->getIsAdmin()){
            echo "Restricted Area: Requires authentication";
            return;
        }
        $cart = GetCartByPersonId($_SESSION["Person"]->getId());
        $_SESSION["Cart_id"] = $cart->getId();
        $productCart = GetProductCart($cart->getId());
    }else{
        echo "Restricted Area: Requires authentication";
            return;
    }
?> 

<div class="AddProductBox">
        <form action="../Actions/CreateProduct.php" method="post"> 
            <input type="text" name="Name" placeholder="Name">
            <br>
            <input type="text" name="Description" placeholder="Description">
            <br>
            <div>     
                <select name="Tag_id">
                <?php
                    foreach ($tags as $tag){
                        echo "<option value=" . $tag->getId() . ">" .$tag->getName() . "</option>";
                    }
                ?>
                </select>
            </div>
            <br>
            <input type="number" name="Price" placeholder="Price">
            <br>
            <input type="text" name="ImagePath" placeholder="Image name">
            <br>
            <button type="submit" class="AddToCart">Create product</button>
        </form>          
    </div>
  
<div class="ProductList">
    <h4 style="margin-left: 1.5rem;">Product List</h4>
    <?php  
        if(isset($_SESSION["Person"])){
            if($_SESSION["Person"]->getIsAdmin()) echo "We have an admin watch out <br>";
        }
        if(isset($_SESSION["Error"])) echo "ERROR: " . $_SESSION["Error"];
        foreach ($products as $product) {
            ?>
            <div class="Product">
            <div class="image">
                <img src=<?php echo "../Images/". ($product->getImagePath() != "" ? $product->getImagePath(): "/MSI_1_Monitor") . ".jpg"?>>
            </div>
            <div class="ProductValuesAdmin">
                <form action="../Actions/UpdateProduct.php" method="post"> 
                    <input type="hidden" name="ProductId" value="<?php echo $product->getId(); ?>" />
                    <div style="margin-top: -.9rem;" class="Bold specialInput">Name <br><input name="Name" value="<?php echo $product->getName(); ?>"></div>
                    <div>Description <br><input name="Description" value="<?php echo $product->getDescription() ?>"></div>
                    <div class="Bold">Price <br><input name="Price" value="<?php echo $product->getPrice()?>">$</div> 
                    <div class="Bold">Image path <br><input name="ImagePath" value="<?php echo $product->getImagePath()?>"></div> 
                    <button type="submit">Update Product</button>
                </form>
            </div>
       
            <div class="CartOptions">  
                <div>
                    <form action="../Actions/DeleteProduct.php" method="post"> 
                        <input type="hidden" name="Product_id" value="<?php echo $product->getId(); ?>" />
                        <button type="submit" class="DeleteButton">X</button>
                    </form>
                </div>
                <?php 
                    if(isset($_SESSION["Person"])){
                        ?>
                        <form action="../Actions/addToCart.php" method="post"> 
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