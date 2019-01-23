<?php if (!isset($_GET['codigo1'])): ?> 

<?php

//CREATING THE CONNECTION
$connection1 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection1->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection1->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
$query="select man.*,man.nombre as manual , so.nombre ,so.version as version  
from manuales man 
join para par 
on man.cod_manual = par.cod_manual 
join sistema_operativo so 
on par.cod_so = so.cod_so order by manual ASC";
//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result1 = $connection1->query($query)) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
    <thead>
      <tr>
        <th scope="row">Manual</th>
        <th scope="row">Sistema Operativo</th>
        <th scope="row">Version</th>
        <th scope="row">Fecha_revisado</th>
        <th scope="row">N_Pag</th>
        <th scope="row">Dificultad</th>
        <th scope="row">Operacion</th>

       </tr>
    </thead>

<?php

//FETCHING OBJECTS FROM THE RESULT SET
//THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
while ($obj1 = $result1->fetch_object()) {
    //PRINTING EACH ROW
    echo "<tr>";
    echo "<td>".$obj1->manual."</td>";
    echo "<td>".$obj1->nombre."</td>";
    echo "<td>".$obj1->version."</td>";
    echo "<td>".$obj1->fecha_revisado."</td>";
    echo "<td>".$obj1->n_pag."</td>";
    echo "<td>".$obj1->dificultad."</td>";
    
        echo "<td><form method='POST' action='principal.php?codigo1=$obj1->cod_manual'><input type='image' name='eliminar2' src='../css/iconos/eliminar.png' style='width:40px' alt='Submit' class='img-thumbnail' /></form><a href='../op_admin/man.php?nombrem=$obj1->manual&codma=$obj1->cod_manual&nom=$obj1->nombre&fech_pub=$obj1->fecha_publicacion&fech_rev=$obj1->fecha_revisado&pag=$obj1->n_pag&dif=$obj1->dificultad&enl=$obj1->enlace&versy=$obj1->version'><img src='../css/iconos/editar.png'  style='width:40px' class='img-thumbnail' /></a></td>";
        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result1->close();
    unset($obj1);
    unset($query);
    unset($connection1);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

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

$query = "DELETE from manuales where cod_manual=$_GET[codigo1]";

if ($result = $connection->query($query)) {

  echo "<script>location.href='principal.php';</script>";
  die();
}

$result->close();
unset($connection);
unset($query);

?>


<?php endif?> 