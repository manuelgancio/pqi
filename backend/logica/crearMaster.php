<?php

        session_start(); 
		
	require($CLASES_DIR . 'usuario.php');
	$user = New userModel(); 

        $nombre = strip_tags(trim($_POST['nombre']));
        $apellido = strip_tags(trim($_POST['apellido']));
        $telefono = strip_tags(trim($_POST['telefono']));
        $email = strip_tags(trim($_POST['email']));
        $password = strip_tags(trim($_POST['password']));

        $user->setNombre($nombre);
        $user->setApellido($apellido);
        $user->setTelefono($telefono);
        $user->setUsername($email);
        $user->setPassword($password);

        $tf = $user->ingresarMaster($nombre,$apellido,$telefono,$email,$password); 
        

        ?>
        <script> 
		  window.location.href = "../presentacion/abmMaster.php"
	</script>   
       
<?php
