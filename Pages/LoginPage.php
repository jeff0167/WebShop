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

    <p>Don't have an account? <a href="./CreateAccountPage.php"><button type="submit" class="AddToCart">Sign up</button></a></p>
</div>

</html>