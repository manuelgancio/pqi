<?php
	
	require($CLASES_DIR . 'noticia.php');
	$noticia = New claseNoticia(); 
	$idNoticia = $_GET['idn'];

	$noticia->eliminarNoticia($idNoticia); ?>
	<script> 
		window.location.href = "../presentacion/noticias.php";
		alert(' Noticia eliminada correctamente.');
	</script> 
	<?php 
