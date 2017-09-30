<?php
session_start();
if(isset($_POST['btnSuscripcion'])){
    $t_credito = strip_tags($_POST['t_credito']);
    $tipo = $_POST['tipo'];

    //Con el correo del usuario averiguo su id
    require_once($CLASES_DIR . 'usuario.class.php');
    $usu = New usuario();
    
    $correo = $_SESSION['Correo'];
    $usu->setCorreo($correo);
    
    $id_cl = $usu->id();

    //Llamo clase suscripcion
    require_once($CLASES_DIR . 'suscripcion.class.php');
    $sus = New suscripcion();

    //fecha en que se subscribe
    $fecha_i = date('y-m-d');
    $fecha_f ='';//???

    $sus->setIdUsu($id_cl);
    $sus->setTipoSus($tipo);
    $sus->setFechaI($fecha_i);
    $sus->setTcredito($t_credito);

    $susOk = $sus->altaSus();
    
    if($susOk) == true{
        ?>
        <script>
            window.location.href = "../presentacion/index.php";
            alert('La suscripción se realizó correctamente!');
        </script>
        <?php
    }
}