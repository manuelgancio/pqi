<?php

	require($CLASES_DIR . 'usuario.php');
	$user = New userModel(); 

 $idP = $_GET["id"];
 $tipo = $_GET["t"];

if( $tipo == 'adm'){
	
	$ea = $user->eliminar($idP); 
?>
	 <script> 

		  alert(' Usuario eliminado correctamente.');
		  window.location.href = "../presentacion/abmAdmin.php"
  	</script> 
<?php

}

elseif ( $tipo == 'mod'){ 

	$ea = $user->eliminar($idP);
?>	 
	 <script> 
		alert(' Usuario eliminado correctamente.');
		window.location.href = "../presentacion/abmModerador.php"
	 </script>  
<?php	
	 	
} 
elseif ( $tipo == 'edi'){ 

	$ea = $user->eliminar($idP);
?>	 
	 <script> 
		alert(' Usuario eliminado correctamente.');
		window.location.href = "../presentacion/abmEditor.php"
	 </script>  
<?php	
	 	
} 
elseif ( $tipo == 'mas'){ 

	$ea = $user->eliminar($idP);
?>	 
	 <script> 
		alert(' Usuario eliminado correctamente.');
		window.location.href = "../presentacion/abmMaster.php"
	 </script>  
<?php	
	 	
} 
	else{

		?>
	 <script> 
			  alert('no se reconoce el tipo de usuario');
			  
	  	</script> 
	<?php
		
}


    