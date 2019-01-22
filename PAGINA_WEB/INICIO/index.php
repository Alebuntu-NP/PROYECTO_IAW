<?php

  //Open the session
  session_start();

  if (isset($_SESSION["user"]) && isset($_SESSION["password"]) ) {

  if ($_SESSION["user"]=='admin') {
    
  
    echo "<script>location.href='../administrador/index.php';</script>";
    die();

  } else {

    echo "<script>location.href='../usuarios/index.php';</script>";
    die();
  }
  

  } else {
    session_destroy();
    header("Location: ./login.php");
  }


 ?>
