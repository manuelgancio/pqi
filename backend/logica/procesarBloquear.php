<?php
/* proceso form bloquear usu */

    $id_p = $_GET['pid'];
    $acc = $_GET['acc'];

   //Llamo clase usuario
   require_once($CLASES_DIR.'usuario.php');

   if($acc == 'act'){ 

    $usuario = new userModel();
    $usuario->setId($id_p);
    $bloquear = $usuario->activar(); 
    ?>
    <script>
    window.location.replace('../presentacion/usrFrontend.php');
    alert('Usuario Activado');
    </script> 
    <?php
    
   }
   elseif($acc == 'blo'){

    $usuario = new userModel();
    $usuario->setId($id_p);
    $bloquear = $usuario->bloquear();
    ?>
    <script>
    window.location.replace('../presentacion/usrFrontend.php');
    alert('Usuario bloqueado');
    </script> 
    <?php
   }
