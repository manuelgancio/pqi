<html>



<?php
include('headerNoti.php');
?>
<body>
<!--ALERTA-->
<div class="alert alert-success alert-dismissable alerta" id="alert_template" style="display: none;">
  	<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
</div>
<div class="alert alert-danger alert-dismissable alerta" id="error_div" style="display: none;">
   	<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
</div>


<?php
/* Controlo errores */
if(isset($_GET['err'])){
    if ($_GET['err'] == 'correo'){
        ?>
        <script>
        error('El correo pertenece a otra persona.','7000');
        </script>
        <?php	
    }elseif($_GET['err'] == 'modOk'){
        ?>
        <script>
        aviso('Datos modificados correctamente!.','7000');
        </script>
        <?php	
    }
}

//Llamo a la clase usuario
require_once($CLASES_DIR . 'usuario.class.php');

$usu = New usuario(); 
$usu->setCorreo($_SESSION['Correo']);
$datos = $usu->verPerfil();//Datos del perfil
?>


<div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
        <a href="index.php"><img class="header"src="../img/logo.png" style="width:100%;height:150px;margin-top:20px;"></a>
      </div>
      <div class="col-md-3">
      </div>
</div><!-- row-->

<div class="container">
  <h2>Hola<?php echo ' '.$datos['p_nomb'].'!';?></h2>
  <p>Desde aqu&iacute; puedes ver y modificar tus datos as&iacute; como realizar el alta o baja de tu suscripci&oacute;n.</p>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#datos">Mis datos</a></li>
    <li><a data-toggle="tab" href="#modificar">Editar</a></li>
    <li><a data-toggle="tab" href="#sus">Suscripci&oacute;n</a></li>
  </ul>

  <div class="tab-content">
    <div id="datos" class="tab-pane fade in active">
        <h3>Mis datos:</h3>
        <div class="row">
            <div class="col-md-6">
            <h4><span class="glyphicon glyphicon-user"></span> Nombre: </h4><p><?php echo ' '.$datos['p_nomb'].' '.$datos['p_ap'];?></p>
                <h4><span class="glyphicon glyphicon-envelope"></span> Correo: </h4><p><?php echo ' '.$datos['corre_c'];?></p>
            </div>
            <div class="col-md-6">
                <h4><span class="glyphicon glyphicon-earphone"></span> Tel&eacute;fono de contacto: </h4><p><?php echo ' '.$datos['tel'];?></p>
                <h4><span class="glyphicon glyphicon-star"></span> Estado suscripci&oacute;n:</h4>
                <?php
                if($_SESSION['Suscripto'] == true){
                    ?>
                    <p> Suscripto correctamente! <span class="glyphicon glyphicon-ok"></span></span></p>
                <?php 
                }else{
                    ?>
                    <p> No est&aacute; suscripto <span class="glyphicon glyphicon-remove"></span></p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div id="modificar" class="tab-pane fade">
        <h3>Actualizar datos.</h3>
            <form action="<?= $LOGICA;?>/procesarRegistro.php" autocomplete="off" id="frmMod" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-2" for="correo"><span class="glyphicon glyphicon-envelope"></span> Correo:</label>
                    <div class="col-md-3">
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="tel" required><span class="glyphicon glyphicon-earphone"></span> Tel&eacute;fono:</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="tel" name="tel">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="pwd" required><span class="glyphicon glyphicon-lock"></span> Contrase&ntilde;a:</label>
                    <div class="col-md-3">
                        <input type="password" class="form-control" id="pwd" name="pwd">
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="form-group col-md-3">
					<input type="submit" class="form-control btn btn-success" form="frmMod"id="btnModificar" name="btnModificar" value="Actualizar">
				</div>
            </form>
    </div>
    <?php 
    ?>
    <div id="sus" class="tab-pane fade">
        <h3>Suscripci&oacute;n</h3>
        <h4>Ventajas de la suscripci&oacuten;</h4>  
        <article>
            <p></p>
			<p><h4><span class="glyphicon glyphicon-ok"></span> Recibir suplementos en tu correo!</h4></p>
			<p><h4><span class="glyphicon glyphicon-ok"></span> Realizar comentarios en las noticias!</h4></p>
			<h4><span class="glyphicon glyphicon-ok"></span> Utilizar las funciones Me Gusta y Compartir!</h4></p>
		</article>
        <?php 
        if($_SESSION['Suscripto'] == true){//esta suscripto
            ?>
        <p> Usted ya se encuentra suscripto.</p>
        <p> Si desea cancelar su suscripci&oacute;n haga click aqui:</p>
        <a href="<?= $LOGICA;?>/procesarSuscripcion.php?f=can_sus" class="btn btn-danger" id="btnCancelarSus" name="btnCancelarSus">Cancelar Suscripción</a>
        <?php 
        }else{
            ?>
            <h4>&#191;Desea suscribirse?</h4>
            <p> Ingrese sus datos y empezar&aacute; a recibir nuestro suplemento!</p>
            <div class="row">
                <div class="col-md-6">
                    <form action="<?= $LOGICA;?>/procesarSuscripcion.php" method='POST' id="frmSus" role='form' class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="t_credito">Tarjeta de Cr&eacute;dito:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="t_credito" name="t_credito">
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

<?php
