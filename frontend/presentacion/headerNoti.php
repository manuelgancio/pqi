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
<link rel="stylesheet" href="<?= $CSS;?>/estilos.css">
<script src="<?= $JS;?>/funciones.js"></script>
</head>
<?php 
session_start();

?>
<!-- BARRA DE NAVEGACION -->
<?php
require_once($CLASES_DIR . 'seccion.class.php');

$seccion = New seccion(); 
$secciones = $seccion->listarSecciones();

?>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      	<ul class="nav navbar-nav">
          <li><a href="<?= $PRESENTACION;?>/index.php"> Inicio</a></li>
      <?php foreach($secciones as $sec): ?>
				<li><a href="<?= $PRESENTACION;?>/seccion.php?id=<?php echo $sec['id_s']?>"><?php echo $sec['nombre'];?></a></li>
      <?php endforeach; ?>
			</li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href=""><span class="glyphicon glyphicon-blog"></span>Blog</a></li>
      </ul>
        <div id="notlogged">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
            </ul>
        </div>
      <div id="logged" class="oculto">
        <ul class="nav navbar-nav navbar-right">
            <li><a id="perfil" name="perfil" href="<?= $PRESENTACION;?>/perfil.php"><span class="glyphicon glyphicon-user"></span></span> <?php echo '  ', $_SESSION['Nombre'];?></a></li>
            <li><a id="suscripto" href="#" data-toggle="modal" data-target="#modalSuscripcion"><span class="glyphicon glyphicon-upload"></span> Suscribirme</a></li>
            <li><a id="btnLogout" href="<?= $PRESENTACION;?>/logout.php" onclick="logoutFb()"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
				    
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
          <form action="<?= $LOGICA;?>/procesarLogin.php" method="POST" id="formLogin" role="form">
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

        </div>
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
				
			<form class="form-horizontal" action="<?= $LOGICA;?>/procesarSuscripcion.php" method="POST" id="formSuscripcion" role="form">
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

if (isset($_SESSION['fb']) && ($_SESSION['fb'] == true)){
	?>
	<script>
	  loggedFb();
	</script>
	<?php
}else
if(isset($_SESSION["logged"]) && ($_SESSION["logged"] == true) && (!isset($_SESSION['loggedfb']))) {
?>
	<script>
     logged();
	</script>
<?php
	if($_SESSION['Suscripto'] == true){
?>
		<script>
		suscripto();
	   </script>
<?php
	}
}