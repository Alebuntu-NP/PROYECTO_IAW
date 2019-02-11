<?php
 $user = $_SESSION['user'];


//CREATING THE CONNECTION
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}

//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
$query="select * from usuarios where id ='$user'";
if ($result = $connection->query($query)) {


    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
 
  
        echo '<div class="form-group row">';
        echo '<label for="username" class="col-4 col-form-label">Usuario</label>';
        echo '<div class="col-8">';
        echo '<h4>'.$obj->id.'</h4>';
        echo '</div>';
        echo '<label for="username" class="col-4 col-form-label">Correo electronico</label>';
        echo '<div class="col-8">';
        echo '<h4>'.$obj->correo_electronico.'</h4>';
        echo '</div>';
        echo '<label for="username" class="col-4 col-form-label">Nombre</label>';
        echo '<div class="col-8">';
        echo '<h4>'.$obj->nombre.'</h4>';
        echo '</div>';
        echo '<label for="username" class="col-4 col-form-label">Apellido</label>';
        echo '<div class="col-8">';
        echo '<h4>'.$obj->apellido.'</h4>';
        echo '</div>';
        echo '<label for="username" class="col-4 col-form-label">Edad</label>';
        echo '<div class="col-8">';
        echo '<h4>'.$obj->edad.'</h4>';
        echo '</div>';
        echo '<label for="username" class="col-4 col-form-label">Fecha de alta</label>';
        echo '<div class="col-8">';
        echo '<h4>'.$obj->fecha_alta.'</h4>';
        echo '</div>';
        echo '</div>';
    }

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
