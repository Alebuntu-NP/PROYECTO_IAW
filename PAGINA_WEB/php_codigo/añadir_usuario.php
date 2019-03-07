<?php if (!isset($_POST["id"])): ?>

<?php


echo '<form method="post">';

echo '<div class="form-group row">';
echo '<label for="id" class="col-4 col-form-label">Usuario</label>';
echo '<div class="col-8">';
echo '<input type="text" id="id" name="id" class="form-control" placeholder="Escribe tu nombre de usuario" maxlength="15" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';
echo '<label for="id" class="col-4 col-form-label">Nombre</label>';
echo '<div class="col-8">';
echo '<input type="text" id="nom" name="nom" class="form-control" placeholder="Escribe tu nombre" maxlength="24" required>';
echo '</div>';
echo '</div>';


echo '<div class="form-group row">';

echo '<label for="ap" class="col-4 col-form-label">Apellidos</label>';
echo '<div class="col-8">';
echo '<input type="text" id="ap" name="ap" class="form-control" placeholder="Escribe tus apellidos"  maxlength="35" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="edad" class="col-4 col-form-label">Edad</label>';
echo '<div class="col-8">';
echo '<input type="number" id="edad" name="edad" min="1" max="999" class="form-control" placeholder="Escribe tu edad" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="correo" class="col-4 col-form-label">Correo electronico</label>';
echo '<div class="col-8">';
echo '<input type="email" id="correo" name="correo"  maxlength="45" class="form-control" placeholder="Escriba su correo electronico" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="pass" class="col-4 col-form-label">Contraseña</label>';
echo '<div class="col-8">';
echo '<input type="password" id="pass" name="pass" class="form-control" placeholder="Escribe tu contraseña"  minlength="6" maxlength="24" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';
echo '<label for="grupo" class="col-4 col-form-label">Grupo</label>';
echo '<div class="col-8">';
echo '<select id="grupo "name="grupo" class="form-control here"  required>';



echo "<option value='Admin'>Admin</option>";
echo "<option value='Usuario'>Usuario</option>";

echo '</select>';


echo '</div>';
echo '</div>';


echo '<div class="form-group row">';
echo '<div class="offset-4 col-8">';
echo '<button name="registro" type="submit" class="btn btn-primary">Añadir usuario</button>';
echo '</div>';
echo '</div>';

echo '</form>';

?>


<?php else: ?>


<?php

 include_once '../var.php';

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

$query = "SELECT id from usuarios where id = '$_POST[id]' ";
$query1 = "INSERT INTO usuarios (id,nombre,apellido,edad,correo_electronico,password,fecha_alta,grupo) values ('$_POST[id]','$_POST[nom]','$_POST[ap]',$_POST[edad],'$_POST[correo]',md5('$_POST[pass]'),CURDATE(),'$_POST[grupo]')";

if ($result = $connection->query($query)) {
//verificamos si el user exite con un condicional
if ($result->num_rows == 0) {
    if ($result1 = $connection->query($query1)) {
          echo "<script>location.href='principal.php';</script>";
          die();
    }
} else {
    //caso contario (else) es porque ese user ya esta registrado


    
      echo "<script>location.href='menu_usu.php';</script>";
      die();
      
}
}



?>

<?php endif?>