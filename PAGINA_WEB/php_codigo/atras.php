<?php if (!isset($_POST["atras"])) : ?>
          <form  method="post" class="">
            <input type="submit" name='atras' value="Atras" id="atras" class="btn btn-outline-success">
          </form>
<?php else: ?>
          <?php
            echo "<script type=\"text/javascript\">
            history.go(-2);
        </script>";
         exit;          ?>
<?php endif ?>
   