<?php
	
	require($CLASES_DIR . 'noticia.php');
	$noticia = New claseNoticia(); 
	$idNoticia = $_GET['idn'];
	
	$noticia->destacar($idNoticia); ?>
	<script> 
		window.location.href = "../presentacion/noticias.php";
	</script> 
	<?php 
