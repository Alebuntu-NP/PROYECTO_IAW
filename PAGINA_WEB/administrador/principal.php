<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina principal del administrador</title>
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
        <a class="nav-link" data-toggle="pill" href="#perfil">Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#so">Sistemas Operativos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#operaciones">Operaciones</a>
      </li>
      <?php include_once '../php_codigo/salir_sesion.php';?>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
  <h3>Hola administrador que quieres hacer hoy ver tus manuales , cambiarse el perfil, borrar algun usuario, comentario o alguna valoracion,
   añadir algun manual o quitarlo , actualizar  dicho manual , lo que quiera por algo eres el administrador XD.</h3>
     
   

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
      <div id="so" class="container tab-pane fade"><br>


<link rel="stylesheet" type="text/css" media="screen" href="../css/card.css" />
<!-- Sistemas -->
 <section id="team" class="pb-3">
  <div class="container">
    <h5 class="section-title h1">Sistemas Operativos</h5>
  <div class="row">
      <!-- Debian -->

        <div class="col-xs-4 col-sm-3 col-md-2">
          <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p><img class="img-fluid" src="../css/iconos/debian.png" alt="card image"></p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body">
                  <a  href="../pag_sistema_operativo/debian.php?nomso=debian"><h1>Debian</h1></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- ./Debian -->
      <!-- Ubuntu -->

        <div class="col-xs-4 col-sm-3 col-md-2">
          <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p><img class="img-fluid" src="../css/iconos/ubuntu.png" alt="card image"></p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body">
                  <a href="../pag_sistema_operativo/ubuntu.php?nomso=ubuntu"><h1>Ubuntu</h1></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- ./Ubuntu -->
      <!-- Window -->

                    <div class="col-xs-4 col-sm-3 col-md-2">
          <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p><img class="img-fluid" src="../css/iconos/window.jpg" alt="card image"></p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body">
                  <a href="../pag_sistema_operativo/window.php?nomso=window"><h1>Window</h1></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- ./Window -->                        
      <!-- Lfs -->

        <div class="col-xs-4 col-sm-3 col-md-2">
          <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p><img class="img-fluid" src="../css/iconos/lfs.png" alt="card image"></p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body">
                  <a href="../pag_sistema_operativo/lfs.php?nomso=lfs"><h1>LFS</h1></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- ./Lfs -->
      <!-- Android -->

                    <div class="col-xs-4 col-sm-3 col-md-2">
          <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
            <div class="mainflip">
              <div class="frontside">
                <div class="card">
                  <div class="card-body text-center">
                    <p><img class="img-fluid" src="../css/iconos/android.png" alt="card image"></p>
                  </div>
                </div>
              </div>
              <div class="backside">
                <div class="card">
                  <div class="card-body">
                  <a href="../pag_sistema_operativo/android.php?nomso=android"><h1>Android</h1></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- ./Android -->


    </div>
  </div>
  </section>
<!-- Sistemas -->


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
                      <a class="nav-link active" data-toggle="pill" href="#usu">Usuarios</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#manu">Manuales</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#soo">Sistemas Operativos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#coment">Comentarios</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#valor">Valoraciones</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#añadir">Añadir M</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#añadir1">Añadir SO</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#añadir2">Asignar M con SO</a>
                    </li>
                  </ul>

                  <div class="tab-content">
                    <div id="usu" class="container tab-pane active"><br>

                    <?php
                          include_once '../php_codigo/todos_usuarios.php';
                      ?>
                    </div>
                    <div id="manu" class="container tab-pane fade"><br>
                      

                        <?php include_once '../php_codigo/todos_manuales.php';?>

                     
                    </div>
                    <div id="soo" class="container tab-pane fade"><br>

                      <?php include_once '../php_codigo/todos_los_so.php';?>

                    </div>
                    <div id="coment" class="container tab-pane fade"><br>

                    <?php
                          include_once '../php_codigo/todos_comentarios.php';
                      ?>
                    </div>
                    <div id="valor" class="container tab-pane fade"><br>

                    <?php
                          include_once '../php_codigo/todas_valoraciones.php';
                      ?>
                    </div>
                      <div id="añadir" class="container tab-pane fade"><br>
                          <h4>Aqui el administrador puede añadir manuales</h4>
                          <?php include_once '../php_codigo/añadir_manual.php'; ?>
                      </div>
          
                      <div id="añadir1" class="container tab-pane fade"><br>
                          <h4>Asignar un manual a un determinado sistema operativo</h4>
                          <?php include_once '../php_codigo/añadir_sistema_operativo.php'; ?>
                      </div>
                      <div id="añadir2" class="container tab-pane fade"><br>
                          <h4>Asignar un manual a un determinado sistema operativo</h4>
                          <?php include_once '../php_codigo/asignar.php'; ?>
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