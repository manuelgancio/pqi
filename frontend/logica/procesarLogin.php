<?php

if(isset($_POST['btnIngresar'])){
    //Obtengo los datos enviados por post
    $correo = strip_tags($_POST['correo']);
    $pwd = strip_tags($_POST['pwd']);    

    // Load user class
    require($CLASES_DIR . 'usuario.class.php');
    $usuario = New usuario();

    $usuario->setCorreo($correo);
    $usuario->setPass($pwd);

 
        $loginOk = $usuario->login($correo,$pwd);   

        if ($loginOk == false){//Login incorrecto
            ?>
            <script>
                window.location.replace ("../presentacion/index.php?err=loginF");
                //alert('Error!, Correo o contraseña incorrecto!')
            </script>
            <?php
        }else{//Login correcto
            session_start();
            //Verifico si el usuario esta suscripto 
            $estadoSus = $usuario->estadoSuscripcion();
            if($estadoSus == true){//esta suscriptp
                $_SESSION['Suscripto'] = true;
            }else{//no esta suscripto
                $_SESSION['Suscripto'] = false;
            }
            $_SESSION["Correo"] = $correo;
            $_SESSION["logged"] = true;
            $_SESSION['Nombre'] = $loginOk;
            ?>
            <script>
                window.location.replace ("../presentacion/index.php");
            </script>
            <?php
        }
    
}
