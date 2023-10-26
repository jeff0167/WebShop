<?php
require "../Everything.php";
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
  <li><a href="#home">Product</a></li>
  <li><a href="#news">Cart</a></li>
  <li><a href="#contact">Login</a></li>
</ul>

<div class="CenterDiv">
    <form action="../Actions/Login.php" method="post"> 
    <input class="ProductAmount" type="text" name="Email" placeholder="Email">
    <input class="ProductAmount" type="password" name="Password" placeholder="Password">
    <button type="submit" class="AddToCart">Login</button>
    </form> 
</div>

</html>


