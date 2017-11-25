<?php
/* proceso form bloquear usu */

if (isset($_POST['btnBloquear'])){
    $id_p = $_POST['id_p'];

   //Llamo clase usuario
   require_once($CLASES_DIR.'usuario.php');

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