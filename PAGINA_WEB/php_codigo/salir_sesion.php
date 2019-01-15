<?php if (!isset($_POST["salida"])) : ?>
          <form  method="post" class="p-2 ml-auto my-2 my-lg-0">
            <input type="submit" name='salida' value="SALIR" id="salir" class="btn btn-outline-success my-2 my-sm-0">
          </form>
<?php else: ?>
          <?php
            session_destroy();
            header("Location: ../index.php");
          ?>
<?php endif ?>
   