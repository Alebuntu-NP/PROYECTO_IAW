<?php if (!isset($_POST["codso"])): ?>


<?php



echo '<form method="post">';

echo '<div class="form-group row">';

echo '<label for="codso" class="col-4 col-form-label">Codigo del Sistema Operativo</label>';
echo '<div class="col-8">';
echo '<input id="codso" name="codso"  class="form-control here" type="number" value=""  required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';

echo '<label for="codman" class="col-4 col-form-label">Codigo del Manual</label>';
echo '<div class="col-8">';
echo '<input id="codman" name="codman" class="form-control here" type="number" value="" required >';
echo '</div>';
echo '</div>';



echo '<div class="form-group row">';
echo '<div class="offset-4 col-8">';
echo '<button name="registro" type="submit" class="btn btn-primary">Asignar</button>';
echo '</div>';
echo '</div>';

echo '</form>';



?>



<?php else: ?>

<?php

//CREATING THE CONNECTION
$connection10 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection10->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection10->connect_errno) {
printf("Connection failed: %s\n", $connection->connect_error);
exit();
}


$query10 = "INSERT INTO para (cod_so,cod_manual) VALUES ($_POST[codso],$_POST[codman])";
if ($result10 = $connection10->query($query10)) {
echo "<script>location.href='../administrador/principal.php';</script>";
die();
} else {
echo $query10;

}




$result10->close();
unset($obj10);
unset($connection10);
unset($query10)
?>

<?php endif?>