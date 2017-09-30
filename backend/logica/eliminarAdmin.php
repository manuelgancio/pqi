<?php

 require($CLASES_DIR . 'usuario.php');
 $user = New userModel();
 $idP = strip_tags(trim($_POST['idP']));
 $user->setId($idP);
 $ea = $user->eliminarAdmin($idP);
 echo "<script type=\'text/javascript\'>alert(\' Usuario eliminado correctamente. \');</script>";
 ?>
  <script> 
		  window.location.href = "../presentacion/abmAdmin.php"
  </script>   
 <?php

    