
<?php
 $user = $_SESSION['user'];

//CREATING THE CONNECTION
$connection2 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection2->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection2->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result2 = $connection2->query("select * from sistema_operativo;")) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
    <thead>
      <tr>
        <th scope="row">Cod_so</th>
        <th scope="row">Nombre</th>
        <th scope="row">Version</th>
        <th scope="row">Año_de_lanzamiento</th>


       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj2 = $result2->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td><a href='../op_admin/sis.php?codso=$obj2->cod_so&nom=$obj2->nombre&vers=$obj2->version&lanzamiento=$obj2->jahr_de_lanzamiento'>".$obj2->cod_so."</a></td>";
        echo "<td>".$obj2->nombre."</td>";
        echo "<td>".$obj2->version."</td>";
        echo "<td>".$obj2->jahr_de_lanzamiento."</td>";



        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result2->close();
    unset($obj2);
    unset($connection2);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

?>

