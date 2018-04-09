
<body class="">
    <?php 
		include $PRESENTACION_DIR ."header.php";
    ?>
	 
<!--ALERTA-->
<div class="wrapper">
	<div class="alert alert-success alert-dismissable alerta" id="alert_template" style="display: none;">
    	<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
	</div>
	<div class="alert alert-danger alert-dismissable alerta" id="error_div" style="display: none;">
    	<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
	</div>
<!-- PORTADA -->
    <!--<div class="well well-sm text-muted" id="portada"><h3>PORTADA</h3></div>-->
	<div style="margin-bottom:20px;"> </div>

<?php

/* Controlo errores */
	if(isset($_GET['err'])){
		if ($_GET['err'] == 'fecha'){
			?>
			<script>
			error('No hay art&iacute;culos en esa fecha.','7000');
			</script>
			<?php	
		}elseif ($_GET['err'] == 'regOk'){
			?>
			<script>
			aviso('Registro correcto! Ya puedes iniciar sesi&oacute;n.','7000');
			</script>
			<?php	
		}elseif($_GET['err'] == 'susOk'){
			?>
			<script>
			aviso('La suscripción se realizo con &eacute;xito.','7000');
			</script>
			<?php	
		}elseif($_GET['err'] == 'susC'){
			?>
			<script>
			aviso('Se cancelo la suscripci&oacute;n.','7000');
			</script>
			<?php	
		}elseif($_GET['err'] == 'loginF'){
			?>
			<script>
			error('Usuario o contrase&ntilde;a incorrecta.','7000');
			</script>
			<?php	
		}
	}
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
<div class="container" id="">

	<div class="row">
	<div id="carouselPortada">
		<div id="myCarousel" class="carousel slide col-sm-12 col-md-9" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner">

				<div class="item active" id="portada" >
					<img src="<?= $IMG;?>/paquetesenial.jpg">
				</div><!-- End Item -->

				<?php foreach($articulos_d as $art_d):?>
					<div class="item" id="portada">
					<!--<img src="http://placehold.it/840x400/cccccc/ffffff">-->
						<img class="imgCarousel" src="<?= $art_d['imagen'];?>">
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
		</div>
	</div><!-- End Carousel -->
	<!--CALENDARIO-->
	<div class="col-md-3 calendario">
		<form action="<?= $LOGICA;?>/procesarEdicion.php" method="GET" id="frmEdicion">
			<div class="row">
				<div class="form-group">
					<!--<label class="col-xs-3 control-label"for="embeddingDatePicker">Edición</label>-->
					<div class="col-xs-5 date">
						<div id="embeddingDatePicker"></div>
						<input type="hidden" id="selectedDate" name="selectedDate" />
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-5 col-xs-offset-5">
						<button type="submit" class="btn btn-primary" id="btnEdicion" name="btnEdicion"><span class="glyphicon glyphicon-search"></span></button>
						</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div><!--container-->

<!-- PUBLICIDAD PORTADA -->

<div class="container ">
	<div class="row">
		<div>
			<?php 
			//LLamo a la clase publicidad
			require_once($CLASES_DIR . 'publicidad.class.php');
			$publicidad= New publicidad();
			//Devuelve false o url de img publicidad
			$banner = $publicidad->listarPubIndexBanner();
			if ($banner != null){
			?>
			<img class="publiBannerP" src="<?php echo $banner;?>">
		</div>
			<?php
			}else{
			?>
		</div>
			<?php
			}
			?>
	</div>
</div>


<!--SECCIONES-->
<?php
//Llamo a la clse seccion 
require_once($CLASES_DIR . 'seccion.class.php');

$sec = New seccion();

$secciones = $sec->listarSecciones();
//contador
$u=0;
?>
<?php foreach ($secciones as $seccion):?>
<div class="well well-sm text-muted" id="<?=$seccion['nombre']?>"><h3><?=$seccion['nombre']?></h3></div>
<div class="container">
	<div class="row">
<?php 
$u = $u + 1;
//LLamo a la clase articulo
require_once($CLASES_DIR . 'articulo.class.php');

$articulo = New articulo();
$articulo->setSeccion($seccion['id_s']);
$articulo->setFecha($fecha);


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
			<div class="img-noticia"><img alt="" src="<?= $art['imagen'];?>"></div>
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
<?php
	  if ($u == 2){
	?>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
	<div class="well well-sm text-muted" id=""><h3>Noticia mas popular!</h3></div>
	<div class="noticia_esp">
	<?php 

	$art_mas_likes = $articulo->artConMasLikes();
	//die(var_dump($art_mas_likes));
	?>
	<a href="<?= $PRESENTACION;?>/noticia.php?art=<?=$art_mas_likes['id_a']?>">
		<div class="img_not_esp"><img alt="Image" src="<?= $art_mas_likes['imagen'];?>"></div>
		<div class="titulo_not_esp"><?= $art_mas_likes['titulo'];?></div>
	</a>
	</div>
	</div>
	</div>
	<?php 
} 
?>
</div><!--container-->
</div>
<?php endforeach;?>

