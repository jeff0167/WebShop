<?php require_once "../Everything.php";

    session_start(); // account Umbrella@edo.com Umibozu       Silversoul@edo.com  Shinpachi    Glasses@edo.com  !Glasses9
    //session_destroy(); // if bugs use this to clear cache
    
    $products = GetProducts();
    $filteredProducts = $products;
    $categories = GetCategories();
    $tags = GetTags();

    if(isset($_SESSION["Person"])){
        $cart = GetCartByPersonId($_SESSION["Person"]->getId());
        $_SESSION["Cart_id"] = $cart->getId();
        $productCart = GetProductCart($cart->getId());
    }

    require_once "../Navbar.php";

    function FilterProducts()
    {
        return array_filter($GLOBALS["products"], function ($x) {
            foreach ($GLOBALS["tags"] as $tag) {
                if($x->getTag_id() == $tag->getId()) {
                    if($tag->getCategoryId() == $_POST["Filter"])
                    return true;
                }
            }
            });
    }

    if(isset($_POST["Filter"])){ // filtering by category
        $filteredProducts = FilterProducts($_POST["Filter"]);
        //var_dump($filteredProducts);
    }

    // filter by category
    // filter by tag
    // highlight selected page in navbar
?> 
  
<div class="ProductList">
    <h1>Product List</h1>
    <?php  
        if(isset($_SESSION["Person"])){
            if($_SESSION["Person"]->getIsAdmin()) echo "We have an admin watch out";
        }
        ?>

<div class="container">                                    
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <?php
            foreach ($categories as $category ) {
                ?>
                    <!-- <li><a tabindex="-1" href="#"><?php echo $category->getName() ?></a></li> -->
                <?php
            }
        ?>
      <li class="dropdown-submenu">
      <?php
            foreach ($categories as $category ) {
                ?>
                    <li><a tabindex="-1" href="#"><?php echo $category->getName() ?></a></li>
                    <a class="test" tabindex="-1" href="#"><?php echo $category->getName() ?> <span class="caret"></span></a>

                    <?php
                    foreach ($tags as $tag){
                        if($category->getId() == $tag->getCategoryId()){
                        ?>
                            <li value="<?php echo $tag->getId() ?>" ><a tabindex="-1" href="#"><?php echo $tag->getName() ?></a></li>
                        <?php
                        }
                    }
                    ?>

                    <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                    <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                    <li class="dropdown-submenu">
                        <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="#">3rd level dropdown</a></li>
                        <li><a href="#">3rd level dropdown</a></li>
                        </ul>
                    </li>
                    </ul>
                <?php
            }
        ?>
        <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li class="dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">3rd level dropdown</a></li>
              <li><a href="#">3rd level dropdown</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>

        <form class="categorySelect" action="index.php" method="post">
            <select name="Filter">
            <?php
                foreach ($categories as $category){
                    ?>
                        <option value="<?php echo $category->getId() ?>" > <?php echo $category->getName() ?></option>;
                    <?php
                }
            ?>
            </select>
            <button type="submit">Filter</button>
        </form>
        <?php
        foreach ($filteredProducts as $product) {
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