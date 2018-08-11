<?php
##### http://www.lawebdelprogramador.com #####
 
# Comprovamos que se haya enviado algo desde el formulario
if(is_uploaded_file($_FILES["archivo"]["tmp_name"]))
{
  # Definimos las variables
  $host="192.168.1.128";
  $port=21;
  $user="root";
  $password="Inicio1234";
  $ruta="";
 
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
        if(@ftp_put($conn_id,$_FILES["archivo"]["name"],$_FILES["archivo"]["tmp_name"],FTP_BINARY))
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
?>