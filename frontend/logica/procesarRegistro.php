<?php
session_start();
if(isset($_POST['btnRegistro'])){
    $correo = strip_tags($_POST['correo']);
    $nombre = strip_tags($_POST['nombre']);
    $apellido = strip_tags($_POST['apellido']);
    $tel = strip_tags($_POST['tel']);
    $pwd = strip_tags($_POST{'pwd'});
    $suscripto = 0; 
    if (isset($_POST['pre'])){
        $suscripto = '1';
        $t_credito = strip_tags($_POST['t_credito']);
        $tipo_sus = strip_tags($_POST['tipo']); //tipo suscripcion (1,2,3) // Esto lo guardo en otra clase 
    }
    //Estado usuario = 1 (activo)
    $estado = 1;

    require($CLASES_DIR . 'usuario.class.php');
    $usu = New usuario();  

    $usu->setCorreo($correo);
    //Verifico que el correo no exista en la base
    $correoOk = $usu->correoExistente();
    if ($correoOk == false){//El correo no esta registrado anteriormente, continual el registro
        
        $usu->setNombre($nombre);
        $usu->setApellido($apellido);
        $usu->setTel($tel);
        $usu->setPass($pwd);
        $usu->setEstado($estado);
        
        $registroOk = $usu->registroUsu();
        
        if(isset($_POST['pre'])){
            $usu->setSuscripto($suscripto);
            $usu->setTcredito($t_credito);
        
            //$registroOk tiene el id_cl de la persona registrada
            $id_cl = $registroOk;
            //Si se subscribe..
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
        }else{//guardo en la tabla gratis para indicar que el usuario no esta suscripto
            require_once($CLASES_DIR . 'suscripcion.class.php');
            $sus = New suscripcion();

            $id_cl = $registroOk;
            $sus->setIdUsu($id_cl);

            $noSus = $sus->noSuscribe();
        }
        ?>
        <script>
            window.location.replace ("../presentacion/index.php?err=regOk");
        </script>
        <?php
    }else{//El correo ya estaba registrado
        ?>
        <script>
            window.location.replace("../presentacion/registro.php?err=regC");
            //alert('Error!, El correo ya se encuentra registrado!');
        </script>
        <?php 
    }
}
if(isset($_POST['btnModificar'])){

    $correo_old = $_SESSION['Correo'];

    $correo = strip_tags(trim($_POST['correo']));
    $pass = strip_tags(trim($_POST['pwd']));
    $tel = strip_tags(trim($_POST['tel']));

    //Verifico que el correo no este ingresado
    if($correo != $correo_old){
        require_once($CLASES_DIR . 'usuario.class.php');
        $usu = New usuario();  
    
        $usu->setCorreo($correo);
        //Verifico que el correo no exista en la base
        $correoOk = $usu->correoExistente();

            if($correoOk == true){//el correo esta registrado y no es el anterior de este usuario
                ?>
                <script>
                    window.location.replace("../presentacion/perfil.php?err=correo");
                    //alert('El correo pertenece a otra persona!');
                </script>
                <?php 
            }
    }
    require_once($CLASES_DIR . 'usuario.class.php');
    $usu = New usuario();

    $usu->setCorreo($correo);
    $usu->setTel($tel);
    $usu->setPass($pass);

    $mod = $usu->actualizarPerfil($correo_old);
    
    if ($mod == true){
    ?>
    <script>
        window.location.replace ("../presentacion/perfil.php?err=modOk");
        //alert('Datos modificados correctamente!');
    </script>
    <?php 
    }


}