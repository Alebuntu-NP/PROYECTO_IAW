

<?php if (!isset($_GET['codigo2'])): ?> 

<?php

//CREATING THE CONNECTION
$connection2 = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection2->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection2->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result2 = $connection2->query("select * from sistema_operativo  order by nombre ASC ;")) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table table-bordered" style="width:100%;">
    <thead>
      <tr>
        <th scope="row">Nombre</th>
        <th scope="row">Version</th>
        <th scope="row">Año_de_lanzamiento</th>
        <th scope="row">Operacion</th>


       </tr>
    </thead>

<?php


    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj2 = $result2->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td>".$obj2->nombre."</td>";
        echo "<td>".$obj2->version."</td>";
        echo "<td>".$obj2->jahr_de_lanzamiento."</td>";
        echo "<td><form method='POST' action='principal.php?codigo2=$obj2->cod_so'><input type='image' name='eliminar2' src='../css/iconos/eliminar.png' style='width:40px' alt='Submit' class='img-thumbnail' /></form><a href='../op_admin/sis.php?codso=$obj2->cod_so&nom=$obj2->nombre&vers=$obj2->version&lanzamiento=$obj2->jahr_de_lanzamiento'><img src='../css/iconos/editar.png'  style='width:40px' class='img-thumbnail' /></a></td>";
     
        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result2->close();
    unset($obj2);
    unset($connection2);
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

$query = "DELETE from sistema_operativo where cod_so=$_GET[codigo2]";

if ($result = $connection->query($query)) {

  echo "<script>location.href='menu_so.php';</script>";
  die();
}

$result->close();
unset($connection);
unset($query);

?>


<?php endif?> 