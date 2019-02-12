<?php if (!isset($_POST["manname"])): ?>

<?php
//CREATING THE CONNECTION
$connection8 = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection8->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection8->connect_errno) {
printf("Connection failed: %s\n", $connection8->connect_error);
exit();
}

echo '<form method="post" action="menu_manual.php">';

echo '<div class="form-group row">';
echo '<label for="manname" class="col-4 col-form-label">Nombre del manual</label>';
echo '<div class="col-8">';
echo '<input id="manname" name="manname"  class="form-control here" type="text" value=""  required>';
echo '</div>';
echo '</div>';


$consulta_sistemas="select cod_so,nombre , version from sistema_operativo";
if ($result_sistemas = $connection8->query($consulta_sistemas)) {
    echo '<div class="form-group row">';

    echo '<label for="soname" class="col-4 col-form-label">Sistema Operativo</label>';
    echo '<div class="col-8">';
    echo '<select id="soname"name="soname[]" class="form-control here" multiple required>';

    while ($obj99 = $result_sistemas->fetch_object()) {
        //PRINTING EACH ROW
        echo "<option value='$obj99->cod_so'> ".$obj99->nombre." ".$obj99->version."</option>";
    }
    echo '</select>';
    echo '</div>';
    
    echo '</div>';
}






echo '<div class="form-group row">';

echo '<label for="npag" class="col-4 col-form-label">Numero de paginas</label>';
echo '<div class="col-8">';
echo '<input id="npag" name="npag"  class="form-control here" type="number" min="1"  value="1" required>';
echo '</div>';
echo '</div>';

echo '<div class="form-group row">';
echo '<label for="dificult" class="col-4 col-form-label">Dificultad</label>';
echo '<div class="col-8">';
echo '<select id="dificult "name="dificult" class="form-control here"  required>';
$todas_las_dificultades="select distinct dificultad from manuales;";
if ($result_dif = $connection8->query($todas_las_dificultades)) {

    while ($objd = $result_dif->fetch_object()) {


echo "<option value='$objd->dificultad'>$objd->dificultad</option>";
}

}
echo '</select>';


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

$vector_sistem=$_POST['soname'];
//CREATING THE CONNECTION
$connection9 = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection9->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection9->connect_errno) {
printf("Connection failed: %s\n", $connection9->connect_error);
exit();
}

$query9 = "INSERT INTO manuales (nombre,fecha_publicacion,n_pag,dificultad,enlace) VALUES ('$_POST[manname]',CURDATE(),$_POST[npag],'$_POST[dificult]','$_POST[enlc]')";


if ($result9 = $connection9->query($query9)) {
   
    $query9 = $connection9->insert_id;

   for ($i=0; $i < sizeof($vector_sistem) ; $i++) { 

    $query10="INSERT INTO para (cod_so,cod_manual) VALUES ($vector_sistem[$i],$query9)";
    if ($result10 = $connection9->query($query10)) {

     
    } 



}


echo "<script>location.href='menu_manual.php';</script>";
die();
}
 



?>

<?php endif?>