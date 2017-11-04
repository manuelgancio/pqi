<?php

        session_start(); 
		
	require($CLASES_DIR . 'publicidad.php');
	$clasePublicidad = New clasePublicidad(); 

        $fechaDesde = strip_tags(trim($_POST['fDesde']));
        $fechaHasta = strip_tags(trim($_POST['fHasta']));
        $idEspacio = strip_tags(trim($_POST['espacio']));
        $idEmpleado = $_SESSION['idEmpleado'];

        

    //MANEJO DE IMAGEN
    $target_dir = $PATH ."/uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_POST["cargar"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if ($uploadOk == 1){
            (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file));
            $ruta_img =strtolower($target_file);
            
            $publicidad = "http://localhost/uploads/". basename($_FILES["fileToUpload"]["name"]); 


        }else{   
           echo "No se guardo.";
        }
    }

  /**
    $host="192.168.43.128";
    $port=21;
    $user="santiago";
    $password="Inicio123";
    $ruta="/var/ftp";
 
     Realizamos la conexion con el servidor
    $conn_id=@ftp_connect($host,$port);
    if($conn_id)
    {
        # Realizamos el login con nuestro usuario y contraseña
        if(@ftp_login($conn_id,$user,$password))
        {
            # Canviamos al directorio especificado
            if(@ftp_chdir($conn_id,$ruta))
            {
                # Subimos el fichero
                if(@ftp_put($conn_id,$_FILES["fileToUpload"]["name"],$_FILES["fileToUpload"]["tmp_name"],FTP_BINARY))
                    echo "Fichero subido correctamente";
                else
                    echo "No ha sido posible subir el fichero";
            }else
                echo "No existe el directorio especificado";
        }else
            echo "El usuario o la contraseña son incorrectos";
        # Cerramos la conexion ftp
        ftp_close($conn_id);
    }else{
        echo "No ha sido posible conectar con el servidor";
    }
    **/

        $clasePublicidad->setFechaDesde($fechaDesde);
        $clasePublicidad->setFechaHasta($fechaHasta);
        $clasePublicidad->setPublicacion($publicidad);
        $clasePublicidad->setIdEspacio($idEspacio);
        $clasePublicidad->setIdEmpleado($idEmpleado);

        $tf = $clasePublicidad->ingresarPublicidad($fechaDesde,$fechaHasta,$idEmpleado,$idEspacio,$publicidad); 
        

        ?>

         <script> 
           window.location.href = "../presentacion/publicidad.php"
        </script>   
    
<?php