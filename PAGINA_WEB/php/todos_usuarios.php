
<?php
session_start();
 $user = $_SESSION['user'];
//CREATING THE CONNECTION
$connection = new mysqli("localhost", "admin", "secret1234", "alebuntu");
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
    <table>
    <thead>
      <tr>
        <th>Cod_Usuario</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Edad</th>
        <th>Id</th>
        <th>Password</th>
        <th>Fecha_alta</th>
       </tr>
    </thead>

<?php

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
        echo "<tr>";
        echo "<td>".$obj->cod_usuario."</td>";
        echo "<td>".$obj->nombre."</td>";
        echo "<td>".$obj->apellido."</td>";
        echo "<td>".$obj->edad."</td>";
        echo "<td>".$obj->id."</td>";
        echo "<td>".$obj->password."</td>";
        echo "<td>".$obj->fecha_alta."</td>";
        echo "</tr>";
    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
echo "</table>";

?>

