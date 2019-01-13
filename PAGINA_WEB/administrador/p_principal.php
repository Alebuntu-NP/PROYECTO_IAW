<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pagina principal del administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/p_principal_admin.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/fondo_mas_input.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
    <?php
session_start();
?>
    <div id="mis_datos" class="menu"><input type="button" value="MIS DATOS"></div>
    <div id="datos_admin" class="submenu">
        <?php include '../php/datos_del_usuario.php'; ?>
    </div>
    <div id="usuarios" class="menu"><input type="button" value="USUARIOS"></div>
    <div class="submenu">
    <?php include '../php/todos_usuarios.php'; ?>
    </div>
    <div id="mis_manuales" class="menu"><input type="button" value="MIS MANUALES"></div>
    <div class="submenu">
    <div id="manual">
    <img src="../css/iconos/icono_debian.png" alt="">
    <img src="../css/iconos/ubuntu_icono.png" alt="">
    <img src="../css/iconos/window_10.jpg" alt="">
    <img src="../css/iconos/window_server_2008.jpg" alt="">
    <img src="../css/iconos/window_server2012.png" alt="">
    <img src="../css/iconos/citrix.png" alt="">


    </div>

    </div>



    <?php include '../php/salir_sesion.php'; ?>



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

        });
    </script>

</body>

</html>