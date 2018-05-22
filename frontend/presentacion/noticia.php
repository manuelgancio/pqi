<html>
<head>
<title>Paqueteinformes.com - Bienvenidos!</title>
<meta charset="ISO-8859-1">
<meta name="description" content="">
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

</head>

<script>
 <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
</script>

<script>
window.fbAsyncInit = function() {
  FB.init({
    appId      : '141862136411361',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });
}
</script>


<?php
include('headerNoti.php');

if(isset($_SESSION['logged']) && ($_SESSION['logged'] == true)){
    ?>
    <script>
    //Desabilitar like y share si no esta loggeado
    </script>
    <?php
    
}
if(isset($_GET['art'])){//Si recibo por get el id del articulo

    $id_art = (int) $_GET['art'];
    //Llamo a la clase articulo
    require_once($CLASES_DIR . 'articulo.class.php');
    $articulo = New articulo();

    $articulo->setId($id_art);
    //Traigo datos del articulo
    $art = $articulo->listarArt();
    //Agrego una visita al contador de la base
    $visita = $articulo->visita();
    //Guardo el id de la seccion
    $id_secion = $art['id_s'];
    //Llamo a la clase seccion 
    require_once ($CLASES_DIR . 'seccion.class.php');
    $sec = New seccion();
    $sec->setId($art['id_s']);

    $seccion = $sec->nombreSeccion();
    $seccion = $seccion['nombre'];

    //Averiguo la cantidad de likes del art
    $l = $articulo ->cantLikes();
    
    ?>
    <body>
    
    
    <div class="well well-sm text-muted tituloSeccion" id="well-noti"><h3>
        <div class="row" >
            <div class="col-md-6 col-sm-8">
               <p class="tituloArt"><?= $art['titulo']?></p>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-1 col-sm-0">
                <div class="fb-share-button redes-btn" data-href="/pqi/frontend/presentacion/noticia.php?art=<?= $id_art;?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank"
                    href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fpqi%2Ffrontend%2Fpresentacion%2Fnoticia.php%3Fart%3D1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a>
                </div>
            </div>
            <div class="col-md-1 form-group">
                    
                <form id="frmLike" name="frmLike" action="<?= $LOGICA;?>/procesarLike.php">
				    <input type="hidden" id="id_art" name="id_art" value="<?php echo $id_art;?>">
				    <button type="submit" id="btnLike" name="btnLike" class="btn btn-primary redes-btn"><span class="glyphicon glyphicon-thumbs-up"></span><?php echo ' '.$l;?></button>
                </form>
                
            </div>
            
            <div class="col-md-2 col-sm-4">
                <p class=""><?= $art['fecha_a'];?></p>
            </div>
        </div>
    </h3></div>
                   

<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <img class="imgNoti" src="<?= $art['imagen'];?>" alt="Imágen">
		</div>

<!--PUBLICIDAD VERTICAL -->
			
		<div class="col-md-3">
        <?php 
        //Llamo clase publicidad
            require_once($CLASES_DIR.'publicidad.class.php');
            $p = new publicidad();

            $pub = $p->listarPubNoticiaXseccion($id_secion);
            if ($pub != NULL){
                ?>
				<img class="publiNotiV" src="<?php echo $pub;?>" alt="publicidad">
			</div>
            <?php
            }else{
                ?>
                </div>
                <?php
            }
            ?>
        </div>
            <!--LIKE / SHARE-->
            <!--
        
                <div class="form-group">
					<div class="col-sm-1">
                    <div class="fb-share-button" data-href="/pqi/frontend/presentacion/noticia.php?art=<?= $id_art;?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fpqi%2Ffrontend%2Fpresentacion%2Fnoticia.php%3Fart%3D1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
                    </div>
					<div class="col-sm-1 like">
						<form id="frmLike" name="frmLike" action="<?= $LOGICA;?>/procesarLike.php">
							<input type="hidden" id="id_art" name="id_art" value="<?php echo $id_art;?>">
							<button type="submit" id="btnLike" name="btnLike" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span><?php echo ' '.$l;?></button>
						</form>	
					</div>
                </div>   
                -->
                <script>
                    /* attach a submit handler to the form */
                    $("#frmLike").submit(function(event) {

                    /* stop form from submitting normally */
                    event.preventDefault();

                    /* get the action attribute from the <form action=""> element */
                    var $form = $( this ),
                        url = $form.attr( 'action' );

                    /* Send the data using post with element id name and name2*/
                    var posting = $.post( url, { id_art: $('#id_art').val()} );

                    /* Alerts the results */
                    posting.done(function( data ) {
                        $('#btnLike').attr('disabled','-1');
                        aviso('Like!','4000');
                    });
                    });
                </script>
	          
		<!-- TEXTO NOTICIA-->

        <div class="row">
            <div class="txtNoti col-sm-12">
                <p>
                    <?php echo $art['contenido'];?>
                </p>
            </div>
        </div> <!--row-->
</div><!--container-->

<!--PUBLICIDAD -->
<div class="container">  
    <div class="publiBanner">
        <?php 
        //LLamo a la clase publicidad
        require_once($CLASES_DIR . 'publicidad.class.php');
        $publicidad= New publicidad();
        //Devuelve false o url de img publicidad
        $banner = $publicidad->listarPubNoticia();
        if ($banner != null){
        ?>
        <img class="" src="<?php echo $banner;?>">
    </div>
    <?php
        }else{
            ?>
            </div>
            <?php
        }
    ?>
</div>
   
    <?php
    include('comentarios.php');
}else{//Si no recibi ningun id de articulo...
    ?>
    <script>window.location.replace('../presentacion/index.php');</script>
    <?php
}
