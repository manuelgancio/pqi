<?php
session_start();
require($CLASES_DIR . 'publicidad.php');
$pub = New clasePublicidad();

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

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script src="jquery.ui.datepicker-es.js"></script>

    <script>
    $(function () {
    $("#from").datepicker({
    onClose: function (selectedDate) {
    $("#to").datepicker("option", "minDate", selectedDate);
    }
    });
    $("#to").datepicker({
    onClose: function (selectedDate) {
    $("#from").datepicker("option", "maxDate", selectedDate);
    }
    });
    });
    </script>

  </head>

  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">PQI - Backend</a>
    
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
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Inicio</li>
        </ol>
        
        <div class="col-md-12 well">
        <a class="btn btn-primary" style="margin: 5px;" data-toggle="modal" data-target="#usuario"><i class="fa fa-fw -square -circle fa-plus-square"></i> Publicidad nueva </a>
        </div>

        <div class="fade modal" id="usuario">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h2 class="modal-title" id="myModalLabel">Nueva Publicidad</h2>
              </div>
                <div class="modal-body">                           
              
              <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo $LOGICA;?>publicidad.php" method="POST">
                  <table>
                  <tr>
                  <td> 
                  <label for='sel1'><h6> Lapso de la publicidad:</h6></label>
                  </td>
                  </tr>
                  <tr>
                  <td> 
                  Desde:
                  <input type="date" id="fDesde" name="fDesde" />
                  </td>
                  <td>
                  Hasta:
                  <input type="date" id="fHasta" name="fHasta" />
                  </td>
                  </tr> 
                  <tr>
                  <div>
                  <label for='sel1'><h6> Ingresa seccion:</h6></label>
                    <form>
                    <?php
                    $pub->listarEspacios();
                    ?>

                    </form>
                    <hr class="style1">
                  </div>
                   
                  <div style="margin: 20px;">  
                    <h6>Ingresa la propaganda:</h6>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="text-center center-block well well-sm">
                    <br>
                    
                    <hr class="style1">
                  </div>                  
                  
                  </tr>
                  </table>
                  <br>
                    <hr class="style1">
                  <div style="margin-top: 5px;">
                  <button id="myBtn" type="submit" value="Upload Image" class="btn btn-primary" name="cargar">
                  <i class="fa fa-fw fa-save"></i>Guardar</button>
                  </div>  

                </div>
              </div>
          </div>
        </div>
      <?php  
      

      $pub->publicidades();

      ?>
          </form>

          </div>
        </div>
      </div>

      


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
