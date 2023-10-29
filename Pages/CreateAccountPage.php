<?php require "../Everything.php";
  session_start();
  //session_destroy(); // if bugs use this to clear cache
  require_once "../Navbar.php";
?>

<div class="CenterDiv">
    <form action="../Actions/CreateAccount.php" method="post"> 
    <input class="ProductAmount" type="text" name="Name" placeholder="Name">
    <input class="ProductAmount" type="text" name="PhoneNumber" placeholder="Phone number">
    <input class="ProductAmount" type="text" name="Address" placeholder="Address">
    <input class="ProductAmount" type="text" name="Email" placeholder="Email">
    <input class="ProductAmount" type="password" name="Password" placeholder="Password">
    <button type="submit" class="AddToCart">Create Account</button>
    </form> 
    <p>Have account? <a href="./LoginPage.php"><button type="submit" class="AddToCart">Log in</button></a></p>
</div>

<div>
  <?php
  //var_dump($_SESSION);
  if(isset($_SESSION["Error"])) echo "ERROR <br>" . $_SESSION["Error"];
  ?>
</div>

</html>