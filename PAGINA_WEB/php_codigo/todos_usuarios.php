
<?php
 $user = $_SESSION['user'];

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
if ($result = $connection->query("select * from usuarios;")) {
    ?>

    <!-- PRINT THE TABLE AND THE HEADER -->
    <table class="table">
    <thead>
      <tr>
        <th scope="row">Cod_Usuario</th>
        <th scope="row">Nombre</th>
        <th scope="row">Apellidos</th>
        <th scope="row">Edad</th>
        <th scope="row">Id</th>
        <th scope="row">Fecha_alta</th>
        <th scope="row">Correo_electronico</th>
       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td><a href='../op_admin/usu.php?codsu=$obj->cod_usuario&nom=$obj->nombre&ap=$obj->apellido&edad=$obj->edad&mote=$obj->id&fechalta=$obj->fecha_alta&correo=$obj->correo_electronico&contra=$obj->password'>".$obj->cod_usuario."</a></td>";
        echo "<td>".$obj->nombre."</td>";
        echo "<td>".$obj->apellido."</td>";
        echo "<td>".$obj->edad."</td>";
        echo "<td>".$obj->id."</td>";
        echo "<td>".$obj->fecha_alta."</td>";
        echo "<td>".$obj->correo_electronico."</td>";

        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

?>

