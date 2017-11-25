<?php

session_start(); 
		
		require($CLASES_DIR . 'seccion.php');
		$seccion = New claseSeccion(); 

        $nombre = strip_tags(trim($_POST['nombre']));
        
		
        $seccion->setNombre($nombre);
       

        $tf = $seccion->ingresarSeccion($nombre); 
        

        ?>
        <script> 
		  window.location.href = "../presentacion/abmSecciones.php"
		</script> 