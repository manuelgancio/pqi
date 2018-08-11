<?php session_start(); ?>

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
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">PQI - Backend</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          
          <?php
            require($CLASES_DIR . 'usuario.php');
            $user = New userModel();

            if($_SESSION['Categoria'] == "Moderador"){
              $user->menuModerador(); 
            } elseif ($_SESSION['Categoria'] == "Admin") {
              $user->menuAdministrador();
            } elseif ($_SESSION['Categoria'] == "Editor") {
              $user->menuEditor();
            } elseif ($_SESSION['Categoria'] == "Master") {
              $user->menuMaster();
            }

          ?> 
        </ul>
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              
              <i class="fa fa-fw fa-sign-out"></i>
              Cerrar Sesion
            </a>

          </li>

        </ul>
      </div>
    </nav>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Inicio</a>
          </li>
          <li class="breadcrumb-item active">Admin`s</li>
        </ol>

           



<div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Secciones.</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 well">
                        <a class="btn btn-primary" style="margin: 5px;" data-toggle="modal" data-target="#usuario"><i class="fa fa-fw -square -circle fa-plus-square"></i> Nueva Seccion</a>
                    </div>
                    <p>
                    <a href="#">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    </p>
                </div>
            </div>
        </div>
        
        <div class="fade modal" id="usuario">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h2 class="modal-title" id="myModalLabel">Nueva Seccion</h2>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?php echo $LOGICA;?>crearSeccion.php" method="POST">
                            <fieldset>
                                <!-- Form Name -->
                                <!-- Prepended text-->
                              
                                <!-- Nombre -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nombre">Nombre</label>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                
                                            </span>
                                            <input id="nombre" name="nombre" placeholder="Nombre Seccion" type="text" required="">
                                        </div>
                                    </div>
                                </div>

                                

                              

                              
                  

                                <!-- File Button -->
                                <!-- Password input-->
                                <div class="form-group">
                                   
                                    <div style="margin-left: 315px;">
                                    <button id="myBtn" type="submit" class="btn btn-primary">
                                        <i class="fa fa-fw fa-save"></i>Guardar</button>
                                </div>
                                </div>  
                                
                                <!-- Button -->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
  <?php
  
    require($CLASES_DIR . 'seccion.php');
    $seccion = New claseSeccion();
    $seccion->secciones();
  ?>

      </div>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Backend - Paqueteinformes - Proyecto 2017. </small>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ta luego.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Desea cerrar Sesion?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="<?php echo $LOGICA;?>cerrarSesion.php">Aceptar</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/sb-admin.min.js"></script>

  </body>

</html>