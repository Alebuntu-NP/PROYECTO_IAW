<?php if (!isset($_POST["nameso"])): ?>


<?php



echo '<form method="post" enctype="multipart/form-data">';

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

echo '<label for="perfil_so" class="col-4 col-form-label">Perfil del sistema Operativo</label>';
echo '<div class="col-8">';
echo '<input class="form-control" type="file" name="perfil_so" required />';
echo '</div>';
echo '</div>';
echo '<div class="form-group row">';

echo '<label for="fondo_so" class="col-4 col-form-label">Fondo del sistema Operativo</label>';
echo '<div class="col-8">';
echo '<input class="form-control" type="file" name="fondo_so" required />';
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


foreach ($_FILES as $k => $value) {



//Temp file. Where the uploaded file is stored temporary
$tmp_file = $value['tmp_name'];
//Dir where we are going to store the file
if ($k == 'fondo_so') {
$target_dir = "../css/fondos/";
}

else {
  $target_dir = "../css/iconos/";
}
//Full name of the file.
$target_file = strtolower($target_dir . basename($value['name']));
//Can we upload the file
$valid= true;
//Check if the file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $valid = false;
}
//Check the size of the file. Up to 2Mb
if ($value['size'] > (2048000)) {
        $valid = false;
        echo 'Oops!  Your file\'s size is to large.';
    }
//Check the file extension: We need an image not any other different type of file
$file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
  $valid = false;
  echo "Only JPG, JPEG, PNG & GIF files are allowed";
}
if ($valid) {
  var_dump($target_file);
  var_dump($tmp_file);
  var_dump($_FILES);
  //Put the file in its place
  if (!move_uploaded_file($tmp_file, $target_file)) {
    echo "ERROR";
  }
  echo "PRODUCT ADDED";
}

}
/*
//CREATING THE CONNECTION
$connection9 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection9->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection9->connect_errno) {
printf("Connection failed: %s\n", $connection->connect_error);
exit();
}


$query9 = "INSERT INTO sistema_operativo (nombre,version,jahr_de_lanzamiento,perfil_so) VALUES ('$_POST[nameso]','$_POST[versio]',$_POST[lanza],'$target_file')";
if ($result9 = $connection9->query($query9)) {
echo "<script>location.href='../administrador/principal.php';</script>";
die();
} 



$result9->close();
unset($obj9);
unset($connection9);
unset($query9)
 */?>

<?php endif?>