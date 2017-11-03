<html>
<head>
<title>Paqueteinformes.com - Bienvenidos!</title>
<meta charset="ISO-8859-1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="paqueteinformes">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:url"           content="http://localhost/pqi/frontend/presentacion/index.php" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Paqueteinformes" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="<?= $IMG?>/bonomi.jpg"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?= $CSS;?>/estilos.css">
<script src="<?= $JS;?>/funciones.js"></script>
</head>

<div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=141862136411361';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
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
    //Llamo a la clase seccion 
    require_once ($CLASES_DIR . 'seccion.class.php');
    $sec = New seccion();
    $sec->setId($art['id_s']);

    $seccion = $sec->nombreSeccion();
    $seccion = $seccion['nombre'];
    ?>
    <body>
    <div class="container">
        <div class="row" >
            <div class="col-md-9">
                <div class="articulo">
                    <div>
                        <p class="tituloNoti"><?= $art['titulo']?></p>
                        <p class="cateNoti"><?= $seccion?></p>
                        <p class="fechaNoti"><?= $art['fecha_a'];?></p>
                    </div>
                </div>  
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 col-sm-12">
                <img class="imgNoti" src="http://placehold.it/720x470/eeeeee/333333" alt="Imágen">
            </div>
        </div>
            
        <div class="row">
            <div class="like">
                <div class="form-group likeNoticia col-md-1">
                        <form id="frmLike" name="frmLike" action="<?= $LOGICA;?>/procesarLike.php">
                            <input type="hidden" id="id_art" name="id_art" value="<?php echo $id_art;?>">
                            <button type="submit" id="btnLike" name="btnLike" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                        </form>
                </div>
                <div class="compartirNoticia col-md-1">
                    <div class="fb-share-button" data-href="http://localhost" data-layout="button" data-size="large" data-mobile-iframe="true">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2F&amp;src=sdkpreparse">Compartir</a></div>
                </div>
            </div>  
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
                        $('#btnLike').attr('disabled','-1')
                    });
                    });
                </script>
        </div><!--row-->
        <div class="row">
            <div class="txtNoti col-md-9 col-sm-12">
                <p>
                    <?= $art['contenido'];?>
                </p>
            </div>
          
        </div> <!--row-->
</div><!--container-->
<div class="container">
    <div class="row">
            
            <div class="publiBanner col-sm-12">
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
            }
            ?>
    </div>
</div>
   
        
    <?php
    include('comentarios.php');
}else{//Si no recibi ningun id de articulo...
    ?>
    <script>window.location.replace('../presentacion/index.php');</script>
    <?php
}
