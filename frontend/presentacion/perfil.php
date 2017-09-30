
<!DOCTYPE html>
<html>
<title>Perfil - Paqueteinformes.com</title>
<meta charset="UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="paqueteinformes">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/estilos.css">
<script src="../js/funciones.js"></script>

<?php
session_start();
require($CLASES_DIR . 'usuario.class.php');

$usu = New usuario(); 
$usu->setCorreo($_SESSION['Correo']);
$datos = $usu->verPerfil();
?>

<body>
<div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <a href="index.php"><img src="../img/logo.png" style="width:100%;height:150px;"></a>
      </div>
      <div class="col-md-3">
      </div>
</div><!-- row-->

<div class="container">
  <h2>Hola<?php echo ' '.$datos['p_nomb'].'!';?></h2>
  <p>Desde aquí puedes ver y modificar tus datos así como realizar el alta o baja de tu suscripción.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#datos">Mis datos</a></li>
    <li><a data-toggle="tab" href="#modificar">Editar</a></li>
    <li><a data-toggle="tab" href="#sus">Suscripción</a></li>
  </ul>

  <div class="tab-content">
    <div id="datos" class="tab-pane fade in active">
        <h3>Mis datos:</h3>
        <div class="row">
            <div class="col-md-6">
                <p>Nombre: <?php echo ' '.$datos['p_nomb'].' '.$datos['p_ap'];?></p>
                <p>Correo: <?php echo ' '.$datos['corre_c'];?></p>
            </div>
            <div class="col-md-6">
                <p>Teléfono de contacto: <?php ' '.$datos['tel'];?></p>
                <p>Estado suscripción: (SI/NO)(cuando guarde en la tabla suscripcion edito esto)</p>
            </div>
        </div>
    </div>
    <div id="modificar" class="tab-pane fade">
        <h3>Editar Perfil.</h3>
            <form action="" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-2" for="correo">Correo:</label>
                    <div class="col-md-3">
                        <input type="email" class="form-control" id="correo" name="correo">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="tel">Teléfono:</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="tel" name="tel">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="t_credito">Tarjeta de Crédito:</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="t_credito" name="t_credito">
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="form-group col-md-3">
					<input type="submit" class="form-control btn btn-success" id="btnModificar" name="btnModificar">
				</div>
            </form>
    </div>
    <?php 
    ?>
    <div id="sus" class="tab-pane fade">
      <h3>Suscripción</h3>
      <p>Fruta sobre suscripción</p>
      <p>if esta suscriptp btn para cancelar suscripción</p>
      <p>if no esta suscripto opciones para suscribirse como en registro e input para t credito</p>
    </div>
  </div>
</div>










</body>
