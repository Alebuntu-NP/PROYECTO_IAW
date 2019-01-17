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
    <link rel="stylesheet" href="../css/imagenes_icon.css">

</head>

<body>
  <?php
session_start();
if (isset($_SESSION["user"]) && isset($_SESSION["password"]) && $_SESSION["user"] == 'admin') {
    ?>
  <div class="container">

    <!-- Nav pills -->
    <ul class="nav nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#perfil">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#manuales">Manuales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#operaciones">Operaciones</a>
      </li>
      <?php include_once '../php_codigo/salir_sesion.php';?>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <h3>Home</h3>
     
   

      </div>
      <div id="perfil" class="container tab-pane fade"><br>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">


                  <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="pill" href="#perf">Perfil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#actu">Actualizar perfil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#baja">Darse de baja</a>
                    </li>
                  </ul>

                  <div class="tab-content">
                    <div id="perf" class="container tab-pane active"><br>

                      <?php include_once '../php_codigo/perfil.php';?>

                    </div>
                    <div id="actu" class="container tab-pane fade"><br>
                      <div class="row">
                        <div class="col-md-12">

                          <?php include_once '../php_codigo/actualizar_usuario.php';?>

                        </div>
                      </div>
                    </div>
                    <div id="baja" class="container tab-pane fade"><br>

                      <?php include_once '../php_codigo/eliminar_usuario.php';?>

                    </div>
                  </div>
                  <hr>


                </div>


              </div>
            </div>
          </div>


        </div>


      </div>
      <div id="manuales" class="container tab-pane fade"><br>
          <h3>Manuales</h3><br>
          <div class="row">

            <div class="col-xs-4 col-sm-3 col-md-2"> <a  href="../pag_sistema_operativo/debian.php"><img src="../css/iconos/icono_debian.png" alt="" class="img-fluid"></a></div>
            <div class="col-xs-4 col-sm-3 col-md-2">    <a href="../pag_sistema_operativo/ubuntu.php"><img src="../css/iconos/ubuntu_icono.png" alt="" class="img-fluid"></a></div>
            <div class="col-xs-4 col-sm-3 col-md-2">    <a href="../pag_sistema_operativo/window_10.php"><img src="../css/iconos/window_10.jpg" alt="" class="img-fluid"></a></div>
            <div class="col-xs-4 col-sm-3 col-md-2">    <a href="../pag_sistema_operativo/window_server_2008.php"><img src="../css/iconos/window_server_2008.jpg" alt="" class="img-fluid"></a></div>
            <div class="col-xs-4 col-sm-3 col-md-2">    <a href="../pag_sistema_operativo/window_server_2012.php"><img src="../css/iconos/window_server2012.png" alt="" class="img-fluid"></a></div>
            <div class="col-xs-4 col-sm-3 col-md-2">    <a href="../pag_sistema_operativo/android.php"><img src="../css/iconos/android.png" alt="" class="img-fluid"></a></div>
          </div>
          
      </div>
      <div id="operaciones" class="container tab-pane fade"><br>
          <h3>Operaciones</h3>
          <p>Aqui estaran las operaciones que podra hacer el admin</p>
      </div>
    </div>
  </div>
    <?php
} else {
    session_destroy();
    header("Location: ../login.php");
}

?>
</body>

</html>