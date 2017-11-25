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
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    
      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="perfil.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Inicio</span>
            </a>
          </li>


          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span class="nav-link-text">
                Usuarios</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
              <li>
                <a href="abmAdmin.php">Administradores</a>
              </li>
              <li>
                <a href="abmModerador.php">Moderador</a>
              </li>
              <li>
                <a href="abmEditor.php">Editor</a>
              </li>
              <li>
                <a href="abmMaster.php">Master</a>
              </li>
              <li>
                <a href="usrFrontend.php">Front-end</a>
              </li>
            </ul>
          </li>


          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="#">
              <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
              <span class="nav-link-text">Publicidad</span>
            </a>
          </li>

           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="noticias.php">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i>
              <span class="nav-link-text">Noticias</span>
            </a>
          </li>

           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="abmSecciones.php">
            <i class="fa fa-star" aria-hidden="true"></i>
              <span class="nav-link-text">Secciones</span>
            </a>
          </li>
          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="estadisticas.php">
              <i class="fa fa-fw fa-area-chart"></i>
              <span class="nav-link-text">
                Estadisticas</span>
            </a>
          </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-wrench"></i>
              <span class="nav-link-text">
                Configuracion</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
              <li>
                <a href="static-nav.html">- Mi cuenta</a>
              </li>
              <li>
                <a href="static-nav.html">- General</a>
              </li>
            </ul>
          </li>
            
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope"></i>
              <span class="d-lg-none">Messages
                <span class="badge badge-pill badge-primary">12 New</span>
              </span>
              <span class="new-indicator text-primary d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">12</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">New Messages:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>David Miller</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>Jane Smith</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>John Doe</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all messages
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>
              <span class="new-indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">6</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all alerts
              </a>
            </div>
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>

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
                  <label for='sel1'><h6> Ingresa espacio publicitario:</h6></label>
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
          <small>Copyright &copy; PQI 2017</small>
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
