<?php include_once '../var.php'; ?>

<?php

  //Open the session
  session_start();


$user=$_SESSION["user"];
$pass=$_SESSION["password"];


 //CREATING THE CONNECTION
 $connection2 = new mysqli($db_host, $db_user, $db_password, $db_name);
 $connection2->set_charset("utf8");
    
        //TESTING IF THE CONNECTION WAS RIGHT
        if ($connection2->connect_errno) {
            printf("Connection failed: %s\n", $connection2->connect_error);
            exit();
        }
$query2="select *  from usuarios where id ='$user'";

  if ($result2 = $connection2->query($query2)) {
    $obj2 = $result2->fetch_object();

  if (isset($obj2->id) && isset($obj2->password) && in_array(array('#'), $obj2->id)) {
     
 
          if ($obj2->grupo=='Admin') {
              $_SESSION["grupo"]='Admin';

              echo "<script>location.href='../administrador/index.php';</script>";
              die();
          } elseif ($obj2->grupo=='Usuario') {
              $_SESSION["grupo"]='Usuario';


              echo "<script>location.href='../usuarios/index.php';</script>";
              die();
          }
      } else {
          echo "<script>location.href='./login.php';</script>";
          die();
      }
  
}
        

 ?>
