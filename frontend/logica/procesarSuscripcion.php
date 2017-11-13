
<?php
session_start();
if(isset($_POST['btnSuscripcion'])){
    $t_credito = strip_tags($_POST['t_credito']);
    if (isset($_POST['tipo'])){
        $tipo = $_POST['tipo'];
    }else{
        $tipo = 3; //Por defecto se suscribe lu mi vie
    }
    

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
    
    if($susOk == true){
        $_SESSION['Suscripto'] = true;
    
        
        ?>
        <script>

            window.location.replace ("../presentacion/index.php");
            alert('La suscripción se realizó correctamente!');
            
        </script>
        <?php
    }
}
//cancelar suscripcion
if (isset($_GET['f'])){

    //Con el correo del usuario averiguo su id
    require_once($CLASES_DIR . 'usuario.class.php');
    $usu = New usuario();
    
    $correo = $_SESSION['Correo'];
    $usu->setCorreo($correo);
    
    $id_cl = $usu->id();

    //Llamo clase suscripcion
    require_once($CLASES_DIR . 'suscripcion.class.php');
    $sus = New suscripcion();

    $sus->setIdUsu($id_cl);

    $baja = $sus->bajaSus();
    if($baja == true){
        $_SESSION['Suscripto'] = false;
        ?>
        <script>
            window.location.href = "../presentacion/index.php";
            alert('Se cancelo su suscripción!');
        </script>
        <?php
    }
}