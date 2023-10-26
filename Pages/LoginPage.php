<?php require "../Everything.php";
  session_start();
  //session_destroy(); // if bugs use this to clear cache

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../output.css" rel="stylesheet">
    <link href="../index.css" rel="stylesheet">
    <title>Web shop</title>
</head>
<body class="BG-Black text-white center-text">

<ul>
  <li><a href="../index.php">Product</a></li>
  <li><a href="#news">Cart</a></li>
  <?php echo (isset($_SESSION["Person"])) ? "<li><a href=''./Pages/LoginPage.php'>Login</a></li>" : "<li><a href=''./Actions/Logout.php'>Logout</a></li>" ?>
  <li>Hello <?php if(isset($_SESSION["Person"])) echo $_SESSION["Person"]->GetName(); //?></li> 
</ul>
<div class="CenterDiv">
    <form action="../Actions/Login.php" method="post"> 
    <input class="ProductAmount" type="text" name="Email" placeholder="Email">
    <input class="ProductAmount" type="password" name="Password" placeholder="Password">
    <button type="submit" class="AddToCart">Login</button>
    </form> 

    <p>Don't have an account? <a href="./CreateAccountPage.php"><button type="submit" class="AddToCart">Sign up</button></a></p>
</div>

</html>


