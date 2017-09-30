<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>PQI - Backend. </title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

      <div style="background-color: #FAFAFA; width: 100%;">
        <img style="width: 300px; height: 100px;margin-left: 40%" src="../imagenes/logo.png">
      </div>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Bienvenido!
        </div>
        <div class="card-body">

          
          <form action="perfil.php" method="POST">

            <div class="form-group">
              <label for="exampleInputEmail1">Correo Electronico</label>
              <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" placeholder="Ingrese su direccion de correo.">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contraseña</label>
              <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Aqui su contraseña.">
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  Recordar contraseña.
                </label>
              </div>
            </div>
            
            <input type="submit" class ="form-control btn btn-success" id="btnLogin" name="btnLogin">
          </form>

          <div class="text-center">
            <a class="d-block small" href="forgot-password.html">Olvido su contraseña?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
