
<?php
 $user = $_SESSION['user'];

//CREATING THE CONNECTION
$connection4 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection4->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection4->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result4 = $connection4->query("select * from valora;")) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
    <thead>
        <tr>
        <th scope="row">Cod_valora</th>
        <th scope="row">Cod_usuario</th>
        <th scope="row">Cod_manual</th>
        <th scope="row">Fecha_valoracion</th>
        <th scope="row">Valoracion</th>


       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj4 = $result4->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td><a href='../op_admin/val.php?val=$obj4->cod_valora'>".$obj4->cod_valora."</a></td>";
        echo "<td>".$obj4->cod_usuario."</td>";
        echo "<td>".$obj4->cod_manual."</td>";
        echo "<td>".$obj4->fecha_valoracion."</td>";
        echo "<td>".$obj4->valoracion."</td>";
        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result4->close();
    unset($obj4);
    unset($connection4);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

?>

