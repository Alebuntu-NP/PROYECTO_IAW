
<?php if (!isset($_GET["codigo"])): ?> 

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
if ($result = $connection->query("select * from usuarios order by fecha_alta ASC ;")) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table table-bordered" style="width:100%;">
    <thead>
      <tr>
      <th scope="row">Usuario</th>
        <th scope="row">Nombre</th>
        <th scope="row">Apellidos</th>
        <th scope="row">Edad</th>
        <th scope="row">Fecha_alta</th>
        <th scope="row">Correo_electronico</th>
        <th scope="row">Operacion</th>

       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        //PRINTING EACH ROW ?>  
     
      <?php

        echo "<tr>";
        echo "<td>".$obj->id."</td>";
        echo "<td>".$obj->nombre."</td>";
        echo "<td>".$obj->apellido."</td>";
        echo "<td>".$obj->edad."</td>";
        echo "<td>".$obj->fecha_alta."</td>";
        echo "<td>".$obj->correo_electronico."</td>";
        echo "<td><form method='POST' action='principal.php?codigo=$obj->cod_usuario'><input type='image' name='eliminar' src='../css/iconos/eliminar.png' style='width:40px' alt='Submit' class='img-thumbnail' /></form><a href='../op_admin/usu.php?codsu=$obj->cod_usuario&nom=$obj->nombre&ap=$obj->apellido&edad=$obj->edad&mote=$obj->id&fechalta=$obj->fecha_alta&correo=$obj->correo_electronico&contra=$obj->password'><img src='../css/iconos/editar.png'  style='width:40px' class='img-thumbnail' /></a></td>";
        echo "</tr>"; 
    }
        echo "</table>";
        ?>
        <?php
    //Free the result. Avoid High Memory Usages
    $result->close();
        unset($obj);
        unset($connection);
    }
//END OF THE IF CHECKING IF THE QUERY WAS RIGHT


?>


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

        $query = "DELETE from usuarios where cod_usuario=$_GET[codigo]";

        if ($result = $connection->query($query)) {
            echo "<script>location.href='principal.php';</script>";
            die();
        }

        $result->close();
        unset($connection);
        unset($query); ?>

<?php endif?> 

