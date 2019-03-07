<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pagina de control de sistemas operativos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/imagenes_icon.css">
  <link rel="stylesheet" type="text/css" media="screen" href="../css/principal_admin.css" />
  <link rel="stylesheet" href="../css/imagenes_de_fondo_y_imagen.css">
  <?php include_once '../var.php'; ?>

</head>

<body>
  <?php
session_start();
if ( isset($_SESSION["user"]) && isset($_SESSION["password"])  && $_SESSION["grupo"]=='Admin') {
  ?>
  <div class="container mt-4">


    <!-- Tab panes -->
    <div class="tab-content">

    <div class="container"><br>


      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">


                <ul class="nav nav-pills" role="tablist">

                  <?php include_once '../php_codigo/atras.php'; ?>

                  <?php include_once '../php_codigo/salir_sesion.php'; ?>

                </ul>

                <div class="tab-content">
                  <div class="container mt-4">

                    <?php if (!isset($_POST["name"])): ?>

                      <?php



                                                        echo '<form method="post" enctype="multipart/form-data">';

                                                        echo '<div class="form-group row">';

                                                        echo '<label for="username" class="col-4 col-form-label">Nombre</label>';
                                                        echo '<div class="col-8">';
                                                        echo '<input id="name" name="name"  class="form-control here" type="text" maxlength="30" value="' . $_GET['nom'] . '"  required>';
                                                        echo '</div>';
                                                        echo '</div>';

                                                        echo '<div class="form-group row">';

                                                        echo '<label for="versi" class="col-4 col-form-label">Version</label>';
                                                        echo '<div class="col-8">';
                                                        echo '<input id="versi" name="versi" class="form-control here" type="text" maxlength="30" value="' . $_GET['vers'] . '" >';
                                                        echo '</div>';
                                                        echo '</div>';

                                                        echo '<div class="form-group row">';

                                                        echo '<label for="lanz" class="col-4 col-form-label">Año de lanzamiento</label>';
                                                        echo '<div class="col-8">';
                                                        echo '<input id="lanz" name="lanz"  class="form-control here" type="number"  value="'.$_GET['lanzamiento'].'" required>';
                                                        echo '</div>';
                                                        echo '</div>';

                                                    //CREATING THE CONNECTION
                                                    $connection1 = new mysqli($db_host, $db_user, $db_password, $db_name);
                                                    $connection1->set_charset("utf8");

                                                    //TESTING IF THE CONNECTION WAS RIGHT
                                                    if ($connection1->connect_errno) {
                                                    printf("Connection failed: %s\n", $connection->connect_error);
                                                    exit();
                                                    }

  
                                                      $query1 = "select perfil_so as foto_perfil , fondo_so as fondo_pantalla from sistema_operativo where cod_so = $_GET[codso] ";
                                                         if ($result1 = $connection1->query($query1)) {
                                                          while ($obj1 = $result1->fetch_object()) {

                                                          echo '<div class="form-group row">';
                                                          echo '<label for="perfil_so" class="col-4 col-form-label">Perfil del sistema Operativo</label>';
                                                          echo '<div class="col-8">';
                                                          

                                                          echo "<input class='form' type='file'  name='perfil_so'  />
                                                          <hr>
                                                          <img class='img-thumbnail' src='$obj1->foto_perfil'/>";
                                                          echo '</div>';
                                                          echo '</div>';
                                                          echo '<div class="form-group row">';
  
                                                          echo '<label for="fondo_so" class="col-4 col-form-label">Fondo del sistema Operativo</label>';
                                                          echo '<div class="col-8">';
                                                          echo "<input class='form' type='file' name='fondo_so' />
                                                          <hr>
                                                          
                                                          <img class='img-thumbnail' src='$obj1->fondo_pantalla' />";
                                                          echo '</div>';
                                                          echo '</div>';
                                                          }
                                                      }
                                                       
                                                        echo '<div class="form-group row">';
                                                        echo '<div class="offset-4 col-8">';
                                                        echo '<button name="registro" type="submit" class="btn btn-primary">Actualizar datos del sistema operativo ' . $_GET['nom'] . '</button>';
                                                        echo '</div>';
                                                        echo '</div>';

                                                        echo '</form>';



                      ?>


                    <?php else: ?>

                      <?php

          foreach ($_FILES as $k => $value) {



                    
                        if ($k == 'perfil_so') {
                              //Temp file. Where the uploaded file is stored temporary
                        $tmp_file = $value['tmp_name'];
                        //Dir where we are going to store the file
                        $target_dir1 = "../css/iconos/";
                        
                        //Full name of the file.
                        $target_file1 = strtolower($target_dir1 . basename($value['name']));
                        //Can we upload the file
                        $valid= true;
                        //Check if the file already exists
                        if (file_exists($target_file1)) {
                          echo "Sorry, file already exists.";
                          $valid = false;
                        }
                        //Check the size of the file. Up to 2Mb
                        if ($value['size'] > (2048000)) {
                                $valid = false;
                                echo 'Oops!  Your file\'s size is to large.';
                            }
                        //Check the file extension: We need an image not any other different type of file
                        $file_extension = pathinfo($target_file1, PATHINFO_EXTENSION); // We get the entension
                        if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
                          $valid = false;
                          echo "Only JPG, JPEG, PNG & GIF files are allowed";
                        }
                        if ($valid) {
                        //echo $target_file1;
                          //var_dump($tmp_file);
                          //var_dump($_FILES);
                          //Put the file in its place
                          if (!move_uploaded_file($tmp_file, $target_file1)) {
                            echo "ERROR";
                          }
                          echo "PRODUCT ADDED";
                        }
                        
                        }
                        
                        else {
                              //Temp file. Where the uploaded file is stored temporary
                        $tmp_file = $value['tmp_name'];
                        //Dir where we are going to store the file
                          $target_dir2 = "../css/fondos/";
                          //Full name of the file.
                        $target_file2 = strtolower($target_dir2 . basename($value['name']));
                        //Can we upload the file
                        $valid= true;
                        //Check if the file already exists
                        if (file_exists($target_file2)) {
                          echo "Sorry, file already exists.";
                          $valid = false;
                        }
                        //Check the size of the file. Up to 2Mb
                        if ($value['size'] > (2048000)) {
                                $valid = false;
                                echo 'Oops!  Your file\'s size is to large.';
                            }
                        //Check the file extension: We need an image not any other different type of file
                        $file_extension = pathinfo($target_file2, PATHINFO_EXTENSION); // We get the entension
                        if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
                          $valid = false;
                          echo "Only JPG, JPEG, PNG & GIF files are allowed";
                        }
                        if ($valid) {
                          echo $target_file2;
                          //var_dump($tmp_file);
                          //var_dump($_FILES);
                          //Put the file in its place
                          if (!move_uploaded_file($tmp_file, $target_file2)) {
                            echo "ERROR";
                          }
                          echo "PRODUCT ADDED";
                        }
                        }
                        
                        
        }

       //CREATING THE CONNECTION
                                                    $connection1 = new mysqli($db_host, $db_user, $db_password, $db_name);
                                                    $connection1->set_charset("utf8");

                                                    //TESTING IF THE CONNECTION WAS RIGHT
                                                    if ($connection1->connect_errno) {
                                                    printf("Connection failed: %s\n", $connection->connect_error);
                                                    exit();
                                                    }


                                                 $query1 = "UPDATE sistema_operativo set nombre = '$_POST[name]',jahr_de_lanzamiento= $_POST[lanz], version = '$_POST[versi]' , perfil_so = '$target_file1' , fondo_so = '$target_file2' where cod_so = $_GET[codso] ";

                                                 $query2 = "UPDATE sistema_operativo set nombre = '$_POST[name]',jahr_de_lanzamiento= $_POST[lanz], version = '$_POST[versi]' where cod_so = $_GET[codso] ";
                                                 $query3 = "UPDATE sistema_operativo set nombre = '$_POST[name]',jahr_de_lanzamiento= $_POST[lanz], version = '$_POST[versi]' , perfil_so = '$target_file1'  where cod_so = $_GET[codso] ";
                                                 $query4 = "UPDATE sistema_operativo set nombre = '$_POST[name]',jahr_de_lanzamiento= $_POST[lanz], version = '$_POST[versi]' , fondo_so = '$target_file2' where cod_so = $_GET[codso] ";
                                                 $query5 = "SELECT fondo_so , perfil_so from sistema_operativo where cod_so = $_GET[codso] ";

