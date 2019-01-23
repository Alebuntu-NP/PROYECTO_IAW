


	<?php if (!isset($_POST["enviar"])) : ?>
<form>
<?php

             


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
$query = "select * from sistema_operativo where nombre='$_GET[nomso]' ";

if ($result = $connection->query($query)) {



    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
   echo "<select id='sos' name='sos' >";
    while ($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
    
        echo "<option class='vers' value='$obj->version'><h1>".$obj->version."</h1></option>";
    }
echo "<select>";

echo '<br><br><input type="submit" name="enviar" value="Llevar" />';

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>
</form>

<?php else: //phpdestino?>


    <?php 
        
        
header("Location: ../manuales/manuales.php?codso=$obj->cod_so&versin=$obj->version&nomb=$_GET[nomso]");        ?>
<?php endif ?>