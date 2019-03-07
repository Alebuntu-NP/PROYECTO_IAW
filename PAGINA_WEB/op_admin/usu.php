<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina de control de usuarios</title>
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

</head>
<?php include_once '../var.php'; ?>

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
                    <div class="container"><br>
                            <?php if (!isset($_POST["name"])): ?>

                              <?php
            
                                $user = $_GET['mote'];
                                $pass = $_GET['contra'];

                                $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
                                $connection->set_charset("utf8");
            
                                if ($connection->connect_errno) {
                                    printf("Connection failed: %s\n", $connection->connect_error);
                                    exit();
                                }
            
                                $query="select *  from usuarios where id ='$user'";
                                if ($result = $connection->query($query)) {
                                    $obj = $result->fetch_object();

                                    echo '<form method="post">';



                                    echo '<div class="form-group row">';

                                    echo '<label for="mote" class="col-4 col-form-label">Usuario</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="mote" name="mote" class="form-control here" type="text" maxlength="15" value="'.$_GET['mote'].'" required>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '<div class="form-group row">';

                                    echo '<label for="correo" class="col-4 col-form-label">Correo electronico</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="correo" name="correo" placeholder="Nueva correo electronico" maxlength="45" class="form-control here" type="email" value="'.$_GET['correo'].'">';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="form-group row">';

                                    echo '<label for="username" class="col-4 col-form-label">Nombre</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="name" name="name"  class="form-control here" type="text" maxlength="20" value="'.$_GET['nom'].'" required>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '<div class="form-group row">';

                                    echo '<label for="lastname" class="col-4 col-form-label">Apellido</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="lastname" name="lastname" class="form-control here" type="text" maxlength="35" value="'.$_GET['ap'].'" required>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '<div class="form-group row">';

                                    echo '<label for="edad" class="col-4 col-form-label">Edad</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="edad" name="edad"  class="form-control here" type="number" min="1" max="999" value="'.$_GET['edad'].'" required>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '<div class="form-group row">';

                                    echo '<label for="password" class="col-4 col-form-label">Contraseña</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="password" name="password" placeholder="Nueva contraseña" minlength="6" maxlength="24"  class="form-control here" type="password">';
                                    echo '</div>';
                                    echo '</div>';
                 
                                    echo '<div class="form-group row">';
                                    echo '<div class="offset-4 col-8">';
                                    echo  '<button name="registro" type="submit" class="btn btn-primary">Actualizar datos del usuario '.$user.'</button>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</form>';
                
            
              
                                    $result->close();
                                    unset($obj);
                                    unset($connection);
                                    unset($query);
                                } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

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
                      
                                if ($pass == $_POST['password']) {

                                //Si no introduces una nueva contraseña entonces , te quedas con la antigua
                                    $query1 = "UPDATE usuarios set id = '$_POST[mote]',nombre = '$_POST[name]',apellido = '$_POST[lastname]',edad = $_POST[edad],correo_electronico = '$_POST[correo]',password = '$_GET[contra]' where cod_usuario = '$_GET[codsu]'";
                                    if ($result1 = $connection1->query($query1)) {
                                    header("Location: ../administrador/principal.php"); 
                                      exit();
                                    } 
                                } else {
                                    
                                // Si introduces una nueva contraseña se te cambia
                                    $query1 = "UPDATE usuarios set id = '$_POST[mote]',nombre = '$_POST[name]',apellido = '$_POST[lastname]',edad = $_POST[edad],correo_electronico = '$_POST[correo]',password = md5('$_POST[password]') where cod_usuario = '$_GET[codsu]'";
                                    $pass = $_POST['password'];

                                    if ($result1 = $connection1->query($query1)) {
                                       header("Location: ../administrador/principal.php"); 
                                       exit();

                                    }
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
