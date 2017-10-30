<body>
    <?php 
        include $PRESENTACION_DIR ."header.php";
    ?>
    <!-- PORTADA -->
    <div class="well well-sm text-muted" id="portada"><h3>PORTADA</h3></div>

<?php
/*Fecha del dia
  Si paso fecha de edicion por get cargo articulos de esa fecha
  Si no esta la fecha por get uso la fecha del dia actual
*/
	if(isset($_GET['fecha'])){
		$fecha = $_GET['fecha'];
	}else{
		$fecha = date('Y-m-d');
	}

//LLamo a la clase articulo
	require_once($CLASES_DIR . 'articulo.class.php');

	$articulo = New articulo();
	$articulo->setFecha($fecha);
	
	$articulos_d = $articulo->listarArtDest();

?>
<!--PORTADA carousel-->
<div class="container" id="carouselPortada">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
      <!-- Wrapper for slides -->
      	<div class="carousel-inner">

		  <div class="item active">
          <img src="http://placehold.it/760x400/dddddd/333333">
           <div class="carousel-caption">
            <h4><a href="#">¿Queres que mostremos tu publicidad? Contactanos a: publicidad@pqi.com</a></h4>
            <p class="item-txt"></p>
          </div>
        </div><!-- End Item -->

	  	<?php foreach($articulos_d as $art_d):?>
        	<div class="item">
			<img src="http://placehold.it/760x400/cccccc/ffffff">
				<div class="carousel-caption">
					<h4><a href="<?= $PRESENTACION;?>/noticia.php?art=<?=$art_d['id_a']?>"><?= $art_d['titulo'];?></a></h4>
					<p class="item-txt"><?= $art_d['contenido'];?></p>
				</div>
			</div><!-- End Item -->
		<?php endforeach;?>
        
                
      </div><!-- End Carousel Inner -->

      <!-- Controls -->
      <div class="carousel-controls">
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>

    </div><!-- End Carousel -->
</div><!--container-->

<!--SECCIONES-->
<?php
//Llamo a la clse seccion 
require_once($CLASES_DIR . 'seccion.class.php');

$sec = New seccion();

$secciones = $sec->listarSecciones();

?>
<?php foreach ($secciones as $seccion):?>
<div class="well well-sm text-muted" id="<?=$seccion['nombre']?>"><h3><?=$seccion['nombre']?></h3></div>
<div class="container">
	<div class="row">
<?php 
//LLamo a la clase articulo
require_once($CLASES_DIR . 'articulo.class.php');

$articulo = New articulo();
$articulo->setSeccion($seccion['id_s']);
$articulo->setFecha($fecha);

$articulos = $articulo->listartArtXSecPortada();

//Lamo a la clase publicidad
require_once($CLASES_DIR . 'publicidad.class.php');

$p = New publicidad();
$publicidad = $p->listarPubIndex();
//die(var_dump($publicidad));
$i=1;
$o=1;
foreach ($articulos as $art){
    while($i <= 3 && $o <=2){
    ?>
		<div class="noticia col-sm-3">
		<a href="<?= $PRESENTACION;?>/noticia.php?art=<?=$art['id_a']?>">
			<div class="img-noticia"><img alt="" src="http://placehold.it/300x200/dddddd/333333"></div>
			<div class="titulo"><?= $art['titulo'];?></div>
		</a>
		</div>
	<?php
    	if($i == 3){
    ?> 
			<div class="col-sm-3 publicidadIndex">
			<?php if($publicidad != false){//Si hay publicidad contratada...Selecciono una aleatoriamente
				$p = array_rand($publicidad);
				$p = $publicidad[$p];//Ruta img
			?>
			<img src="<?php echo $p['p'];?>" alt='pub'>
			<?php 
			}
			?>
			</div>
			</div><!--row--><div class="row">
			<?php
			$i= 1;
			$o= $o + 1;
			break;
    	}else{
    	$i = $i + 1;
    	break;
    }
}
}
?>
	
    
  	</div><!--row-->
</div><!--container-->
<?php endforeach;?>


</body>