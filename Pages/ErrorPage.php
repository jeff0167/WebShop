<?php require "../Everything.php";
  session_start();
  //session_destroy(); // if bugs use this to clear cache

  if(!isset($_SESSION["Error"])){
    $_SESSION["Error"] = "Error something went wrong";
  }
  require_once "../Navbar.php";
?>

<div class="CenterDiv">
    <?php echo $_SESSION["Error"] ?>
</div>

</html>