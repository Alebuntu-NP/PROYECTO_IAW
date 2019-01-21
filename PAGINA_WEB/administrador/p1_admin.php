
<?php
    session_start();

    if ( isset($_SESSION["user"]) && isset($_SESSION["password"])  && $_SESSION["user"]=='admin') {

header("Location:./principal.php");

} else {
  session_destroy();
  header("Location: ../INICIO/index.php");
}

    
    
    ?>
