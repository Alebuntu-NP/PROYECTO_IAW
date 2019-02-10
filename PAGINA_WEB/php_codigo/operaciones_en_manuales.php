<?php if (!isset($_POST['say'])): ?>

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

if (isset($_POST['mans'])) {

    $_POST['mans'];
} else {
    $_POST['mans']=$_GET['mans'];
   
}




//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
$query = "SELECT man.nombre as nomm ,
man.cod_manual as cod_man ,
man.enlace as enl,
par.cod_so as codso
from  manuales man
join para par on man.cod_manual = par.cod_manual
join sistema_operativo so on par.cod_so = so.cod_so where par.cod_manual = $_POST[mans]";

    if ($result = $connection->query($query)) {

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
        $obj = $result->fetch_object();
        echo '<div id="_' . $obj->cod_man . '" class="container tab-pane active">';
        echo '<h1>Para ir al manual pinchar en el enlace que viene a continuacion: <a href="'.$obj->enl.'"  target="_blank">www.'.$obj->nomm . '.com</h1></a></h1>';


 ?> 
        <div class="container">
            <hr>

                <!-- the comment box -->
            <div class="well">

                  <h4><i class="fa fa-paper-plane-o"></i>Si quieres comenta sobre este manual:</h4>
                  <form role="form"  method="post" action='./manuales.php' >
                                <div class="form-group">
                                    <?php echo "<textarea class='form-control'  name='textocom' rows='5' cols='50' required></textarea>"; ?>
                                    
                                    <link rel="stylesheet" href="../css/estrellas.css">
                            <p class="clasificacion">
                                        <?php
                                            echo "<input id='estrella5' type='radio' name='estrella0' value='5'><label for='estrella5'>★</label>";
                                            echo "<input id='estrella4' type='radio' name='estrella0' value='4'><label for='estrella4'>★</label>";
                                            echo "<input id='estrella3' type='radio' name='estrella0' value='3'><label for='estrella3'>★</label>";
                                            echo "<input id='estrella2' type='radio' name='estrella0' value='2'><label for='estrella2'>★</label>";
                                            echo "<input id='estrella1' type='radio' name='estrella0' value='1'><label for='estrella1'>★</label>"; 
                                        ?>
                            </p>
                        </div>
               <?php echo "<button type='submit' name='say' value='$_POST[mans]' class='btn btn-primary'><i class='fa fa-reply'></i>Comentar</button>" ?>
                  </form>
               <br><br>
            </div>
        </div>
        }
<?php echo " <h2>Comentarios</h2>";

        $codma = $obj->cod_man;
        $mostrar_comentarios = "SELECT commt.comentario as com,commt.fecha_publicacion 
        as fech_pub,usu.id as mote , val.valoracion as valor
        from comentarios commt
        join usuarios usu
        on commt.cod_usuario = usu.cod_usuario
        join valora val
        on usu.cod_usuario = val.cod_usuario
        where commt.cod_manual=$codma order by fech_pub desc";

        if ($result4 = $connection->query($mostrar_comentarios)) {
            while ($obj2 = $result4->fetch_object()) {
                ?>
                          <?php echo "<p>USUARIO: $obj2->mote <-----------> FECHA: $obj2->fech_pub <-----------> PUNTUACION: $obj2->valor / 5 </p>" ; ?>

                                <div class="card-text">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <?php echo "<div class='card-text'>$obj2->com</div>"; ?>
                                        </div>
                                    </div>
                                        <br>
                                </div>;

                        <?php
            }
        }
  

         

    }
?>
    <?php else: ?>

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
         //Consultas de selección que devuelven un conjunto de resultados 
        $cod_usu = "SELECT cod_usuario  from usuarios where id='$user' ";
        $codma= $_POST['say'];
        if ($result1 = $connection->query($cod_usu)) {

            $obj1 = $result1->fetch_object();
                      $codu =  $obj1->cod_usuario;

            $añadir_comentario = "INSERT INTO comentarios (comentario, fecha_publicacion,cod_usuario,cod_manual) values ('$_POST[textocom]',NOW(),$codu,$codma)";
           
            if ($result2 = $connection->query($añadir_comentario)) {

                if (empty($_POST['estrella0'])) {
                    $añadir_valoracion = "INSERT INTO valora (cod_manual,cod_usuario,fecha_valoracion,valoracion)  VALUES ($codma,$codu,CURDATE(),0)";
                    if ($result3 = $connection->query($añadir_valoracion)) {
  
header("Location: ./manuales.php?mans=$codma");
                    }
                    } else {
                        $añadir_valoracion = "INSERT INTO valora (cod_manual,cod_usuario,fecha_valoracion,valoracion)  VALUES ($codma,$codu,CURDATE(),$_POST[estrella0])";
                        if ($result3 = $connection->query($añadir_valoracion)) {
                   
                            header("Location: ./manuales.php?mans=$codma");

                        }
                    }

            } 
        } 
         ?>


<?php endif?>

