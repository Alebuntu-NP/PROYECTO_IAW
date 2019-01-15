<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/fondo_mas_input.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/ventanas_duracion_corta.css" />


</head>
<body>

<?php

//Open the session
session_start();

if (isset($_SESSION["user"]) && isset($_SESSION["password"]) ) {

    echo "<h1>"."Bienvenido usuario ".$_SESSION['user']."</h1>";
    header("refresh:3;url=pagina_menu.php");

} else {
  session_destroy();
  header("Location: ../login.php");
}


?>

</body>
</html>