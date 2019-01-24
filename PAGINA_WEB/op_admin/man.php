<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina de control de manuales</title>
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



    <!-- Tab panes -->
    <div class="tab-content">


    <div class="container"><br>

      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">


                <ul class="nav nav-pills" role="tablist">

                  <?php include_once '../php_codigo/atras.php';?>

                  <?php include_once '../php_codigo/salir_sesion.php';?>
                </ul>

                <div class="tab-content">
                  <div class="container"><br>
                    <?php if (!isset($_POST["name"])): ?>

                    <?php

    echo '<form method="post">';

    echo '<div class="form-group row">';

    echo '<label for="username" class="col-4 col-form-label">Nombre</label>';
    echo '<div class="col-8">';
    echo '<input id="name" name="name"  class="form-control here" type="text" value="' . $_GET['nombrem'] . '"  required>';
    echo '</div>';
    echo '</div>';

    echo '<div class="form-group row">';


    echo '<label for="so" class="col-4 col-form-label">Sistema Operativo</label>';
    echo '<div class="col-8">';
    echo '<input id="so" name="so"  class="form-control here" type="text" value="'.$_GET['nom'].' '.  $_GET['versy'].'" disabled  required>';
    echo '</div>';
    echo '</div>';

    echo '<div class="form-group row">';

    echo '<label for="fechrevis" class="col-4 col-form-label">Fecha revisado</label>';
    echo '<div class="col-8">';
    echo '<input id="fechrevis" name="fechrevis" class="form-control here" type="date" value="' . $_GET['fech_rev'] . '" >';
    echo '</div>';
    echo '</div>';

    echo '<div class="form-group row">';

    echo '<label for="npag" class="col-4 col-form-label">Numero de paginas</label>';
    echo '<div class="col-8">';
    echo '<input id="npag" name="npag"  class="form-control here" type="number" min="1" value="' . $_GET['pag'] . '" required>';
    echo '</div>';
    echo '</div>';

    echo '<div class="form-group row">';
    echo '<label for="dificult" class="col-4 col-form-label">Dificultad</label>';
    echo '<div class="col-8">';
    echo '<input id="dificult" name="dificult"  class="form-control here" type="text" value="' . $_GET['dif'] . '"  required>';
    echo '</div>';
    echo '</div>';

    echo '<div class="form-group row">';
    echo '<label for="enlc" class="col-4 col-form-label">Enlace</label>';
    echo '<div class="col-8">';
    echo '<input id="enlc" name="enlc"  class="form-control here" type="text" value="' . $_GET['enl'] . '"  required>';
    echo '</div>';
    echo '</div>';

    echo '<div class="form-group row">';
    echo '<div class="offset-4 col-8">';
    echo '<button name="registro" type="submit" class="btn btn-primary">Actualizar datos del manual ' . $_GET['nom'] . '</button>';
    echo '</div>';
    echo '</div>';

    echo '</form>';

    ?>


                    <?php else: ?>

                    <?php

    //CREATING THE CONNECTION
    $connection1 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
    $connection1->set_charset("utf8");

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection1->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    $query1 = "UPDATE manuales set nombre = '$_POST[name]',fecha_revisado = '$_POST[fechrevis]',n_pag = $_POST[npag],dificultad = '$_POST[dificult]', enlace = '$_POST[enlc]' where cod_manual = $_GET[codma]";
    if ($result1 = $connection1->query($query1)) {
        header("Location: ../administrador/principal.php");

    }

    $result->close();
    unset($obj);
    unset($connection);
    unset($query)
    ?>

                    <?php endif?>
                  </div>

                </div>
                <hr>

  </div>
              </div>


            </div>
          </div>
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