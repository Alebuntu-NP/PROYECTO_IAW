<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pagina del login</title>
  <link rel="stylesheet" type="text/css" media="screen" href="../css/fondo_inicio.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="../css/login.css" />
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>

  <?php
        //FORM SUBMITTED
        if (isset($_POST["user"])) {

          //CREATING THE CONNECTION
            $connection = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }

            //MAKING A SELECT QUERY
            //Password coded with md5 at the database. Look for better options
            $consulta="select * from usuarios where id='$_POST[user]' and password= md5('$_POST[password]')";

            //Test if the query was correct
            //SQL Injection Possible
            //Check http://php.net/manual/es/mysqli.prepare.php for more security
            if ($result = $connection->query($consulta)) {

              //No rows returned
                if ($result->num_rows===0) {

                  echo '<script type="text/javascript"> 
                  alert("No has puesto bien o el usuario o la contraseña");
                  window.location.href="index.php";
                  </script>';
                } else {
                    //VALID LOGIN. SETTING SESSION VARS
                    $_SESSION["user"]=$_POST["user"];
                    $_SESSION["language"]="es";
                    $_SESSION["password"]=$_POST["password"];

                    header("Location: index.php");
                    exit(); 
                }
            } else {
                echo "Wrong Query";
            }
        }
    ?>

  <!------ Include the above in your HEAD tag ---------->
  <div class="container">

<div class="row">

<h1 id="titulo">MANUALES ALEBUNTU</h1>
</div>
    </div>
  <div class="container" style="margin-top:200px">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong> Entra para continuar</strong>
          </div>
          <div class="panel-body">
            <form role="form" action="login.php" method="POST">
              <fieldset>
                <div class="row">
                  <div class="center-block">
                    <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                      alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input class="form-control" placeholder="Usuario" name="user" type="text" autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Entra">
                    </div>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
          <div class="panel-footer ">
            No tienes una cuenta! <a href="registro.php" onClick=""> Registrate aqui </a>
          </div>
        </div>
      </div>
    </div>
    
  </div>

</body>

</html>
