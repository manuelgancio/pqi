<?php
/* proceso form bloquear usu */

    $idComentario = $_GET['idp'];
    $acc = $_GET['acc'];

   //Llamo clase usuario
   require_once($CLASES_DIR.'usuario.php');

   if($acc == 'act'){ 

    $usuario = new userModel();
    $bloquear = $usuario->activarComentario($idComentario); 
    ?>
    <script>
    window.location.replace('../presentacion/usrFrontend.php');
    alert('Comentario Activado');
    </script> 
    <?php
    
   }
   elseif($acc == 'blo'){

    $usuario = new userModel();
    $bloquear = $usuario->bloquearComentario($idComentario);
    ?>
    <script>
    window.location.replace('../presentacion/usrFrontend.php');
    alert('Comentario bloqueado');
    </script> 
    <?php
   }
