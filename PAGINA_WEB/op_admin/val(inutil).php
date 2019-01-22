<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina de control de valoraciones</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/imagenes_icon.css">
  <link rel="stylesheet" type="text/css" media="screen" href="../css/edicion.css" />

</head>

<body>
  <?php
session_start();
if (isset($_SESSION["user"]) && isset($_SESSION["password"]) && $_SESSION["user"] == 'admin') {
    ?>
  <div class="container mt-4">

    <!-- Nav pills -->
    <ul class="nav nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#operaciones">Operaciones</a>
      </li>
      <?php include_once '../php_codigo/atras.php';?>

      <?php include_once '../php_codigo/salir_sesion.php';?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>

        <h3>Bienvenido al lugar relacionado con las operaciones que pues hacer en la tabla valora,
          lo unico que podras hacer y es muy importante es poder eliminar valoraciones.
        </h3>



      </div>

      <div id="operaciones" class="container tab-pane fade"><br>
        <h3>Elimininar valoracion</h3>
        <p>¿Estas seguro de eliminar esta valoracion sobre tu manual?</p>

        <?php if (!isset($_POST["baja"])): ?>
                          <form method="post">

                            <input name="baja" type="submit" value="Eliminar la valoracion" >

                          </form>
<?php else: ?>

                            <?php
$user = $_SESSION["user"];
    //CREATING THE CONNECTION
    $connection = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
    $connection->set_charset("utf8");

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    $query = "DELETE from valora where cod_valora=$_GET[val]";

    if ($result = $connection->query($query)) {
      
        echo "<script>location.href='../administrador/principal.php';</script>";
        die();
    }

    $result->close();
    unset($connection);
    unset($query);

    ?>

<?php endif?>
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