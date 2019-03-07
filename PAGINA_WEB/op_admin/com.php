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
    <link rel="stylesheet" type="text/css" media="screen" href="../css/principal_admin.css" />
    <?php include_once '../var.php'; ?>

</head>

<body>
  <?php
session_start();
if ( isset($_SESSION["user"]) && isset($_SESSION["password"])  && $_SESSION["grupo"]=='Admin') {
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

                          <?php include_once '../php_codigo/atras.php'; ?>

                            <?php include_once '../php_codigo/salir_sesion.php'; ?>
                        </ul>

                        <div class="tab-content">
                          <div class="container mt-3"><br>

                          <?php if (!isset($_POST["comm"])): ?>

                            <?php



                              echo '<form method="post">';

                              echo '<div class="form-group row">';

                              echo '<label for="comm" class="col-4 col-form-label">Comentario</label>';
                              echo '<div class="col-8">';
                              echo "<input id='comm' name='comm'  class='form-control here' type='text' value='$_GET[com]' maxlength='200' required>";
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
                              $connection1 = new mysqli($db_host, $db_user, $db_password, $db_name);
                              $connection1->set_charset("utf8");

                              //TESTING IF THE CONNECTION WAS RIGHT
                              if ($connection1->connect_errno) {
                              printf("Connection failed: %s\n", $connection->connect_error);
                              exit();
                              }


                              $query1 = "UPDATE comentarios set comentario = '$_POST[comm]' where cod_comentario = $_GET[codcom]";
                              if ($result1 = $connection1->query($query1)) {
                              header("Location: ../administrador/menu_com.php");

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
</body>

</html>