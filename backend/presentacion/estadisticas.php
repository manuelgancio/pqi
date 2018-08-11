<?php
  session_start();

  require($CLASES_DIR . 'noticia.php');
  require_once ($CLASES_DIR . 'usuario.php');

  $noticia = New claseNoticia();
  $user = new userModel();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

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
  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#">PQI - Backend</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


        
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
         <?php

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
            <a href="perfil.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Estadisticas</li>
        </ol>

        <table>
        <tr>
          <td> <?php $noticia->ArtVisitas(); ?> </td>
          <td> <?php $noticia->SecVisitas(); ?> </td>
          <td> <?php $noticia->ArtMeGusta(); ?> </td>
        </tr>
        <tr>
          <td> <?php $user->usuariosfb(); ?> </td>
          <td> <?php $user->usuariosNormal(); ?> </td>
        </tr>

    </div>
    <!-- /.content-wrapper -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Backend - Paqueteinformes - Proyecto 2017.</small>
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
