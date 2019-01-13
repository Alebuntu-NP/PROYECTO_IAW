<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina principal del administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="p_principal.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/border.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
    <?php
session_start();
?>
    <div id="mis_datos" class="menu"><b>MIS DATOS</b></div>
    <div class="submenu"></div>
    <div id="manuales" class="menu"><b>MIS MANUALES</b></div>
    <div class="submenu"></div>
    <div id="salir"><b>SALIR</b></div>


    <script language="JavaScript" type="text/javascript">
        //Function executed when the HTML document is Ready (full loaded)
        $(function () {

            $(".menu").next(".submenu").hide();
            $(".menu").each(function () {

                $(this).click(function () {
                    $(".submenu").hide();
                    $(this).next(".submenu").slideToggle("slow");

                });
            });

            $("#salir").click(function () {
              
                window.location.replace("../login.php");


            });
        });
    </script>

</body>

</html>