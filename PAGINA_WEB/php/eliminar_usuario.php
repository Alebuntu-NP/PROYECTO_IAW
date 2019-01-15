<?php if (!isset($_POST["baja"])): ?>

<form method="post">

    <input name="baja" type="submit" value="Acepto darme de baja" >

</form>
<?php else: ?>

<?php
    $user = $_SESSION["user"];
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



        $query = "DELETE from usuarios where id='$user'";

        if ($result = $connection->query($query)) {
           

            header('Location: ../login.php');
        } 

        $result->close();
        unset($connection);




    ?>

<?php endif?>