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
</head>
<?php
include('headerNoti.php');

$id_art = (int) $_GET['art'];
require_once($CLASES_DIR . 'articulo.class.php');
$articulo = New articulo();
$articulo->setId($id_art);

$art = $articulo->listarArt();

require_once ($CLASES_DIR . 'seccion.class.php');
$sec = New seccion();
$sec->setId($art['id_s']);

$seccion = $sec->nombreSeccion();
$seccion = $seccion['nombre'];
?>
<body>
<div class="row" >
    <div class="col-md-9" >
    
    <div class="container articulo" >
        <div>
            <p class="tituloNoti"><?= $art['titulo']?></p>
            <p class="cateNoti"><?= $seccion?></p>
            <p class="fechaNoti"><?= $art['fecha_a'];?></p>
        </div>

        <div>
            <img class="imgNoti" src="<?= $IMG?>/bonomi.jpg" alt="Imágen">
        </div>

        <div class="txtNoti">
            <p>
            <?= $art['contenido'];?>
            </p>
        </div>
    </div><!--container-->
    </div>
    <div class="col-md-3">

    </div>
    
</div> <!--row-->
<div class="row">
    
    <div class="publiBanner">
    <?php 
    //LLamo a la clase publicidad
    require_once($CLASES_DIR . 'publicidad.class.php');
    $publicidad= New publicidad();

    $banner = $publicidad->listarPubNoticia();
    //die(var_dump($banner['publicacion']));

    ?>
    <img class="" src="<?php echo $banner['publicacion'];?>">
    </div>
</div>
<?php
include('comentarios.php');

