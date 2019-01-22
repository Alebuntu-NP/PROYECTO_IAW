<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lfs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="../css/pag_so.css" />

</head>

<body style="background-image: url('../css/fondos/fondo_lfs.jpg');">
<?php
session_start();
if (isset($_SESSION["user"]) && isset($_SESSION["password"])) {
    ?>
 <div class="container mt-4">


<!-- Tab panes -->
<div class="tab-content">



  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">


            <ul class="nav nav-pills" role="tablist">

              <?php include_once '../php_codigo/atras.php'; ?>

              <?php include_once '../php_codigo/salir_sesion.php'; ?>

            </ul>

            <div class="tab-content">
              <div class="container mt-4">
  <div class="row">

      <?php include_once '../php_codigo/versiones.php';?>

    </div>

                </div>


                </div>
                <hr>
             
            </div>
  <?php
} else {
    session_destroy();
    header("Location: ../INICIO/index.php");
}
?>
</body>

</html>