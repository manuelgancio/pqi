<?php

	require($CLASES_DIR . 'seccion.php');
	$seccion = New claseSeccion(); 

 $idS = $_GET["id"];
 


	
	$ea = $seccion->eliminar($idS); 
?>
	 <script> 

		  alert(' Seccion eliminada correctamente.');
		  window.location.href = "../presentacion/abmSecciones.php"
  	</script> 


	
