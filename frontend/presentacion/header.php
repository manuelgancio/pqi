
<html>
<head>
<title>Paqueteinformes.com - Bienvenidos!</title>
<meta charset="ISO-8859-1"> 
<meta name="description" content="pqi">
<meta name="keywords" content="">
<meta name="author" content="paqueteinformes">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?= $CSS;?>/estilos.css">
<script src="<?= $JS;?>/funciones.js"></script>
<!--FACEBOOK-->
<script type="text/javascript" src="//connect.facebook.net/en_US/sdk.js"></script>
<script src="<?= $JS;?>/fb.js"></script>
<!--CALENDARIO-->
<script src="<?= $JS;?>/calendario.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
</head>
<?php
session_start();
//date_default_timezone_set('America/Montevideo');
$fa= date('Y-m-d');
?>
<body>
<div class="container">
		  <img class="center-block logoimg" src="<?= $CONT_ESTATICO?>/logo01.fw.png" alt="Logo">

</div><!--container-->

<!-- BARRA DE NAVEGACION -->
<?php
require($CLASES_DIR . 'seccion.class.php');

$seccion = New seccion(); 
$secciones = $seccion->listarSecciones();



?>
  <nav class="navbar navbar-inverse" id="navbar">
    <div class="container-fluid ">
		<a class="navbar-brand" href="<?= $PRESENTACION;?>/index.php"><img id="logo_navbar"src="<?= $CONT_ESTATICO?>/logo01.fw.png" alt="logo"></a>
      	<ul class="nav navbar-nav">
			<?php
		  	foreach($secciones as $sec){?>
				<li><a href="<?=$PRESENTACION;?>/seccion.php?id=<?php echo $sec['id_s']?>&pag=1"><?php echo $sec['nombre'];?></a></li>
			<?php
			}
			?>
				</li>
      </ul>
			<ul class="nav navbar-nav">
        <li><a href="http://192.168.1.4"><span class="glyphicon glyphicon-blog"></span>Blog</a></li>
      </ul>
      <div id="notlogged">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#modalLogin"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
      </div>
      </ul>
      <div id="logged" class="oculto">
      <ul class="nav navbar-nav navbar-right">
      	<li><a id="perfil" href="<?= $PRESENTACION;?>/perfil.php"><span class="glyphicon glyphicon-user"></span></span><?php echo '  ', $_SESSION['Nombre'];?></a></li>
        <li><a id="suscripto"href="#" data-toggle="modal" data-target="#modalSuscripcion"><span class="glyphicon glyphicon-upload"></span> Suscribirme</a></li>
        <!--<li><a id="btnLogout" href="<?= $PRESENTACION;?>/logout.php" onclick="FB.logout()"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>-->
				<li><a href="<?= $PRESENTACION;?>/logout.php" onclick="logoutFb()"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
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
          <h4 class="modal-title">Iniciar sesi&oacute;n</h4>
        </div>
        <div class="modal-body" align="center">
          <form action="<?= $LOGICA;?>/procesarLogin.php" method="POST" id="formLogin" role="form">
            <div class="form-group input-group col-xs-6">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input type="mail" id="correo" name="correo" placeholder="Correo" required class="form-control">
            </div>
            <div class="form-group input-group col-xs-6">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" id="pwd" name="pwd" placeholder="Contrase�a" required class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" id="btnIngresar" name="btnIngresar" value="Ingresar" class="btn btn-success">
              <a type="button" href="<?php $PRESENTACION?>registro.php" id="btnRegistro"  name="btnRegistro" class="btn btn-primary">Registrarme</a>
            </div>
          </form>
          <!-- FACEBOOK LOGIN BUTTON -->
          <div class="fb-login-button" scope="email,public_profile" onlogin="checkLoginState();" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>
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
				<h3 class="modal-title">&#191;Por qu� suscribirme?</h3>
			</div>
		<div class="modal-body">
				
			<article>
				<p><h4><span class="glyphicon glyphicon-ok"></span> Recibir suplementos en tu correo!</h4></p>
				<p><h4><span class="glyphicon glyphicon-ok"></span> Realizar comentarios en las noticias!</h4></p>
				<h4><span class="glyphicon glyphicon-ok"></span> Utilizar las funciones Me Gusta y Compartir!</h4></p>
			</article>
				
			<?php 
			if($_SESSION['Suscripto']==false){?>
			
			<form class="form-horizontal" action="<?= $LOGICA;?>/procesarSuscripcion.php" method="POST" id="formSuscripcion" role="form">
				<div class="form-group">
					<label class="control-label col-sm-2" for="t_credito">Tarjeta de Cr�dito:</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="t_credito" name="t_credito" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="tipo">Periodicidad:</label>
					<div class="col-sm-5">
						<label class="radio-inline"><input type="radio" id="tipo" name="tipo" value="1">Lunes a Domingo</label>
						<label class="radio-inline"><input type="radio" id="tipo" name="tipo" value="2">S&aacute;bados y Domingos</label>
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
			<?php
			}else{
			?>
			<form>
				<input type="submit" class="btn btn-danger" value="Cancelar Suscripcion">
			</form>
		
			<?php
			}
			?>
					
				
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
}
if (isset($_SESSION["logged"]) && ($_SESSION["logged"] == true)) {
?>
	<script>
		 logged();
	</script>
<?php
}
if(isset($_SESSION['Suscripto']) && ($_SESSION['Suscripto']) == true){
	?>
			<script>
			suscripto();
			 </script>
	<?php
}	

