<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"])) {

  if ($_SESSION["user"]=='admin007') {
    
  
    header("Location: ./administrador/admin.php");

  } else {
    $_SESSION['user'];
    header("Location: ./usuarios/user.php");
  }
  

  } else {
    session_destroy();
    header("Location: ./login.php");
  }


 ?>
