<?php if (!isset($_POST["name"])): ?>

                              <?php
            
                                $user = $_SESSION['user'];
                                $pass = $_SESSION['password'];

                                $connection = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
                                $connection->set_charset("utf8");
            
                                if ($connection->connect_errno) {
                                    printf("Connection failed: %s\n", $connection->connect_error);
                                    exit();
                                }
            
                                $query="select *  from usuarios where id ='$user'";
                                if ($result = $connection->query($query)) {
                                    $obj = $result->fetch_object();

                                    echo '<form method="post">';
                                    echo '<div class="form-group row">';

                                    echo '<label for="correo" class="col-4 col-form-label">Correo electronico</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="correo" name="correo" placeholder="Nueva correo electronico"  class="form-control here" type="email" value="'.$obj->correo_electronico.'">';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="form-group row">';

                                    echo '<label for="username" class="col-4 col-form-label">Nombre</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="name" name="name"  class="form-control here" type="text" value="'.$obj->nombre.'" maxlength="24" required>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '<div class="form-group row">';

                                    echo '<label for="lastname" class="col-4 col-form-label">Apellido</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="lastname" name="lastname" class="form-control here" type="text" value="'.$obj->apellido.'" required>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '<div class="form-group row">';

                                    echo '<label for="edad" class="col-4 col-form-label">Edad</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="edad" name="edad"  class="form-control here" type="number" value="'.$obj->edad.'" required>';
                                    echo '</div>';
                                    echo '</div>';

                                    echo '<div class="form-group row">';

                                    echo '<label for="password" class="col-4 col-form-label">Contraseña</label>';
                                    echo '<div class="col-8">';
                                    echo '<input id="password" name="password" placeholder="Nueva contraseña"  class="form-control here" type="password" minlength="12" maxlength="24">';
                                    echo '</div>';
                                    echo '</div>';
                 
                                    echo '<div class="form-group row">';
                                    echo '<div class="offset-4 col-8">';
                                    echo  '<button name="registro" type="submit" class="btn btn-primary">Actualizar mi perfil</button>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</form>';
                
            
              
                                    $result->close();
                                    unset($obj);
                                    unset($connection);
                                    unset($query);
                                } //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

                              ?>


                            <?php else: ?>

                                <?php

                                //CREATING THE CONNECTION
                                $connection1 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
                                $connection1->set_charset("utf8");

                                //TESTING IF THE CONNECTION WAS RIGHT
                                if ($connection1->connect_errno) {
                                    printf("Connection failed: %s\n", $connection->connect_error);
                                    exit();
                                }
                      
                                if ($pass == $_POST['password']) {

                                //Si no introduces una nueva contraseña entonces , te quedas con la antigua
                                    $query1 = "UPDATE usuarios set nombre = '$_POST[name]',apellido = '$_POST[lastname]',edad = $_POST[edad],correo_electronico = '$_POST[correo]',password = md5('$pass')where id = '$user'";
                                    if ($result1 = $connection1->query($query1)) {
                                        header("Location: ./principal.php");
                                    }
                                } else {
                                    
                                // Si introduces una nueva contraseña se te cambia
                                    $query1 = "UPDATE usuarios set nombre = '$_POST[name]',apellido = '$_POST[lastname]',edad = $_POST[edad],correo_electronico = '$_POST[correo]',password = md5('$_POST[password]') where id = '$user'";
                                    $_SESSION['password']= $_POST['password'];

                                    if ($result1 = $connection1->query($query1)) {
                                        header("Location: ./principal.php");
                                    }
                                }


                                $result->close();
                                unset($obj);
                                unset($connection);
                                unset($query)
                                ?>

                            <?php endif?>
