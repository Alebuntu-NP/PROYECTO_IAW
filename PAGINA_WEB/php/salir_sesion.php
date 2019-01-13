<?php if (!isset($_POST["salida"])) : ?>
        <form action="p_principal.php" method="post">
            <input type="submit" name='salida' value="SALIR" id="salir">
        </form>
    <?php else: //phpdestino?>
    <?php
        unset($_SESSION['user']);
        header("location: ../index.php")
    ?>
    <?php endif ?>