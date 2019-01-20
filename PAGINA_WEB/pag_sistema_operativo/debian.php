<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/pag_so.css">

</head>

<body style="background-image: url('../css/fondos/fondo_debian.png');">
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

      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#versiones">Versiones</a>
      </li>

      <?php include_once '../php_codigo/atras.php';?>
      <?php include_once '../php_codigo/salir_sesion.php';?>

    </ul>

    <!-- Contenidos del menu -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active" class="col-xs-2 col-sm-2 col-md-4"><br>
        <h3>HOME</h3>
        <?php echo "<h3>Pagina principal de la distribucion $_GET[nomso] donde encontrara sus diferentes versiones</h3>"; ?>

      </div>

      <div id="versiones" class="container tab-pane fade"><br>
        <h3>Versiones</h3><br>
        <div class="row">

          <?php include_once '../php_codigo/versiones.php';?>

        </div>
      </div>
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