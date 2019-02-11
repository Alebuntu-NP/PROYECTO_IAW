<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pagina del registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/fondo_inicio.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/ventanas_duracion_corta.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/registro.css" />
        <?php include_once '../var.php'; ?>



    </head>
    <body>

        <?php if (!isset($_POST["id"])): ?>


        <article>
            <section class="container">
                <h1 class="h2 text-center my-3" class="color">Formulario de registro</h1>
                <form  method="post"  name="formulario" id="formulario" autocomplete="off">
                    <fieldset>
                        <legend class="h4 text-center" class="color">
                            Datos Personales
                        </legend>
                        <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" id="id" name="id" class="form-control" placeholder="Escribe tu nombre de usuario" maxlength="15" required>
                        </div>
                        <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Escribe tu nombre" maxlength="24" required>
                        </div>
                        <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" id="ap" name="ap" class="form-control" placeholder="Escribe tus apellidos" required>
                        </div>
                        <div class="form-group">
                        <label>Edad</label>
                        <input type="number" id="edad" name="edad" class="form-control" placeholder="Escribe tu edad" required>
                        </div>
                        <div class="form-group">
                        <label>Correo electronico</label>
                        <input type="email" id="correo" name="correo" class="form-control" placeholder="Escriba su correo electronico" required>
                        </div>
                        <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Escribe tu contraseña"  minlength="6" maxlength="24" required>
                        </div>
                        <div class="form-group text-left">
                        <input type="submit" name='regist'  value="Registrarse" class="btn btn-primary ">
                        <input type="button" name='volver'  value="Volver a login" class="btn btn-primary ">

                        </div>
                        
                    </fieldset>
                </form>
            </section>
        </article>

<?php else: ?>


<?php


        //CREATING THE CONNECTION
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
    $connection->set_charset("utf8");

    //TESTING IF THE CONNECTION WAS RIGHT
    if ($connection->connect_errno) {
        printf("Connection failed: %s\n", $connection->connect_error);
        exit();
    }

    //MAKING A SELECT QUERY
    /* Consultas de selección que devuelven un conjunto de resultados */

    $query = "SELECT id from usuarios where id = '$_POST[id]' ";
    $query1 = "INSERT INTO usuarios (id,nombre,apellido,edad,correo_electronico,password,fecha_alta) values ('$_POST[id]','$_POST[nom]','$_POST[ap]',$_POST[edad],'$_POST[correo]',md5('$_POST[pass]'),CURDATE())";

    if ($result = $connection->query($query)) {
        //verificamos si el user exite con un condicional
        if ($result->num_rows == 0) {
            if ($result1 = $connection->query($query1)) {
                header("refresh:3;url=login.php");
                echo "<h1>Usuario registrado correctamente</h1>";
            }
        } else {
            //caso contario (else) es porque ese user ya esta registrado

            echo '<h1>El usuario ya esta registrado, ingresa otro</h1>';
            header("refresh:3;url=registro.php");
        }
    }
  





?>



    <?php endif?>

    <script>
    $("input:button").click(function(){

        window.location.href = "login.php";

});
    </script>

</body>
</html>