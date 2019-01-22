<?php if (!isset($_POST["manname"])): ?>

<?php
//CREATING THE CONNECTION
$connection8 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection8->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection8->connect_errno) {
printf("Connection failed: %s\n", $connection8->connect_error);
exit();
}

echo '<form method="post">';

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
        echo "<option value='$obj99->cod_so'>".$obj99->nombre."".$obj99->version."</option>";
    }
    echo '</select>';
    echo '</div>';
    
    echo '</div>';
}





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
echo '<select id="dificult "name="dificult" class="form-control here"  required>
<option value="Muy Facil">Muy Facil</option>
<option value="Facil">Facil</option>
<option value="Medio">Medio</option>
<option value="Dificil">Dificil</option>
<option value="Muy dificil">Muy dificil</option>
</select>';


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
$connection9 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection9->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection9->connect_errno) {
printf("Connection failed: %s\n", $connection9->connect_error);
exit();
}

$query9 = "INSERT INTO manuales (nombre,fecha_publicacion,n_pag,dificultad,enlace) VALUES ('$_POST[manname]','$_POST[fechpub]',$_POST[npag],'$_POST[dificult]','$_POST[enlc]')";
echo $query9;
var_dump($_POST);
echo "HOLA";
if ($result9 = $connection9->query($query9)) {
    $query9 = $connection9->insert_id;

    echo "DENTRO DEL IF";
for ($i=0; $i < sizeof($_POST['soname[$i]']) ; $i++) { 
        $query10="INSERT INTO para (cod_so,cod_manual) VALUES ($_POST[soname[$i]],$query9)";
        
        
        if ($result10 = $connection10->query($query10)) {



                
            # code...
        } else {

            echo "ola";
        }

     
}


echo "ADIOS";


/*$result8->close();
$result_sistemas->close();
unset($obj8);
unset($obj99);
unset($connection8);
unset($query8);
unset($consulta_sistemas);

*/
?>

<?php endif?>