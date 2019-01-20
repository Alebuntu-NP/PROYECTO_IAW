<?php if (!isset($_POST["atras"])) : ?>
          <form  method="post" class="">
            <input type="submit" name='atras' value="Volver a mi pagina principal" id="atras" class="btn btn-outline-success">
          </form>
<?php else: ?>
          <?php
  
        header("Location:../usuarios/principal.php");
         exit;          ?>
<?php endif ?>