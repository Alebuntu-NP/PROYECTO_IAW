
<?php

//CREATING THE CONNECTION
$connection1 = new mysqli($db_host, $db_user, $db_password, $db_name);
$connection1->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection1->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
$query="select distinct nombre , fondo_so ,perfil_so from sistema_operativo group by nombre order by nombre ASC";


//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result1 = $connection1->query($query)) {

   echo  "<div class='row'>";

    while ($obj1 = $result1->fetch_object()) {

    ?>
     
     <div class="card">
                    <div class="card-body text-center">
                    <?php              echo "<img class='img-thumbnail' style='width:256px;height:256px;' src='$obj1->perfil_so' alt=''>";
       
   echo  "<a  style='color: beige;font-family: Lobster;' href='../pag_sistema_operativo/generico.php?nomso=$obj1->nombre&fondo=$obj1->fondo_so'><h1>".$obj1->nombre."</h1></a>"; ?>
   
    </div>
    </div>
     <?php
    }

echo    "</div>";

    //Free the result. Avoid High Memory Usages
    $result1->close();
    unset($obj1);
    unset($query);
    unset($connection1);
} //END OF THE IF CHECKING IF THE QUERY WAS RIGHT

?>