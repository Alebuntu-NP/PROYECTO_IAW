<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registro</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/registro.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/fondo_mas_input.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/ventanas_duracion_corta.css" />



        
    </head>
    <body>

        <?php if (!isset($_POST["id"])): ?>

            <form method="post">

            <br><h3>Usuario: <input type="text" name="id" maxlength="10" required class="campo"></h3><br><br>
                <h3> Nombre: <input type="text" name="nom" maxlength="20" required class="campo"></h3><br><br>
                <h3>Apellidos: <input type="text" name="ap" maxlength="40" required class="campo"></h3><br><br>
                <h3>Edad: <input type="text" name="edad" maxlength="3" required class="campo"></h3><br><br>
                <h3>Contraseña: <input type="password" name="pass" maxlength="40" required class="campo"></h3><br><br><br>
                <h3><input type="submit" value="Registrar" id="enviar"></h3>

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

        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */


        $query =  "SELECT id from usuarios where id = '$_POST[id]' ";
        $query1 = "INSERT INTO usuarios ( id,nombre , apellido, edad, password,fecha_alta) values ('$_POST[id]','$_POST[nom]','$_POST[ap]','$_POST[edad]',md5('$_POST[pass]'),CURDATE())";


        if ($result = $connection->query($query)) {
            //verificamos si el user exite con un condicional
            if ($result->num_rows == 0) {

                if ($result1 = $connection->query($query1)) {
                    header("refresh:3;url=login.php");
                    echo "<h1>Usuario registrado correctamente</h1>";
                    $result1->close();
                } 

            }
            else {
                //caso contario (else) es porque ese user ya esta registrado
     
                echo '<h1>El usuario ya esta registrado, ingresa otro</h1>';
                header("refresh:3;url=registro.php");
            }
        }
        $result->close();
        unset($connection);
            

    ?>

        <?php endif?>

</body>
</html>