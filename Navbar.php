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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Web shop</title>
</head>
<body class="BG-Black text-white center-text">
 <ul class="ul">
   <li class="li"><a class="NavButton <?= ($activePage == 'FrontPAge') ? 'active':''; ?>" href="FrontPage.php">Front Page</a></li>
    <li class="li"><a class="NavButton <?= ($activePage == 'index') ? 'active':''; ?>" href="index.php">Product</a></li>
    <?php if(!isset($_SESSION["Person"])){
      ?>
       <li class="li"><a class="NavButton <?= ($activePage == 'LoginPage') ? 'active':''; ?>" href='LoginPage.php'>Login</a></li>
      <?php
    }
    else{
      ?>
        <li class="li"><a class="NavButton <?= ($activePage == 'Logout') ? 'active':''; ?>" href='../Actions/Logout.php'>Logout</a></li>
      <?php
    }
    ?>

    <?php if(isset($_SESSION["Person"])){
      if($_SESSION["Person"]->getIsAdmin()){
        ?>
        <li class="li"><a class="NavButton <?= ($activePage == 'AdminPage') ? 'active':''; ?>"  href='AdminPage.php'>Admin page</a></li>
        <?php
      }
    } ?>
    <li style="margin-top: 1.5rem; font-size: 22px;">Welcome <?php if(isset($_SESSION["Person"])) echo $_SESSION["Person"]->GetName(); ?></li> 
  </ul>