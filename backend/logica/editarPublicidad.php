<?php

require($CLASES_DIR . 'publicidad.php');

	$idPublicidad = $_GET['idp'];
	$btn = $_GET['btn'];
	$publicidad = New clasePublicidad();
	
	if($btn == 'h'){
		$fechaHasta = strip_tags($_POST['hasta']);
		$publicidad->cambiarAtrPublicidadHasta($idPublicidad,$fechaHasta); ?>
		<script> 
		window.location.href = "../presentacion/publicidad.php";
		alert(' Publicidad editada correctamente.');
		</script> <?php 

		die();
	}
	elseif($btn == 'd'){
		$fechaDesde = strip_tags($_POST['desde']);
		$publicidad->cambiarAtrPublicidadDesde($idPublicidad,$fechaDesde); 
		?>
		<script> 
	   	window.location.href = "../presentacion/publicidad.php";
	   	alert(' Publicidad editada correctamente.');
	  	</script> 
	  	<?php

	  	die(); 
	}	
	elseif ($btn == 's') {
		$espacio = strip_tags($_POST['espacio']);
		$publicidad->cambiarAtrPublicidadSeccion($idPublicidad,$espacio); 
		?>
		<script> 
	   	window.location.href = "../presentacion/publicidad.php";
	   	alert(' Publicidad editada correctamente.');
	  	</script> 
	  	<?php

	  	die(); 
	}


	