<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/window_2012.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/icono_atras.css" />

</head>
<body>
<?php session_start();

if (isset($_SESSION["user"])) { ?>
<a href="javascript:history.back()"><img src="../css/iconos/atras.png" alt=""></a>
<?php
} else {
  session_destroy();
  header("Location: ../login.php");
}
?>
</body>
</html>