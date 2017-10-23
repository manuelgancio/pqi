<html>

<body>
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
                                        <p> Todavía no hay comentarios, se el primero!</p>
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
                                        <p>Fecha: <?php echo $c['fecha_c'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach;?>
                <?php endif;?>
                <?php if(isset($_SESSION['logged']) && ($_SESSION['logged']== true)):?>
                    <li class="col-xs-10 col-md-12 list-group-item">
                        <div>
                            <form action="<?= $LOGICA;?>/procesarComentarios.php" method="POST">
                            <input type="hidden" value="<?php echo $art['id_a']?>" name="id_noticia" id="id_noticia">
                            <div class="comment-text form-group">
                                <input type="text" class="form-control" id="comentario" name="comentario"  maxlength="150" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btnComentar" name="btnComentar" class="btn btn-success">
                        </div>
                        </form>
                    </li>
                <?php endif;?>
                </ul>                
            </div>
        </div>
    </div>
</div>

</body>