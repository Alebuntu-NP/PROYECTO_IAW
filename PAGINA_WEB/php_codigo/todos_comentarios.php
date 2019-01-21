
<?php
 $user = $_SESSION['user'];

//CREATING THE CONNECTION
$connection3 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection3->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection3->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result3 = $connection3->query("select * from comentarios;")) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
    <thead>
        <tr>
        <th scope="row">Cod_comentario</th>
        <th scope="row">Cod_usuario</th>
        <th scope="row">Cod_manual</th>
        <th scope="row">Fecha_publicacion</th>
        <th scope="row">Comentario</th>


       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj3 = $result3->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td><a href='../op_admin/com.php?codcom=$obj3->cod_comentario&com=$obj3->comentario'>".$obj3->cod_comentario."</a></td>";
        echo "<td>".$obj3->cod_usuario."</td>";
        echo "<td>".$obj3->cod_manual."</td>";
        echo "<td>".$obj3->fecha_publicacion."</td>";
        echo "<td>".$obj3->comentario."</td>";
        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result3->close();
    unset($obj3);
    unset($connection3);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

?>

