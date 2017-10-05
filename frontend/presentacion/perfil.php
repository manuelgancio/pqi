
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
        <a href="index.php"><img class="header"src="../img/logo.png" style="width:100%;height:150px;"></a>
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
                <h4>Nombre: </h4><p><?php echo ' '.$datos['p_nomb'].' '.$datos['p_ap'];?></p>
                <h4>Correo: </h4><p><?php echo ' '.$datos['corre_c'];?></p>
            </div>
            <div class="col-md-6">
                <h4>Teléfono de contacto: </h4><p><?php ' '.$datos['tel'];?></p>
                <h4>Estado suscripción:</h4>
                <?php
                if($_SESSION['Suscripto'] == true){
                    ?>
                    <p> Suscripto correctamente! </p>
                <?php 
                }else{
                    ?>
                    <p> No está suscripto </p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div id="modificar" class="tab-pane fade">
        <h3>Editar Perfil.</h3>
            <form action="<?php echo '/pqi/frontend' . $LOGICA;?>/procesarRegistro.php" autocomplete="off" id="frmMod" method="POST" class="form-horizontal">
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
                    <label class="control-label col-md-2" for="pwd">Contraseña:</label>
                    <div class="col-md-3">
                        <input type="password" class="form-control" id="pwd" name="pwd">
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="form-group col-md-3">
					<input type="submit" class="form-control btn btn-success" form="frmMod"id="btnModificar" name="btnModificar">
				</div>
            </form>
    </div>
    <?php 
    ?>
    <div id="sus" class="tab-pane fade">
        <h3>Suscripción</h3>
        <p>Fruta sobre suscripción</p>
        <?php 
        if($_SESSION['Suscripto'] == true){//esta suscripto
            ?>
        <p> Usted ya se encuentra suscripto.</p>
        <p> Si desea cancelar su suscripcion haga click aqui:</p>
        <a href="<?php echo '/pqi/frontend' . $LOGICA;?>/procesarSuscripcion.php?f=can_sus" class="btn btn-danger" id="btnCancelarSus" name="btnCancelarSus">Cancelar Suscripción</a>
        <?php 
        }else{
            ?>
            <h4> ¿Desea suscribirse? </h4>
            <p> Ingrese sus datos y empezará a recibir nuestro suplemento!</p>
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo '/pqi/frontend' . $LOGICA;?>/procesarSuscripcion.php" method='POST' id="frmSus" role='form' class="form-horizontal">
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
                        <div class="col-sm-3"></div>
                            <div class="form-group col-sm-3">
                                <input type="submit" class="form-control btn btn-success" id="btnSuscripcion" name="btnSuscripcion" form="frmSus">
                            </div>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
  </div>
</div>

</body>
