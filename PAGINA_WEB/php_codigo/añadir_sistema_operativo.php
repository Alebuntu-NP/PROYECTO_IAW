<?php if (!isset($_POST["nameso"])): ?>


<?php



echo '<form method="post">';

echo '<div class="form-group row">';

echo '<label for="nameso" class="col-4 col-form-label">Nombre</label>';
echo '<div class="col-8">';
echo '<input id="nameso" name="nameso"  class="form-control here" type="text" value=""  required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="versio" class="col-4 col-form-label">Version</label>';
echo '<div class="col-8">';
echo '<input id="versio" name="versio" class="form-control here" type="text" value="" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="lanza" class="col-4 col-form-label">Año de lanzamiento</label>';
echo '<div class="col-8">';
echo '<input id="lanza" name="lanza"  class="form-control here" type="number" value="2000" required>';
echo '</div>';
echo '</div>';


echo '<div class="form-group row">';
echo '<div class="offset-4 col-8">';
echo '<button name="registro" type="submit" class="btn btn-primary">Añadir nuevo sistema operativo</button>';
echo '</div>';
echo '</div>';

echo '</form>';



?>



<?php else: ?>

<?php

//CREATING THE CONNECTION
$connection9 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection9->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection9->connect_errno) {
printf("Connection failed: %s\n", $connection->connect_error);
exit();
}


$query9 = "INSERT INTO sistema_operativo (nombre,version,jahr_de_lanzamiento) VALUES ('$_POST[nameso]','$_POST[versio]',$_POST[lanza])";
if ($result9 = $connection9->query($query9)) {
echo "<script>location.href='../administrador/principal.php';</script>";
die();
} 



$result9->close();
unset($obj9);
unset($connection9);
unset($query9)
?>

<?php endif?>