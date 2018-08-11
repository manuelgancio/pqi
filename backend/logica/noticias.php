<?php
    
    session_start(); 
		
	require($CLASES_DIR . 'noticia.php');
	$claseNoticia = New claseNoticia(); 

        if ($_SESSION['Cargo'] == "Admin") {
          $secc = strip_tags(trim($_POST['seccion']));  
        }
        else{
            $secc = 1;
        }

        $idArticulo = "";
        $titulo = strip_tags(trim($_POST['titulo']));
        $fecha = strip_tags(trim($_POST['fecha']));
        $contenido = strip_tags(trim($_POST['contenido']));
        //$secc = strip_tags(trim($_POST['seccion']));
        $art_d = "";

        $nom = $_SESSION['Nombre'];
        $ape = $_SESSION['Apellido'];

        $autor = $nom . " " . $ape ;
        $likes = "";
        $contador_a = "";


        

    
    if(is_uploaded_file($_FILES["fileToUpload"]["tmp_name"]))
    {
    # Definimos las variables
    $host=$IP_CONT_ESTATICO;
    $port=21;
    $user="usuarioftp";
    $password="Inicio1234";
    $ruta="/var/www/html/img_noticias/";
 
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
    }else
        echo "No ha sido posible conectar con el servidor";
    }else{
       echo "Selecciona un archivo...";
    }
        $imagen = $_FILES["fileToUpload"]["name"];



        $claseNoticia->setIdArticulo($idArticulo);
        $claseNoticia->setTitulo($titulo);
        $claseNoticia->setFechaArticulo($fecha);
        $claseNoticia->setContenido($contenido);
        $claseNoticia->setAutor($autor);
        $claseNoticia->setContador($contador_a);
        $claseNoticia->setImagen($imagen);
        $claseNoticia->setLikes($likes);
        $claseNoticia->setIdSeccion($secc);
        
        $tf = $claseNoticia->ingresarNoticia($idArticulo,$titulo,$fecha,$contenido,$autor,$likes,$contador_a,$secc,$art_d,$imagen); 

        ?>

         <script> 
           window.location.href = "../presentacion/noticias.php"
        </script>   
    
<?php