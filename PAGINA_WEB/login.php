<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/fondo_mas_input.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css" />

    
  </head>
  <body>

    <?php
        //FORM SUBMITTED
        if (isset($_POST["user"])) {

          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "admin", "secret1234", "alebuntu");

          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="select * from usuarios where
          id='".$_POST["user"]."' and password=md5('".$_POST["password"]."');";

          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta)) {

              //No rows returned
              if ($result->num_rows===0) {
                echo "LOGIN INVALIDO";
              } else {
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["language"]="es";
                $_SESSION["password"]="$_POST[password]";

                header("Location: ./index.php");
              }

          } else {
            echo "Wrong Query";
          }
      }
    ?>
<div id='formularios'>
    <form action="login.php" method="post" id='form1'>

      <p>USUARIO: <input name="user" required maxlength="10"></p>
      <p>CONTRASEÑA: <input name="password" type="password" required maxlength="40"></p>
      <input type="submit" value="Entrar">

    </form>
    <form action="registro.php" method="post">

    
      <p><input type="submit" value="Registrarse"></p>

    </form>
  </div>

<div id='portada'>
  <h1>MANUALES ALEBUNTU</h1>
</div>
  </body>
</html>
