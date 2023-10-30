<?php require "../Everything.php";
  session_start();
  //session_destroy(); // if bugs use this to clear cache
  require_once "../Navbar.php";
?>

<div class="CenterDiv">
    <form action="../Actions/Login.php" method="post"> 
    <input class="ProductAmount" type="text" name="Email" placeholder="Email">
    <input class="ProductAmount" type="password" name="Password" placeholder="Password">
    <button type="submit" class="AddToCart">Login</button>
    </form> 
    <div class="UnderDiv">
      <p>No account? <a class="a" href="./CreateAccountPage.php"><button class="AddToCart">Sign up</button></a></p>
    </div>
</div>

</html>