
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
$query = "SELECT man.nombre as nomm ,man.cod_manual as cod_man , man.enlace as enl, par.cod_so as codso
from  manuales man
join para par on man.cod_manual = par.cod_manual
join sistema_operativo so on par.cod_so = so.cod_so where so.version = '$_GET[versin]'";

if ($result = $connection->query($query)) {

    //FETCHING OBJECTS FROM THE RESULT SET
    //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
    while ($obj = $result->fetch_object()) {
        echo '<div id="_' . $obj->cod_man . '" class="container tab-pane fade">';
        echo '<h1>Para ir al manual pinchar en el enlace que viene a continuacion: <a href="'.$obj->enl.'"  target="_blank">www.'.$obj->nomm . '.com</h1></a></h1>';
        $codma = $obj->cod_man;
        $namei = "texto_$obj->cod_man";
        $nameo = "estrella0_$obj->cod_man";
        $name5 = "estrella5_$obj->cod_man";
        $name4 = "estrella4_$obj->cod_man";
        $name3 = "estrella3_$obj->cod_man";
        $name2 = "estrella2_$obj->cod_man";
        $name1 = "estrella1_$obj->cod_man"; ?> 
    <?php if (!isset($_POST["$namei"])): ?>

        <div class="container">
            <hr>

                <!-- the comment box -->
            <div class="well">

                        <h4><i class="fa fa-paper-plane-o"></i>Si quieres comenta sobre este manual:</h4>
                            <form role="form"  method="post"  >
                            <div class="form-group">
                            <?php echo "<textarea class='form-control'  name=$namei rows='5' cols='50' minlength='10' maxlength='200' required></textarea>"; ?>
                                    
                            <link rel="stylesheet" href="../css/estrellas.css">
                                <p class="clasificacion">
                                    <?php
                                        echo "<input id=$name5 type='radio' name=$nameo value='5'><label for=$name5>★</label>";
        echo "<input id=$name4 type='radio' name=$nameo value='4'><label for=$name4>★</label>";
        echo "<input id=$name3 type='radio' name=$nameo value='3'><label for=$name3>★</label>";
        echo "<input id=$name2 type='radio' name=$nameo value='2'><label for=$name2>★</label>";
        echo "<input id=$name1 type='radio' name=$nameo value='1'><label for=$name1>★</label>"; ?>
                                </p>
                            </div>
                            <button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i>Comentar</button>
                            </form>
                            <br><br>
                    </div>
        </div>
    
    <?php else: ?>

    <?php



        //MAKING A SELECT QUERY
        /* Consultas de selección que devuelven un conjunto de resultados */
        $cod_usu = "SELECT cod_usuario  from usuarios where id='$user' ";
        if ($result1 = $connection->query($cod_usu)) {
            $obj1 = $result1->fetch_object();
                      $codu =  $obj1->cod_usuario;

            $añadir_comentario = "INSERT INTO comentarios (comentario, fecha_publicacion,cod_usuario,cod_manual) values ('$_POST[$namei]',NOW(),$codu,$codma)";
           
            if ($result2 = $connection->query($añadir_comentario)) {

                if (empty($_POST[$nameo])) {
                    $añadir_valoracion = "INSERT INTO valora (cod_manual,cod_usuario,fecha_valoracion,valoracion)  VALUES ($codma,$codu,CURDATE(),0)";

                    } else {
                        $añadir_valoracion = "INSERT INTO valora (cod_manual,cod_usuario,fecha_valoracion,valoracion)  VALUES ($codma,$codu,CURDATE(),$_POST[$nameo])";

                    }


                if ($result3 = $connection->query($añadir_valoracion)) {
                    
                     ?>
                    <hr>

                  
                        <div class="well">
                            <h4><i class="fa fa-paper-plane-o"></i>Si quieres comenta sobre este manual:</h4>
                            <form role="form"  method="post"  >
                                <div class="form-group">
                                <link rel="stylesheet" href="../css/estrellas.css">

                    
                                    <?php

                                        echo "<textarea class='form-control'   name=$namei rows='5' cols='50' minlength='10' maxlength='200' required></textarea>";
                    echo "<p class='clasificacion'>";
                    echo "<input id=$name5 type='radio' name=$nameo value='5'><label for=$name5>★</label>";
                    echo "<input id=$name4 type='radio' name=$nameo value='4'><label for=$name4>★</label>";
                    echo "<input id=$name3 type='radio' name=$nameo value='3'><label for=$name3>★</label>";
                    echo "<input id=$name2 type='radio' name=$nameo value='2'><label for=$name2>★</label>";
                    echo "<input id=$name1 type='radio' name=$nameo value='1'><label for=$name1>★</label>";
                    echo "</p>"; ?>



                                </div>
                                <button type="submit" name="say" value="" class="btn btn-primary"><i class="fa fa-reply"></i> Comentar</button>
                            </form>
                            <br> <br>
                        </div>

                        <br><br>

                        <?php
                }
            } 
        }  ?>


<?php endif?>


<?php echo " <h2>Comentarios</h2>";

        $codma = $obj->cod_man;
        $mostrar_comentarios = "SELECT commt.comentario as com,commt.fecha_publicacion 
        as fech_pub,usu.id as mote
        from comentarios commt
        join usuarios usu
        on commt.cod_usuario = usu.cod_usuario
        where commt.cod_manual=$codma";

        if ($result4 = $connection->query($mostrar_comentarios)) {
            while ($obj2 = $result4->fetch_object()) {
                ?>
                          <?php echo "<p>USUARIO:$obj2->mote  FECHA: $obj2->fech_pub  </p>" ; ?>

                                <div class="card-text">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <?php echo "<div class='card-text'>$obj2->com</div>"; ?>
                                        </div>
                                    </div>
                                </div>
                            <br>
                            <?php
            }
        }
  

         

        echo '</div>';
    }
        //Free the result. Avoid High Memory Usages
    $result->close();
    $result1->close();
    $result2->close();
    $result3->close();
    $result4->close();
    unset($obj);
    unset($obj1);
    unset($obj2);

    unset($connection);

    unset($query);
    unset($cod_usu);
    unset($añadir_comentario);
    unset($añadir_valoracion);
    unset($mostrar_comentarios);



} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>

