<?php

?>
<!DOCTYPE html>
<html>
<title>Paqueteinformes.com - Registrarme!</title>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="paqueteinformes">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/estilos.css">

<body>

<div class="row">
	<div class="col-sm-6">
	<div class="well well-sm text-muted"><h3>REGISTRARME</h3></div>
		<form action="<?php echo '/pqi/frontend' . $LOGICA;?>/procesarRegistro.php" method="POST" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2" for="correo">Correo:</label>
			<div class="col-sm-5">
				<input type="email" class="form-control" id="correo" name="correo"required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="nombre">Nombre:</label>
			<div class="col-sm-5"> 
				<input type="text" class="form-control" id="nombre" name="nombre" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="apellido">Apellido:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="apellido" name="apellido" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="tel">Teléfono:</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="tel" name="tel" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Contraseña:</label>
			<div class="col-sm-5">
				<input type="password" class="form-control" id="pwd" name="pwd" reqired>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="pre">Suscripción:</label>
			<div class="col-sm-5">
  				<input type="checkbox" data-toggle="collapse" data-target="#premium" id="pre" name="pre" value="premium">
			</div>
		</div>
		<div class="collapse" id="premium">
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
		</div><!--collapse-->
		
			<div class="col-sm-3"></div>
				<div class="form-group col-sm-3">
					<input type="submit" class="form-control btn btn-success" id="btnRegistro" name="btnRegistro">
				</div>
		</form>
	</div>
	<div class="col-sm-6">
		<div class="well well-sm text-muted"><h3>¿Por qué suscribirme?</h3></div>
		<article>
			<p><h4><span class="glyphicon glyphicon-ok"></span> Recibir suplementos en tu correo!</h4></p>
			<p><h4><span class="glyphicon glyphicon-ok"></span> Realizar comentarios en las noticias!</h4></p>
			<h4><span class="glyphicon glyphicon-ok"></span> Utilizar las funciones Me Gusta y Compartir!</h4></p>
		</article>
	</div>
</div>