if ($result1 = $connection1->query($query5)) {
  $obj = $result1->fetch_object();

  
  echo $obj->perfil_so;
echo $target_file1;
echo $target_file2;
echo $target_dir2;
 
if ($target_file2 != $target_dir2 && $target_file1 != $target_dir1) {


  if ($result2 = $connection1->query($query1)) {
    echo $query1;
    header("Location: ../administrador/menu_so.php");
    die();
  }       

}


elseif ($target_file2 == $target_dir2 && $target_file1 != $target_dir1) {


  if ($result2 = $connection1->query($query3)) {
    echo $query3;
    header("Location: ../administrador/menu_so.php");
    die();
  }       

}

elseif ($target_file1 == $target_dir1 && $target_file2 != $target_dir2) {


  if ($result2 = $connection1->query($query4)) {
    echo $query4;
    header("Location: ../administrador/menu_so.php");
    die();
  }       

}

else  {


  if ($result2 = $connection1->query($query2)) {
    echo $query2;
    header("Location: ../administrador/menu_so.php");
    die();
  }       

}








                                
                                              }
                                            
                 ?>

                    <?php endif?>

                    </div>


                    </div>
                    <hr>
                                                  </div>
                </div>


              
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
  <?php
} 



else {
    session_destroy();
    header("Location: ../INICIO/index.php");
}

?>
</body>

</html>