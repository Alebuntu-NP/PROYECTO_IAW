
<?php
 $user = $_SESSION['user'];

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
$query="select man.nombre as nomm ,man.cod_manual as cod_man , man.enlace as enl from  manuales man 
join para par on man.cod_manual = par.cod_manual 
join sistema_operativo so on par.cod_so = so.cod_so where so.version = '$_GET[versin]'";

if ($result = $connection->query($query)) {

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        echo '<div id="_'.$obj->cod_man.'" class="container tab-pane fade"><br>';
        echo '<h1>Para ir al manual pinchar en el enlace que viene a continuacion:</h1>';

        echo '<a href="'.$obj->enl.'"><h1>www.'.$obj->nomm.'.com</h1></a>';
    ?>


	
<div class="row">
  <hr>

     <!-- the comment box -->
        <div class="well">
            <h4><i class="fa fa-paper-plane-o"></i> Leave a Comment:</h4>
                <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                 </div>
                 <button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i> Submit</button>
                </form>
        </div>



    

    <?php
        echo '</div>';
        //Free the result. Avoid High Memory Usages
    }
    $result->close();
    unset($obj);
    unset($connection);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>