
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

/*LLamo al metodo visita para guardar en la base que se visito esta seccion*/
$visita = $sec->visita();

//Averiguo el nombre de la seccion
$seccion = $sec->nombreSeccion();

//LLamo a la clase articulo
require_once($CLASES_DIR . 'articulo.class.php');

$articulo = New articulo();
$articulo->setSeccion($_GET['id']);

//$articulos = $articulo->listarArtXsec();

//Cantidad de ariticulos a listar
$cantArt = $articulo->cantArtXListar();
$cantArt = $cantArt['cant']; 
//Cantidad de articulos que muestro en cada pagina
$artXpag = 10;
//Calcula cantidad de paginas totales
$paginasTotales = ceil($cantArt / $artXpag);

// GET pagina actual o pone una como default
if (isset($_GET['pag']) && is_numeric($_GET['pag'])) {
    // convierto a int
    $pagActual = (int) $_GET['pag'];
 } else {
    // numero de pag por defecto
    $pagActual = 1;
 } // end if

//Verificar que el numero de pagina es valido
//if es mas grande que la paginas totales
if ($pagActual > $paginasTotales) {
    // set current page to last page
    $pagActual = $paginasTotales;
 } // end if
 // if current page is less than first page...
 if ($pagActual < 1) {
    // set current page to first page
    $pagActual = 1;
 } // end if

 // the offset of the list, based on current page 
$offset = ($pagActual - 1) * $artXpag;



?>

<div class="well well-sm text-muted tituloSeccion"><h3><?php echo $seccion['nombre'];?></h3></div>
<div class="row">

<?php 
//LLamo metodo para listar articulos
$articulos = $articulo->listarArtXsec($offset, $artXpag);

$i=1;
foreach ($articulos as $art){
    while($i <= 3){
    ?>
    <div class="articulo">
        <div class="col-md-3 art">
            <a href="<?= $PRESENTACION;?>/noticia.php?art=<?=$art['id_a']?>">
                <div class="img"><img alt="" src="http://placehold.it/299x250/dddddd/333333"></div>
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
<div class="text-center">
<ul class="pagination pagination-lg">
<?php 
/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($pagActual > 1) {
   // show << link to go back to page 1
   echo "<li><a href='$PRESENTACION/seccion.php?id=$id_s&pag=1'><<</a></li>";
   // get previous page num
   $prevpage = $pagActual - 1;
   // show < link to go back to 1 page
   echo "<li><a href='$PRESENTACION/seccion.php?id=$id_s&pag=$prevpage'><</a></li>";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($pagActual - $range); $x < (($pagActual + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $paginasTotales)) {
      // if we're on current page...
      if ($x == $pagActual) {
         // 'highlight' it but don't make a link
         echo "<li class='disabled' href='#'><a>$x</a></li>";
      // if not current page...
      } else {
         // make it a link
         echo "<li><a href='$PRESENTACION/seccion.php?id=$id_s&pag=$x'>$x</a></li>";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($pagActual != $paginasTotales) {
   // get next page
   $nextpage = $pagActual + 1;
    // echo forward link for next page 
    echo "<li><a href='$PRESENTACION/seccion.php?id=$id_s&pag=$nextpage'>></a></li>";
   // echo forward link for lastpage
   echo "<li><a href='$PRESENTACION/seccion.php?id=$id_s&pag=$paginasTotales'>>></a></li>";
} // end if
/****** end build pagination links ******/
?>
</ul>
</div>