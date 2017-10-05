
<!DOCTYPE html>
<html>
<head>
<title>Paqueteinformes.com - Bienvenidos!</title>
<meta charset="UTF-8">
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

//Recibo el id de la seccion que voy a mostrar
$id_s =$_GET['id'];

//Llamo a la clse seccion 
require_once($CLASES_DIR . 'seccion.class.php');

$sec = New seccion();
$sec->setId($id_s);

$seccion = $sec->nombreSeccion();

//LLamo a la clase articulo
require_once($CLASES_DIR . 'articulo.class.php');

$articulo = New articulo();
$articulo->setSeccion($_GET['id']);

$articulos = $articulo->listarArtXsec();
?>

<div class="well well-sm text-muted tituloSeccion"><h3><?php echo $seccion['nombre'];?></h3></div>
<div class="row">

<?php 
$i=1;
foreach ($articulos as $art){
    while($i <= 3){
    ?>
    <div class="articulo">
        <div class="col-md-3 art">
            <a href="<?= $PRESENTACION;?>/noticia.php?art=<?=$art['id_a']?>">
                <div class="img"><img alt="" src="http://placehold.it/250x250/dddddd/333333"></div>
            </a>
            <div class="descArt">
                <!--<div class="seccion"></div>-->
                <a class="titulo" href="<?= $PRESENTACION;?>/noticia.php?art=<?=$art['id_a']?>"><?= $art['titulo']?></a>
            </div>
        </div>
    </div>
<?php
    if($i == 3){
        ?> 
        </div><!--row--><div class="row">
        <?php
        $i= 1;
        break;
    }else{
    $i = $i + 1;
    break;
    }
}
}
?>
</div><!--row-->