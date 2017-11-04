<?php
  $nombre = $_GET["p"];
  $id = $_GET["i"];
  $tipo = $_GET["tip"];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

   
    <meta name="viewport" content="width=device-width, initial-scale=1"> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pqi. Backend</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body class="bg-dark">

  <form action="..<?php echo $LOGICA;?>cambiarContra.php"  method='POST'>  

    <input type="hidden" name="inputIdp" value="<?php echo $id; ?>">
    <input type="hidden" name="inputTipo" value="<?php echo $tipo; ?>">
    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header">        
          
          Cambiar la contraseña de: <?php echo $nombre; ?>

        </div>
        <div class="card-body">
          <div class="text-center mt-4 mb-5">
            <h4>Cambio de contraseña</h4>
            <p>Ingresa una contraseña nueva.</p>
          </div>
          
            <div class="form-group">
              <input class="form-control" id="InputContra" name="InputContra" aria-describedby="emailHelp" placeholder="*************">
            </div>
            <button class="btn btn-primary btn-block" type="submit">Aceptar</button>
          
          <div class="text-center">
            <a class="d-block small mt-3" href="abmAdmin.php">Volver</a>
          </div>
        </div>
      </div>
    </div>

    </form>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
