<?php
	
	require($CLASES_DIR . 'publicidad.php');
	$publicidad = New clasePublicidad(); 
	$idPublicidad = $_GET['idp'];

	$publicidad->eliminarPublicidad($idPublicidad); ?>
	<script> 
		window.location.href = "../presentacion/publicidad.php";
		alert(' Publicidad eliminada correctamente.');
	</script> 
	<?php 
