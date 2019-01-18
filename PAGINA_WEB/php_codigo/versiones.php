
<?php

             

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
$query = "select * from so where nombre like '$_GET[nomso]'";

if ($result = $connection->query($query)) {



    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
    
        echo "<div class='vers'>".$obj->version."</div>";
   

    }


    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
 else {
    echo "error";
}

?>

