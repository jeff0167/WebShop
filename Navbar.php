<?php
  $activePage = basename($_SERVER['PHP_SELF'], ".php"); // get current page name
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../output.css" rel="stylesheet">
    <link href="./index.css" rel="stylesheet">
    <title>Web shop</title>
</head>
<body class="BG-Black text-white center-text">
 <ul>
    <li><a class="NavButton <?= ($activePage == 'index') ? 'active':''; ?>" href="index.php">Product</a></li>
    <li><a class="NavButton <?= ($activePage == 'Cart') ? 'active':''; ?>" href="#news">Cart</a></li>
    <?php if(!isset($_SESSION["Person"])){
      ?>
       <li><a class="NavButton <?= ($activePage == 'LoginPage') ? 'active':''; ?>" href='LoginPage.php'>Login</a></li>
      <?php
    }
    else{
      ?>
        <li><a class="NavButton <?= ($activePage == 'Logout') ? 'active':''; ?>" href='../Actions/Logout.php'>Logout</a></li>
      <?php
    }
    ?>

    <?php if(isset($_SESSION["Person"])){
      if($_SESSION["Person"]->getIsAdmin()){
        ?>
        <li><a class="NavButton <?= ($activePage == 'AdminPage') ? 'active':''; ?>"  href='AdminPage.php'>Admin page</a></li>
        <?php
      }
    } ?>
    <li>Welcome <?php if(isset($_SESSION["Person"])) echo $_SESSION["Person"]->GetName(); ?></li> 
  </ul>