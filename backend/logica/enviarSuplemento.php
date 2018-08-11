<?php

        session_start(); 
		
	    require($CLASES_DIR . 'suplementos.php');
	    $co = New claseSuplementos(); 

        $titulo = strip_tags(trim($_POST['titulo']));
        $suplemento = strip_tags(trim($_POST['tsuscripciones-list']));
        $mensaje = strip_tags(trim($_POST['mensaje']));
        $adjunto = $_FILES['adj']['tmp_name'];
        $nombreAdj = $_FILES['adj']['name'];
        $formatoAdj = $_FILES['adj']['type'];

        $co->setTitulo($titulo);
        $co->setSuplemento($suplemento);
        $co->setMensaje($mensaje);
        $co->setAdjunto($archivo);

        
        $tf = $co->enviarCorreo($suplemento,$titulo,$mensaje,$adjunto,$nombreAdj,$formatoAdj); 
        
        ?>
        <script> 
	       window.location.href = "../presentacion/suplementos.php"
	</script>   
       
<?php
