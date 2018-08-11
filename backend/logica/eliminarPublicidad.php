<?php
	
	require($CLASES_DIR . 'publicidad.php');
	$claseNoticia = New clasePublicidad(); 
	$idNoticia = $_GET['idp'];

	$claseNoticia->eliminarPublicidad($idNoticia); ?>
	<script> 
		window.location.href = "../presentacion/publicidad.php";
		alert(' Publicidad eliminada correctamente.');
	</script> 
	<?php 
