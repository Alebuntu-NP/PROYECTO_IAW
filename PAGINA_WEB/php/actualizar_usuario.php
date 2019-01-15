<?php if (!isset($_POST["name"])): ?>


<?php
        
         $user = $_SESSION['user'];
         $pass = $_SESSION['password'];

    

    
    echo $pass;
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
        $query="select *  from usuarios where id ='$user'";
        if ($result = $connection->query($query)) {
        

            //FETCHING OBJECTS FROM THE RESULT SET
            //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
            while ($obj = $result->fetch_object()) {
                //PRINTING EACH ROW
                
                echo '<form method="post">';
         
                echo '<div class="form-group row">';

                echo '<label for="username" class="col-4 col-form-label">Nombre</label>';
                echo '<div class="col-8">';
                echo '<input id="name" name="name"  class="form-control here" type="text" value="'.$obj->nombre.'">';
                echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';

                echo '<label for="lastname" class="col-4 col-form-label">Apellido</label>';
                echo '<div class="col-8">';
                echo '<input id="lastname" name="lastname" class="form-control here" type="text" value="'.$obj->apellido.'">';
                echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';

                echo '<label for="edad" class="col-4 col-form-label">Edad</label>';
                echo '<div class="col-8">';
                echo '<input id="edad" name="edad"  class="form-control here" type="text" value="'.$obj->edad.'">';
                echo '</div>';
                echo '</div>';

                echo '<div class="form-group row">';

                echo '<label for="password" class="col-4 col-form-label">Contraseña</label>';
                echo '<div class="col-8">';
                echo '<input id="password" name="password" placeholder="Nueva contraseña"  class="form-control here" type="text">';
                echo '</div>';

                echo '</div>';
                echo '<div class="form-group row">';

                echo '<div class="offset-4 col-8">';
                echo  '<button name="submit" type="submit" class="btn btn-primary">Actualizar mi perfil</button>';
                echo '</div>';
                echo '</div>';
                echo '</form>';
            }
        
            //Free the result. Avoid High Memory Usages
            $result->close();
            unset($obj);
            unset($connection);
        } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT
        
        
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
if ($pass == $_POST['password']) {

//Si no introduces una nueva contraseña entonces , te quedas con la antigua
    $query = "UPDATE usuarios
set nombre = '$_POST[name]',
	apellido = '$_POST[lastname]',
    edad = $_POST[edad],
    password = md5('$pass')
     where id = '$user'";
} else {
    
// Si introduces una nueva contraseña se te cambia
    $query = "UPDATE usuarios
    set nombre = '$_POST[name]',
        apellido = '$_POST[lastname]',
        edad = $_POST[edad],
        password = md5('$_POST[password]')
         where id = '$user'";
    $_SESSION['password']= $_POST['password'];
}
if ($result = $connection->query($query)) {
    header('Location:pagina_menu.php');
} else {
    echo "Error en consulta";
    echo $query;
}

$result->close();
unset($obj);
unset($connection);

?>

<?php endif?>