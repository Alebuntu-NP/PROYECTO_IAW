<?php if (!isset($_POST["enviar"])) : ?>
<?php

             
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
$query = "select * from sistema_operativo where nombre='$_GET[nomso]' order by version ASC ";

if ($result = $connection->query($query)) {


echo    "<form method='post'>";

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
   echo "<select id='sos' name='sos' >";
    while ($obj = $result->fetch_object()) {
        //PRINTING EACH ROW
    
        echo "<option class='vers' value='$obj->version'>".$obj->version."</option>";
    }
echo "<select>";

echo '<br><br><input type="submit" name="enviar" value="Llevar a la version" />';
echo "</form>";

    //Free the result. Avoid High Memory Usages
    $result->close();
    unset($obj);
    unset($connection);
 //END OF THE IF CHECKING IF THE QUERY WAS RIGHT


}
?>
<?php else: //phpdestino?>


    <?php 
    //CREATING THE CONNECTION
$connection = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
$query = "select * from sistema_operativo where nombre='$_GET[nomso]' and version='$_POST[sos]' ";


if ($result = $connection->query($query)) {
    $obj = $result->fetch_object();
        //PRINTING EACH ROW
//header("Location: ../manuales/manuales1.php?codso=$obj->cod_so&versi=$_POST[sos]&nomb=$_GET[nomso]"); 



//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
$query1="select man.nombre as nomm , man.* , par.cod_manual  as codmanis  from  manuales man 
join para par on man.cod_manual = par.cod_manual 
join sistema_operativo so on par.cod_so = so.cod_so where so.version = '$_POST[sos]' order by nomm ASC";

if ($result1 = $connection->query($query1)) {

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT


    echo    "<form method='post' action='../manuales/manuales.php?codso=$obj->cod_so&versi=$_POST[sos]&nomb=$_GET[nomso]'>";

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
   echo "<select id='mans' name='mans' >";
   while ($obj1 = $result1->fetch_object()) {

        //PRINTING EACH ROW
    
        echo "<option class='mans' value='$obj1->codmanis'>".$obj1->nomm."</option>";
    }
echo "<select>";

echo '<br><br><input type="submit" name="enviar" value="Llevar al manual" />';
echo "</form>";
    $result1->close();
    unset($obj1);
    unset($connection1);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT







    
}

?>
<?php endif ?>