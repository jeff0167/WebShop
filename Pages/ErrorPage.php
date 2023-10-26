<?php require "../Everything.php";
  session_start();
  //session_destroy(); // if bugs use this to clear cache

  if(!isset($_SESSION["Error"])){
    $_SESSION["Error"] = "Error something went wrong";
}

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
    <?php echo $_SESSION["Error"] ?>
</div>

</html>