<?php

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
        
        //Si se subscribe 
        if(isset($_POST['pre'])){
            $usu->setSuscripto($suscripto);
            $usu->setTcredito($t_credito);
        }
    
        $registroOk = $usu->registroUsu();
        ?>
        <script>
            window.location.href = "../presentacion/index.php";
        </script>
        <?php
    }else{//El correo ya estaba registrado
        ?>
        <script>
            window.location.href = "../presentacion/registro.php";
            alert('Error!, El correo ya se encuentra registrado!');
        </script>
        <?php 
    }
}
