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
            window.location.href = "../presentacion/index.php";
            alert('Error!, Correo o contraseña incorrecto!')
        </script>
        <?php
    }else{//Login correcto
        //Verifico si el usuario esta suscripto 

    
        session_start();
        $_SESSION["Correo"] = $correo;
        $_SESSION["logged"] = true;
        ?>
        <script>
            window.location.replace ("../presentacion/index.php");
        </script>
        <?php
    }
}
