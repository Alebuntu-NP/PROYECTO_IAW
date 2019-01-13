<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<body>
    <?php
    session_start();
    echo "<h1>"."Bienvenido usuario ".$_SESSION['user']."</h1>";
    header("refresh:3;url=p_principal.php");

    ?>
</body>
</html>