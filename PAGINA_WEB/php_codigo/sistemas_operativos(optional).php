
<?php

//CREATING THE CONNECTION
$connection1 = new mysqli("localhost", "usuario", "2asirtriana", "alebuntu");
$connection1->set_charset("utf8");

//TESTING IF THE CONNECTION WAS RIGHT
if ($connection1->connect_errno) {
    printf("Connection failed: %s\n", $connection->connect_error);
    exit();
}
$query="select distinct nombre from sistema_operativo order by nombre ASC";


//MAKING A SELECT QUERY
/* Consultas de selección que devuelven un conjunto de resultados */
if ($result1 = $connection1->query($query)) {

   echo  "<div class='row'>";

    while ($obj1 = $result1->fetch_object()) {

    ?>
     
     <div class="card" style='background-color:black;margin:10px;border-radius:50%;'>
                    <div class="card-body text-center">
       
     <?php     echo  "<a  style='color: beige;font-family: Lobster;' href='../pag_sistema_operativo/generico.php?nomso=$obj1->nombre&fondo=fondo_por_defecto.jpg'><h1 style=' margin:30px;background-color:transparent;text-shadow: 1px 2px black;'>".$obj1->nombre."</h1></a>"; ?>
   
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