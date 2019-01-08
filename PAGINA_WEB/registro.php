<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>

        <?php if (!isset($_POST["id"])): ?>

            <form method="post">

                ID: <input type="text" name="id" required>
                Nombre: <input type="text" name="nom" required>
                Apellidos: <input type="text" name="ap" required>
                Edad: <input type="text" name="edad" required>
                Password: <input type="password" name="pass" required>
                <input type="submit" value="Insertar">

            </form>
        <?php else: ?>

    <?php

        //CREATING THE CONNECTION
        $connection = new mysqli("localhost", "admin", "secret1234", "alebuntu");
        $connection->set_charset("utf8");

        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }

        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */



        $query = "insert into clientes (id,nombre,apellido,edad,password,fecha_alta) values ('$_POST[id]','$_POST[nom]','$_POST[ap]','$_POST[edad]','md5($_POST[pass])','')";


        if ($result = $connection->query($query) ) {

    
                echo "<h1>Cliente insertado correctamente</h1>";
        
        
        } 
        else { 
                echo "<h1>Error en consulta</h1>";
        }



        unset($connection);

    ?>

        <?php endif?>

</body>
</html>