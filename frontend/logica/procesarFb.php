<?php 
//Datos pasados por ajax
if(isset($_GET['id_fb'])){
    $id_fb = $_GET['id_fb'];
}
if(isset($_GET['nombre'])){
    $nombre = $_GET['nombre'];
}


//Verifico si el usuario ya existe
//LLamo a la clase usuario
    require_once($CLASES_DIR .'usuario.class.php');

    $u = new usuario();
    $u ->setId($id_fb);

    $registro = $u->fbUsuExiste();
    /* Si registro == false es la primera vez que el usuario ingresa
       sino devuelve datos del usuario
    */
    if($registro == false){//Usuario nuevo
        //Separo en primer nombre y apellido
        $nombres = explode(chr(32),$nombre);
        $nom = $nombres[0];
        $ape = $nombres[1];
        //Creo correo
        $correo = $nom.$ape.'@'.$id_fb;
        
        //Guardo datos en la base
        $u->setId($id_fb);
        $u->setNombre($nom);
        $u->setApellido($ape);
        $u->setCorreo($correo);

        $r = $u->fbRegistro();//Metodo para registro
        
        if ($r == true){//registro correcto
            session_start();
            $_SESSION["Correo"] = $correo;
            $_SESSION["logged"] = true;
        ?>
        <script>
            console.log('Registro correcto');
            //Redirect Index
            window.location.replace('../presentacion/index.php?fb=true');
        </script>
        <?php
        }else{
            echo 'Error en el registro.';
        }
    }else{
        /*  El usuario ya estaba registrado el la base
            Creo session con el correo del usuario
        */
        $correo =  $registro['corre_c'];
        $_SESSION["Correo"] = $correo;
        $_SESSION["logged"] = true;
        
        //Redirect index
        ?>
        <script>
        window.location.replace('../presentacion/index.php?fb=true');
        console.log('usu registrado');
        </script>
        <?php

    }