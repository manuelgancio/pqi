<?php

session_start();

    if(isset($_SESSION['started'])){
    }
    $ERROR = False;


    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        // Just load index template
    require('..' . $PRESENTACION_DIR . '/index.php');        
    }

    else {
    
        // Load user class
        require($CLASES_DIR . 'usuario.php');
        $user = New userModel(); 
        $username = strip_tags(trim($_POST['correo']));
        $password = strip_tags(trim($_POST['pwd']));

        $_SESSION["Correo"] = $username;

        $user->setUsername($username);
        $user->setPassword($password);


        $user->obtenerIdEmpleado(); 
        
        $ERROR = $user->validate($username,$password);
        
        $CATEGORIA = $user->categoria();
        $_SESSION["Categoria"] = $CATEGORIA;

        if($ERROR == false ){

            ?>

            <script> 
            var PRESENTACIONJS = '<?php echo $PRESENTACION ;?>'
            
            location.href = PRESENTACIONJS + "index.php";

            </script>
            <?php
        }
        elseif ($ERROR==true){
        ?>

            <script> 
            var PRESENTACIONJS = '<?php echo $PRESENTACION ;?>'
            location.href =  PRESENTACIONJS + "perfil.php";
            
            </script>
            <?php
             
            
            
        }
       
    }