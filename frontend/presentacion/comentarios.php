<html>
    

<body>
<!--ALERTAS -->
<div class="alert alert-success alert-dismissable alerta" id="alert_template" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
</div>
<div class="alert alert-danger alert-dismissable alerta" id="error_div" style="display: none;">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
</div>
<!-- LISTO COMENTARIOS -->
<?php 
    //Llamo a la clase comentarios
    require_once ($CLASES_DIR . 'comentarios.class.php');
    $c = New comentario();            
    $c->setIdNoticia($art['id_a']);
    $comentarios = $c->listarComentarios();        

    $cantComentarios =$c->cantComentarios();

?>
<div class="container">
    <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span><h4 style="display:inline"> Comentarios</h4>
                <span class="label label-info"><?php echo $cantComentarios['cant'];?></span>
            </div>
            <div class="panel-body">
                <ul class="list-group"> 
                <?php if($comentarios == false):?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <div class="comment-text">
                                        <p> Todav&iacute;a no hay comentarios, se el primero!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php else:?>  
                <?php foreach($comentarios as $c):?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <div class="comment-text">
                                        <?php echo $c['comentario'];?>
                                    </div>
                                    <div class="mic-info">
                                        <p style="margin-bottom:1px">Por: <?php echo $c['nombre'];?></p>
                                        <p style="margin-bottom:1px">Fecha: <?php echo $c['fecha_c'];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <form action="<?= $LOGICA;?>/procesarComentarios.php" method="POST" id="frmReportar" name="frmReportar">
                                    <input type="hidden" value="<?php echo $c['id_cm'];?>" name="id_cm" id="id_cm">
                                    <button class="btn btn-basic" onclick="submit;" id="btnReportar" name="btnReportar" placeholder="Reportar"><span class="glyphicon glyphicon-exclamation-sign"></span></button>
                                </form>
                            </div>
                        </div>
                    </li>
                <?php endforeach;?>
                <li class="list-group-item"  id="newComment" style="display:none;">
                <div class="row">
                    <div class="col-xs-10 col-md-11">
                         <div>
                            <div class="comment-text"id="comment">
                            
                            </div>
                            <div class="mic-info" id="detalles">
                                
                            </div>
                        </div>
                    </div>
                </div>
                </li>

                <?php endif;?>
                
                    <li class="col-xs-10 col-md-12 list-group-item">
                        <div id="frmCom">
                            <form action="<?= $LOGICA;?>/procesarComentarios.php" method="POST" id="frmComentario" name="frmComentario">
                            <input type="hidden" value="<?php echo $art['id_a']?>" name="id_noticia" id="id_noticia">                            

                            <div class="comment-text form-group">
                                <input type="text" class="form-control" id="comentario" name="comentario"  maxlength="150" required>
                            </div>
                        </div>
                        <div class="form-group" id="btnCom">
                            <?php if(isset($_SESSION['logged']) && ($_SESSION['logged'] == true)):?>
                            
                            <input type="submit" id="btnComentar" name="btnComentar" class="btn btn-success">
                            </form>
                            
                            <?php else:?>
                            <button data-toggle="modal" data-target="#modalLogin" class="btn btn-success" id="btnComentarF" name="btnComentarF" onclick="errCom();">Enviar</button>
                            <?php endif;?>
                        </form>
                        </div>
                    </li>
                </ul>                
            </div>
        </div>
    </div>
</div>

<!-- MODAL LOGIN-->
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
              <input type="password" id="pwd" name="pwd" placeholder="Contraseña" required class="form-control">
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

<script>
    /* attach a submit handler to the form */
    $("#frmComentario").submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault();

    /* get the action attribute from the <form action=""> element */
    var $form = $( this ),
    url = $form.attr( 'action' );
    
    /* Send the data using post with element id name and name2*/
    var posting = $.post( url, { id_noticia: $('#id_noticia').val(),comentario: $('#comentario').val(),btnComentar: $('#btnComentar').val()} );
    var com = comentario.value;
    /* Alerts the results */
    posting.done(function( data ) {
        comentario.value ='';
        aviso('Gracias por su comentario!','7000');
        $('#btnCom').hide();
        $('#frmCom').hide();
        
        $('#newComment').show();
        $('#comment').html(com);   
    });
    });
</script>

<script>
    /* attach a submit handler to the form */
    $("#frmReportar").submit(function(event) {

    /* stop form from submitting normally */
    event.preventDefault();

    /* get the action attribute from the <form action=""> element */
    var $form = $( this ),
    url = $form.attr('action');
    
    /* Send the data using post with id comentario */
    var posting = $.post( url, { id_cm: $('#id_cm').val(),btnReportar: $('#btnReportar').val()} );

    /* Alerts the results */
    posting.done(function( data ){
        $('#btnReportar').prop('disabled', true);
        aviso('El reporte fue guardado, Gracias!','7000');
    });
    });
</script>

</body>