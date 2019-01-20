
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
$query="select man.nombre as nomm ,man.cod_manual as cod_man , man.enlace as enl, par.cod_so as codso 
from  manuales man 
join para par on man.cod_manual = par.cod_manual 
join sistema_operativo so on par.cod_so = so.cod_so where so.version = '$_GET[versin]'";


if ($result = $connection->query($query)) {

        //FETCHING OBJECTS FROM THE RESULT SET
        //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
        while ($obj = $result->fetch_object()) {
            echo '<div id="_'.$obj->cod_man.'" class="container tab-pane fade">';
            echo '<h1>Para ir al manual pinchar en el enlace que viene a continuacion: <a href="'.$obj->enl.'">www.'.$obj->nomm.'.com</h1></a></h1>';
           $namei = "texto_$obj->cod_man";
           $nameo = "estrella0_$obj->cod_man";
           $name5 = "estrella5_$obj->cod_man";
           $name4 = "estrella4_$obj->cod_man";
           $name3 = "estrella3_$obj->cod_man";
           $name2 = "estrella2_$obj->cod_man";
           $name1 = "estrella1_$obj->cod_man";


            ?> <?php if (!isset($_POST["$namei"])): ?>

            <div class="container">
            <hr>
        
                <!-- the comment box -->
            <div class="well">

                        <h4><i class="fa fa-paper-plane-o"></i>Si quieres comenta sobre este manual:</h4>
                            <form role="form"  method="post"  >
                            <div class="form-group">
                                    <?php
                                        echo "<textarea class='form-control'  name=$namei rows='5' cols='50'></textarea>";
                                        
                                        ?>
                                        <link rel="stylesheet" href="../css/estrellas.css">
                                                                
                                    <p class="clasificacion">
                                        <?php
                                            echo "<input id=$name5 type='radio' name=$nameo value='5'><label for=$name5>★</label>";
                                            echo "<input id=$name4 type='radio' name=$nameo value='4'><label for=$name4>★</label>";
                                            echo "<input id=$name3 type='radio' name=$nameo value='3'><label for=$name3>★</label>";
                                            echo "<input id=$name2 type='radio' name=$nameo value='2'><label for=$name2>★</label>";
                                            echo "<input id=$name1 type='radio' name=$nameo value='1'><label for=$name1>★</label>";

                                        ?>
                                          </p>                                 
                            </div>
                            <button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i> Submit</button>
                            </form>
                    </div>
            </div>
    
<?php else: ?>
            
                    <?php
            
            //CREATING THE CONNECTION
            $connection1 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
            $connection1->set_charset("utf8");
            
            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection1->connect_errno) {
                printf("Connection failed: %s\n", $connection1->connect_error);
                exit();
            }
            
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            $cod_usu = "select cod_usuario from usuarios where id='$user' ";
            if ($result1 = $connection1->query($cod_usu)) {
                $obj1 = $result1->fetch_object();
                $añadir_comentario = "INSERT INTO comentarios (comentario, fecha_publicacion,cod_usuario,cod_manual) values ('$_POST[$namei]',CURDATE(),".$obj1->cod_usuario.",".$obj->cod_man.")";
                $añadir_valoracion = "INSERT INTO valora (cod_usuario,cod_manual,fecha_valoracion,valoracion) VALUES (".$obj1->cod_usuario.", ".$obj->cod_man.", CURDATE(), '$_POST[$nameo]')";
                if ($result2 = $connection1->query($añadir_comentario) && $result4 = $connection1->query($añadir_valoracion)  ) {
            
                         ?>              
                    <hr>
            
                    <!-- the comment box -->
                        <div class="well">
                            <h4><i class="fa fa-paper-plane-o"></i> Leave a Comment:</h4>
                            <form role="form"  method="post"  >
                                <div class="form-group">
                                    <textarea class="form-control"   name="comunicacion" rows="5" cols="50"></textarea>
                                
                                        <p class="clasificacion">
                                        <?php
                                            echo "<input id=$name5 type='radio' name=$nameo value='5'><label for=$name5>★</label>";
                                            echo "<input id=$name4 type='radio' name=$nameo value='4'><label for=$name4>★</label>";
                                            echo "<input id=$name3 type='radio' name=$nameo value='3'><label for=$name3>★</label>";
                                            echo "<input id=$name2 type='radio' name=$nameo value='2'><label for=$name2>★</label>";
                                            echo "<input id=$name1 type='radio' name=$nameo value='1'><label for=$name1>★</label>";

                                        ?>
                                        </p>  
                                   
                                 

                                </div>
                                <button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i> Submit</button>
                            </form>
                        </div>
                        
                        <br><br>
                
            <?php
            
                }
           
            }
         
            
            ?>
            
            
<?php endif ?>

   
<?php echo " <h2>Comentarios</h2>";
        //CREATING THE CONNECTION
        $connection3 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
        $connection3->set_charset("utf8");
        
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection3->connect_errno) {
            printf("Connection failed: %s\n", $connection3->connect_error);
            exit();
        }
        
        $mostrar_comentarios = "SELECT commt.comentario as com, commt.fecha_publicacion as fech_pub , usu.nombre as nom from comentarios commt join usuarios usu on commt.cod_usuario = usu.cod_usuario where cod_manual='$obj->cod_man'";
        if ($result3 = $connection3->query($mostrar_comentarios)) {
            while ($obj3 = $result3->fetch_object()) {
                ?>
                          <?php  echo "<p>USUARIO:$obj3->nom  FECHA: $obj3->fech_pub</p>" ?>     
        
                           
                                <div class="card-text">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <?php echo "<div class='card-text'>$obj3->com</div>"; ?>
                                        </div>
                                    </div>
                                </div>
                            <br>
                            <?php
                              
            }
        
        }
        else {
            echo $mostrar_comentarios;
        }
      ?>
<?php
        echo '</div>';

        //Free the result. Avoid High Memory Usages
    }

} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>

