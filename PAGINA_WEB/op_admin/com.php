<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina de control de comentarios</title>
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
      <?php include_once '../php_codigo/atras.php'; ?>

<?php include_once '../php_codigo/salir_sesion.php'; ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
  <h3>Bienvenido al lugar relacionado con las operaciones que pues hacer en la tabla comentarios,
          aqui podras censurar comentarios o si lo prefieres eliminarlos.</h3>
     
   

      </div>
    
      <div id="operaciones" class="container tab-pane fade"><br>
          <h3>Operaciones</h3>
          <p>Aqui estaran las operaciones que podra hacer el admin</p>
          <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">


                  <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="pill" href="#censur">Censurar</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#borrar">Eliminar</a>
                    </li>

                  </ul>

                  <div class="tab-content">
                    <div id="censur" class="container tab-pane active"><br>

                    <?php if (!isset($_POST["comm"])): ?>

<?php



echo '<form method="post">';

echo '<div class="form-group row">';

echo '<label for="comm" class="col-4 col-form-label">Comentario</label>';
echo '<div class="col-8">';
echo "<input id='comm' name='comm'  class='form-control here' type='text' value='$_GET[com]'  required>";
echo '</div>';
echo '</div>';



echo '<div class="form-group row">';
echo '<div class="offset-4 col-8">';
echo '<button name="registro" type="submit" class="btn btn-primary">Censurar el comentario</button>';
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


$query1 = "UPDATE comentarios set comentario = '$_POST[comm]' where cod_comentario = $_GET[codcom]";
if ($result1 = $connection1->query($query1)) {
header("Location: ../administrador/principal.php");

}


$result->close();
unset($obj);
unset($connection);
unset($query)
?>

<?php endif?>




                    <?php

                      ?>
                    </div>
                    <div id="borrar" class="container tab-pane fade"><br>
                      
                    <?php if (!isset($_POST["eliminar"])): ?>
                      <form method="post">
                        <?php echo "<h4>¿Borrar el comentario $_GET[com]?</h4>"; ?>
                        <input name="eliminar" type="submit" value="SI ESTAS SEGURO PINCHAME">

                      </form>
                      <?php else: ?>

                      <?php

                          //CREATING THE CONNECTION
                          $connection = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
                          $connection->set_charset("utf8");

                          //TESTING IF THE CONNECTION WAS RIGHT
                          if ($connection->connect_errno) {
                              printf("Connection failed: %s\n", $connection->connect_error);
                              exit();
                          }

                          $query = "DELETE from comentarios where cod_comentario=$_GET[codcom]";

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
</body>

</html>