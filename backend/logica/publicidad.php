<?php

    session_start(); 
		
	require($CLASES_DIR . 'publicidad.php');
	$clasePublicidad = New clasePublicidad(); 

    $fechaDesde = strip_tags(trim($_POST['fDesde']));
    $fechaHasta = strip_tags(trim($_POST['fHasta']));
    $idEspacio = strip_tags(trim($_POST['espacio']));
    $idEmpleado = $_SESSION['idEmpleado'];


    if(is_uploaded_file($_FILES["fileToUpload"]["tmp_name"]))
	{
    # Definimos las variables
    $host=$IP_CONT_ESTATICO;
    $port=21;
    $user="usuarioftp";
    $password="Inicio1234";
    $ruta="/var/www/html/img_publicidad/";
 
    # Realizamos la conexion con el servidor
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
                if(@ftp_put($conn_id,$_FILES["fileToUpload"]["name"],$_FILES["fileToUpload"]["tmp_name"],FTP_BINARY)){
                ?>
                  <script>
                    alert("Fichero subido correctamente.")
                  </script>
                <?php
                }else
                    echo "No ha sido posible subir el fichero";
            }else
                echo "No existe el directorio especificado";
        }else
            echo "El usuario o la contraseña son incorrectos";
        # Cerramos la conexion ftp
        ftp_close($conn_id);
    }else
        echo "No ha sido posible conectar con el servidor";
	}else{
	    ?>
        <script>
            alert("Selecciona un archivo.")
        </script>
        <?php
    }

    die();
		$publicidad =$_FILES["fileToUpload"]["name"];

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