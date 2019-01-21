
<?php
 $user = $_SESSION['user'];

//CREATING THE CONNECTION
$connection1 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection1->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection1->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result1 = $connection1->query("select * from manuales;")) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
    <thead>
      <tr>
        <th scope="row">Cod_manual</th>
        <th scope="row">Nombre</th>
        <th scope="row">Fecha_publicacion</th>
        <th scope="row">Fecha_revisado</th>
        <th scope="row">N_Pag</th>
        <th scope="row">Dificultad</th>

       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj1 = $result1->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td><a href='../op_admin/man.php?codma=$obj1->cod_manual&nom=$obj1->nombre&fech_pub=$obj1->fecha_publicacion&fech_rev=$obj1->fecha_revisado&pag=$obj1->n_pag&dif=$obj1->dificultad&enl=$obj1->enlace'>".$obj1->cod_manual."</a></td>";
        echo "<td>".$obj1->nombre."</td>";
        echo "<td>".$obj1->fecha_publicacion."</td>";
        echo "<td>".$obj1->fecha_revisado."</td>";
        echo "<td>".$obj1->n_pag."</td>";
        echo "<td>".$obj1->dificultad."</td>";



        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result1->close();
    unset($obj1);
    unset($connection1);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

?>

