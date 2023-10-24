<?php require_once "../coolLib.php";
    require_once "./Classes/Product.php";
    require_once "./DbConnection.php";
    require_once "./API.php";

    session_start();

    $data = getProducts($con, "SELECT * FROM product");

    // $products = mysqli_fetch_object($data);
    //$data = $con->query("SELECT * FROM product");

    // $list[] = array();

    // while ($row = $data->fetch_assoc()){
    //     $d = new Product($row["Id"],$row["Name"],$row["Description"],$row["Tag_id"],$row["Price"],$row["ImagePath"]);
    //     array_push($list, (Product::class), $d);
    // }

    // cwArray($list);
    // cw($list[2]->getDescription());

    function SayHi(){
        echo "hi";
    }

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
  <li><a href="#contact">Login</a></li>
</ul>
  
<div class="ProductList">
    <h1>Results</h1>
    <?php  
    
    $hasCart = false;

    if(isset($_SESSION["Cart"])){
        $hasCart = true;
        var_dump($_SESSION["Cart"]);
        // wanna store value in Cart array with product id as first value, and amount as second value
    }
    // $item = 1;
    //   if(isset($_POST['AddToCart'])) { 
    //     $item++;
    //     echo "Add to cart" . $_POST['AddToCart']; 
    // } 
        while ($row = $data->fetch_assoc()){
            ?>
            <div class="Product">
                <div class="image">
                    <img src=<?php echo "./Images/". ($row["ImagePath"] != "" ? $row["ImagePath"]: "/MSI_1_Monitor") . ".jpg"?>>
                </div>
                <div class="ProductValues">
                    <div class="Bold"><?php echo $row["Name"] ?></div>
                    <div><?php echo $row["Description"] ?></div>
                    <div class="Bold"><?php echo $row["Price"] . " $"?></div> 
                </div>
                <div class="CartOptions">
                    <!-- action="addToCart.php"-->
                <form action="addToCart.php" method="post"> 
                    <!-- Should be able to see how many you have in cart, and can specificially choose the amount you want to add -->
                    <label for="PA" name="ProductiD">Amount to add</label>

                    <?php 
                    if($hasCart){
                        $amount = 0;
                        foreach($_SESSION["Cart"] as $item){
                            if($item["ProductId"] == $row["Id"]) $amount+= (int)$item["AddAmount"];
                        }
                        echo "Has " . $amount . " amount in cart";
                    }
                    
                    ?>

                    <input type="hidden" name="ProductId" value="<?php echo $row["Id"]; ?>" />
                    <input class="ProductAmount" id="PA" type="number" name="AddAmount" value=1>
                    <button type="submit" class="AddToCart">Add to cart</button>
                </form> 
                </div>
            </div>
            <?php
        }
        ?>
</div>
</html>
</body>