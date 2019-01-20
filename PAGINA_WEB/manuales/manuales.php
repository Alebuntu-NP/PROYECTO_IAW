<!DOCTYPE html>
<html >

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="../css/manuales.css" />




</head>

<body>
  <?php
session_start();
if (isset($_SESSION["user"]) && isset($_SESSION["password"]) && $_SESSION["user"] != 'admin') {
    ?>
  <div class="container mt-4">

    <!-- Menus -->
    <ul class="nav nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
      </li>
      <?php include_once '../php_codigo/menus_manual.php';?>
      <?php include_once '../php_codigo/atras.php';?>
      <?php include_once '../php_codigo/salir_sesion.php';?>

    </ul>

    <!-- Contenidos del menu -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <h3>HOME</h3>
      </div>
      <?php
        include_once '../php_codigo/operaciones_en_manuales.php';
    ?>
  


    </div>
  </div>
  <?php

} else {
    session_destroy();
    header("Location: ../INICIO/index.php");
}
?>
</body>

</html>