<?php require_once "../Everything.php";
    // https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_ref_js_dropdown_multilevel_css&stacked=h    LINK TO SUBMENU!!!!

    session_start(); // account Umbrella@edo.com Umibozu       Silversoul@edo.com  Shinpachi    Glasses@edo.com  !Glasses9
    //session_destroy(); // if bugs use this to clear cache
    
    $products = GetProducts();                // HACKS ctrl + shift + f to search in CURRENT FILE
    $filteredProducts = $products;
    $categories = GetCategories();
    $tags = GetTags();

    if(isset($_SESSION["Person"])){
        $cart = GetCartByPersonId($_SESSION["Person"]->getId());
        $_SESSION["Cart_id"] = $cart->getId();
        $productCart = GetProductCart($cart->getId());
    }

    require_once "../Navbar.php";

    function FilterProductsByCategory()
    {
        return array_filter($GLOBALS["products"], function ($x) {
            foreach ($GLOBALS["tags"] as $tag) {
                if($x->getTag_id() == $tag->getId()) {
                    return $tag->getCategoryId() == $_POST["Category"];
                }
            }
        });
    }

    function FilterProductsByTag()
    {
        return array_filter($GLOBALS["products"], function ($x) {
                return $x->getTag_id() == $_POST["Tag"];
        });
    }

    if(isset($_POST["Category"])){ // filtering by category
        $filteredProducts = FilterProductsByCategory($_POST["Category"]);
        foreach($GLOBALS["categories"] as $tag){
            if($tag->getId() == $_POST["Category"]) $_SESSION["CurrentFilter"] = $tag->getName();
        }
    }

    if(isset($_POST["Tag"])){ // filtering by category
        $filteredProducts = FilterProductsByTag($_POST["Tag"]);
        foreach($GLOBALS["tags"] as $tag){
            if($tag->getId() == $_POST["Tag"]) $_SESSION["CurrentFilter"] = $tag->getName();
        }
    }

    function cmp($a, $b) {  
        return strcasecmp($a->getName(), $b->getName());
    }
    usort($filteredProducts,"cmp"); // sort products by their name

    //The page needs a search button!
?> 
<div class="ProductList">
    <h4 style="margin-left: 1.5rem;">Product List</h4> 
    <form action="index.php" method="post">
        <div class="container categorySelect" id="cat">                                    
            <div class="dropdown">
                <h4 style="margin-left: 1.5rem"><?php if(isset($_SESSION["CurrentFilter"])) echo $_SESSION["CurrentFilter"]?></h4>
                <button class="btn btn-default dropdown-toggle categorySelect" type="button" data-toggle="dropdown">Category 
                <span class="caret"></span></button>
                <ol class="dropdown-menu">
                <li class="dropdown-submenu">
                <?php
                        foreach ($categories as $category ) {
                            ?>
                                <button name="Category" class="subMenuButton" value="<?php echo $category->getId() ?>" ><?php echo $category->getName() ?></button>
                            <?php
                                foreach ($tags as $tag){
                                    if($category->getId() == $tag->getCategoryId()){
                                        ?>
                                            <br>
                                            <button name="Tag" class="subSubMenuButton" value="<?php echo $tag->getId() ?>" ><?php echo $tag->getName() ?></button>
                                        <?php
                                    }
                                }
                            ?>
                            <br>
                            <?php
                        }
                    ?>
                </li>
                </ol>
            </div>
        </div>
    </form>
        <?php
        foreach ($filteredProducts as $product) {
            ?>
            <div class="Product">
            <div class="image">
                <img src=<?php echo "../Images/". ($product->getImagePath() != "" ? $product->getImagePath(): "/MSI_1_Monitor") . ".jpg"?>>
            </div>
            <div class="ProductValues">
                <div class="Bold TopMargin"><?php echo $product->getName() ?></div>
                <div><?php echo $product->getDescription() ?></div>
                <div class="Bold"><?php echo $product->getPrice() . " $"?></div> 
            </div>
            <div class="CartOptions">  
                <?php 
                    if(isset($_SESSION["Person"])){
                        ?>
                        <form action="../Actions/AddToCart.php" method="post"> 
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
                    else echo "<div style='margin-top: 10rem'>Login to add product to cart</div>";
                ?>
            </form> 
            </div>
        </div>
        <?php
        }
        ?>
</div>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
</html>
</body>