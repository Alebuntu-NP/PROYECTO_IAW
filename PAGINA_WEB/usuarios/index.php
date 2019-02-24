
<?php

//Open the session
session_start();

if ( isset($_SESSION["user"]) && isset($_SESSION["password"])  && $_SESSION["grupo"]=='Usuario') {

    ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
     <link rel="stylesheet" type="text/css" media="screen" href="../css/ventana_trancision2.css" />

    <section class="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <span class="text_1">Bienvenido a</span>
                   
                    <span class="text_2">Manuales Alebuntu
                    <div class="bg_hover">
                    </div>
                    </span>
                
                </div>
            </div>
        </div>
    </section><?php
    header("refresh:4;url=./principal.php");

} else {
    session_destroy();
    header("Location: ../INICIO/index.php");
}

?>

