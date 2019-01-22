<?php if (!isset($_POST["manname"])): ?>

<?php
//CREATING THE CONNECTION
$connection8 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection8->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection8->connect_errno) {
printf("Connection failed: %s\n", $connection->connect_error);
exit();
}

echo '<form method="post">';

echo '<div class="form-group row">';
echo '<label for="manname" class="col-4 col-form-label">Nombre del manual</label>';
echo '<div class="col-8">';
echo '<input id="manname" name="manname"  class="form-control here" type="text" value=""  required>';
echo '</div>';
echo '</div>';


$consulta_sistemas="select nombre , version from sistema_operativo";
if ($result_sistemas = $connection8->query($consulta_sistemas)) {
    echo '<div class="form-group row">';

    echo '<label for="soname" class="col-4 col-form-label">Sistema Operativo</label>';
    echo '<div class="col-8">';
    echo '<select id="soname"name="soname" class="form-control here"  required>';

    while ($obj99 = $result_sistemas->fetch_object()) {
        //PRINTING EACH ROW
        echo "<option value='$obj99->nombre'>".$obj99->nombre."".$obj99->version."</option>";
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




$query8 = "INSERT INTO manuales (nombre,fecha_publicacion,n_pag,dificultad,enlace) VALUES ('$_POST[manname]','$_POST[fechpub]',$_POST[npag],'$_POST[dificult]','$_POST[enlc]')";
if ($result8 = $connection8->query($query8)) {
    $manuales = "select cod_manual as codma from manuales 
    order by cod_manual desc
    limit 1";
    $sistemas = "select cod_so as codso from sistema_operativo where nombre='$_POST[soname]' and version='$_POST[versname]'";


    if ($result77 = $connection8->query($manuales)) {
        $obj77 = $result77->fetch_object();
        $uno=$obj77->codma;

        if ($result88 = $connection8->query($sistemas)) {
            $obj88 = $result88->fetch_object();
            $dos=$obj88->codso;

            $finish="INSERT INTO para (cod_manual,cod_so,version) VALUES ($uno,$dos,'$_POST[versname]')";

            if ($result100 = $connection8->query($finish)) {
                echo "<script>location.href='../administrador/dff.php';</script>";
                die();
            }
        }
    }
}




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