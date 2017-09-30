<!DOCTYPE html>
<html>
<head>
<title>Paqueteinformes.com - Bienvenidos!</title>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="paqueteinformes">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo "/pqi/frontend" . $CSS;?>/estilos.css">
<script src="<?php echo '/pqi/frontend'.$JS;?>/funciones.js"></script>
</head>


<!-- FACEBOOK -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '141862136411361',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
</script>

<script>
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
</script>

<!-- FACEBOOK -->

<?php 
session_start();
//die(var_dump($_SESSION));
?>
<body>
  <div class="row">
      <div class="col-md-3">
      
      ¡CALENDARIO?
    
      </div>
      <div class="col-md-6">
      <img src="<?php echo '/pqi/frontend' . $IMG?>/logo.png" alt="Logo">
      </div>
      <div class="col-md-3">
      
      </div>
  </div><!-- row-->

<!-- BARRA DE NAVEGACION -->
<?php
require($CLASES_DIR . 'seccion.class.php');

$seccion = New seccion(); 
$secciones = $seccion->listarSecciones();

?>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      	<ul class="nav navbar-nav">
			<?php
		  	foreach($secciones as $sec){?>
				<li><a href="#get con id de la seccion"><?php echo $sec[1];?></a></li>
			<?php
			}
			?>
			<!--<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">VER TODAS<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="#">Secciones</a></li>
				<li><a href="#">Page 1-2</a></li>
				<li><a href="#">Page 1-3</a></li>
			</ul>-->
			</li>
      </ul>
      <div id="notlogged" name="notlogged">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
      </div>
      </ul>
      <div id="logged" name="notlogged" class="oculto">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo '/pqi/frontend'.$PRESENTACION;?>/perfil.php"><span class="glyphicon glyphicon-user"></span></span> Perfil</a></li>
        <li><a href="#" data-toggle="modal" data-target="#modalSuscripcion"><span class="glyphicon glyphicon-upload"></span> Suscribirme</a></li>
        <li><a href="<?php echo '/pqi/frontend'.$PRESENTACION;?>/logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
      </div>

    
    </div>
  </nav>

<!-- MODAL LOGIN -->
  <div id="modalLogin" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingresar</h4>
        </div>
        <div class="modal-body" align="center">
          <form action="<?php echo '/pqi/frontend' . $LOGICA;?>/procesarLogin.php" method="POST" id="formLogin" role="form">
            <div class="form-group input-group col-xs-6">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="mail" id="correo" name="correo" placeholder="Correo" required class="form-control">
            </div>
            <div class="form-group input-group col-xs-6">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" id="pwd" name="pwd" placeholder="Contraseña" required class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" id="btnIngresar" name="btnIngresar" value="Ingresar" class="btn btn-success">
              <a type="button" href="<?php $PRESENTACION?>registro.php" id="btnRegistro"  name="btnRegistro" class="btn btn-primary">Registrarme</a>
            </div>
          </form>
          <!-- FACEBOOK LOGIN BUTTON -->
          <div class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>

        </div><!--modal body-->
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>

    </div>
  </div>


<!--MODAL SUSCRIPCION -->
<div id="modalSuscripcion" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      	<div class="modal-content">
				<div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">¿Por qué suscribirme?</h3>
				</div>
			<div class="modal-body">
				
				<article>
					<p><h4><span class="glyphicon glyphicon-ok"></span> Recibir suplementos en tu correo!</h4></p>
					<p><h4><span class="glyphicon glyphicon-ok"></span> Realizar comentarios en las noticias!</h4></p>
					<h4><span class="glyphicon glyphicon-ok"></span> Utilizar las funciones Me Gusta y Compartir!</h4></p>
				</article>
				
				
				<form class="form-horizontal" action="<?php echo '/pqi/frontend' . $LOGICA;?>/procesarSuscripcion.php" method="POST" id="formSuscripcion" role="form">
					<div class="form-group">
						<label class="control-label col-sm-2" for="t_credito">Tarjeta de Crédito:</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="t_credito" name="t_credito">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="tipo">Periodicidad:</label>
						<div class="col-sm-5">
							<label class="radio-inline"><input type="radio" id="tipo" name="tipo" value="1">Lunes a Domingo</label>
							<label class="radio-inline"><input type="radio" id="tipo" name="tipo" value="2">Sábados y Domingos</label>
							<label class="radio-inline"><input type="radio" id="tipo" name="tipo" value="3">Lu - Mi - Vi</label>	
						</div>
					</div>
					<div class="modal-footer">
						<div class="col-sm-2"></div>
						<div class="form-group col-sm-3">
							<input type="submit" class="form-control btn btn-success" id="btnSuscripcion" name="btnSuscripcion">
						</div>
					</div>
				</form>
					
				
			</div><!--modal body-->
		</div><!--modal content-->
	</div><!--dialog-->
</div><!--modal -->


</body>
<?php
if(isset($_SESSION["logged"]) && ($_SESSION["logged"] == true)){
    echo "Bienvenido! " . $_SESSION['Correo'];
?>
<script>
     logged();
</script>
<?php
}
?>