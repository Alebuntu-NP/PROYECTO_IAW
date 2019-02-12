<?php if (!isset($_GET['codigo4'])): ?> 



<?php


//CREATING THE CONNECTION
$connection4 = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection4->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection4->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

$query="select id ,man.nombre as nombre,val.fecha_valoracion as fech_val,valoracion, so.nombre as nombreso , so.version as versionso ,cod_valora
from usuarios  usu join valora val 
on usu.cod_usuario = val.cod_usuario 
join manuales man 
on val.cod_manual = man.cod_manual
join para par
on man.cod_manual = par.cod_manual
join sistema_operativo so
on par.cod_so = so.cod_so order by fech_val ASC";
//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result4 = $connection4->query($query)) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table table-bordered" style="width:100%;">
    <thead>
        <tr>
        <th scope="row">Usuario</th>
        <th scope="row">Manual</th>
        <th scope="row">Sistema Operativo</th>
        <th scope="row">Version</th>
        <th scope="row">Fecha_valoracion</th>
        <th scope="row">Valoracion</th>
        <th scope="row">Operacion</th>
       </tr>
    </thead>

    <?php

//FETCHING OBJECTS FROM THE RESULT SET
//THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
while ($obj4 = $result4->fetch_object()) {
    //PRINTING EACH ROW
    echo "<tr>";
    echo "<td>".$obj4->id."</td>";
    echo "<td>".$obj4->nombre."</td>";
    echo "<td>".$obj4->nombreso."</td>";
    echo "<td>".$obj4->versionso."</td>";
    echo "<td>".$obj4->fech_val."</td>";
    echo "<td>".$obj4->valoracion."</td>";
        echo "<td><form method='POST' action='menu_val.php?codigo4=$obj4->cod_valora'><input type='image' name='eliminar2' src='../css/iconos/eliminar.png' style='width:40px' alt='Submit' class='img-thumbnail' /></form></td>";
        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result4->close();
    unset($obj4);
    unset($query);
    unset($connection4);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

?>


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

$query = "DELETE from valora where cod_valora=$_GET[codigo4]";

if ($result = $connection->query($query)) {

  echo "<script>location.href='menu_val.php';</script>";
  die();
}

$result->close();
unset($connection);
unset($query);

?>


<?php endif?> 