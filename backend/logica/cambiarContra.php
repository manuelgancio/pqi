<?php
	
	require($CLASES_DIR . 'usuario.php');
	$user = New userModel(); 

	$tipo = strip_tags(trim($_POST['inputTipo']));
	$Contra = strip_tags(trim($_POST['InputContra']));
	$IdP = strip_tags(trim($_POST['inputIdp']));

	$ea = $user->cambiarContra($IdP,$Contra,$tipo); 
	


    