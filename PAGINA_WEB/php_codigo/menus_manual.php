
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
$query="select man.nombre as nomm , man.* from  manuales man 
join para par on man.cod_manual = par.cod_manual 
join sistema_operativo so on par.cod_so = so.cod_so where so.version = '$_GET[versin]'";

if ($result = $connection->query($query)) {

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" data-toggle="pill" href="#_'.$obj->cod_manual.'">'.$obj->nomm.'</a>';
        echo '</li>';
        //Free the result. Avoid High Memory Usages
    }
    $result->close();
    unset($obj);
    unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>

