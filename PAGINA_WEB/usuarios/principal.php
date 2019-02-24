<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina principal del usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/principal_user.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/principal_user.css">
    <?php include_once '../var.php'; ?>

</head>

<body>
  <?php
session_start();
if ( isset($_SESSION["user"]) && isset($_SESSION["password"])  && $_SESSION["grupo"]=='Usuario') {
  ?>
  <div class="container mt-4">

    <!-- Menus -->
    <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#so">Sistema Operativos</a>
      </li>
      
      
      <li class="nav-item">

        <a class="nav-link" data-toggle="pill" href="#perfil">Perfil</a>
      </li>
   
      <?php include_once '../php_codigo/salir_sesion.php';?>

    </ul>

    <!-- Contenidos del menu -->
    <div class="tab-content">
<div id="so" class="container tab-pane active"><br>


<link rel="stylesheet" type="text/css" media="screen" href="../css/card.css" />
<!-- Sistemas -->
  <section id="team" class="pb-3">
  <div  class="container">
    <h5 class="section-title h1" style='background-color:black;border-radius:15px;'>Sistemas Operativos</h5>
   

    <?php include_once '../php_codigo/sistemas_operativos.php'; ?>



   
  </div>
  </section>
<!-- Sistemas -->


</div>
      <div id="perfil" class="container tab-pane fade"><br>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">


                  <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active show" data-toggle="pill" href="#perf">Perfil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#actu">Actualizar perfil</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#mis_comentarios">Mis comentarios</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="pill" href="#baja">Darse de baja</a>
                    </li>

                  </ul>

                  <div class="tab-content">
                    <div id="perf" class="container tab-pane fade active show"><br>
                      <?php include_once '../php_codigo/perfil.php';?>


                    </div>
                    <div id="actu" class="container tab-pane fade"><br>
                      <div class="row">
                        <div class="col-md-12">
                          <?php include_once '../php_codigo/actualizar_usuario.php';?>

                        </div>
                      </div>
                    </div>
                    <div id="mis_comentarios" class="container tab-pane fade"><br>

                        <?php include_once '../php_codigo/tus_comentarios.php';?>


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