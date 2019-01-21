<?php if (!isset($_POST["manname"])): ?>

<?php


echo '<form method="post">';

echo '<div class="form-group row">';

echo '<label for="manname" class="col-4 col-form-label">Nombre</label>';
echo '<div class="col-8">';
echo '<input id="manname" name="manname"  class="form-control here" type="text" value=""  required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="fechpub" class="col-4 col-form-label">Fecha de publicacion</label>';
echo '<div class="col-8">';
echo '<input id="fechpub" name="fechpub" class="form-control here" type="date" value="" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="npag" class="col-4 col-form-label">Numero de paginas</label>';
echo '<div class="col-8">';
echo '<input id="npag" name="npag"  class="form-control here" type="number" value="" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';
echo '<label for="dificult" class="col-4 col-form-label">Dificultad</label>';
echo '<div class="col-8">';
echo '<input id="dificult" name="dificult"  class="form-control here" type="text" value=""  required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';
echo '<label for="enlc" class="col-4 col-form-label">Enlace</label>';
echo '<div class="col-8">';
echo '<input id="enlc" name="enlc"  class="form-control here" type="text" value=""  required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';
echo '<div class="offset-4 col-8">';
echo '<button name="registro" type="submit" class="btn btn-primary">Añadir manual</button>';
echo '</div>';
echo '</div>';

echo '</form>';

?>


<?php else: ?>

<?php

//CREATING THE CONNECTION
$connection8 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection8->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection8->connect_errno) {
printf("Connection failed: %s\n", $connection->connect_error);
exit();
}


$query8 = "INSERT INTO manuales (nombre,fecha_publicacion,n_pag,dificultad,enlace) VALUES ('$_POST[manname]','$_POST[fechpub]',$_POST[npag],'$_POST[dificult]','$_POST[enlc]')";
if ($result8 = $connection8->query($query8)) {
    echo "<script>location.href='./principal.php';</script>";
    die();
}




$result8->close();
unset($obj8);
unset($connection8);
unset($query8)
?>

<?php endif?>