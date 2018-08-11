<html>

    <?php 

		include $PRESENTACION_DIR ."header.php";
		
    ?>
<body>	 
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
			error('No hay artículos en esa fecha.','7000');
			</script>
			<?php	
		}elseif ($_GET['err'] == 'regOk'){
			?>
			<script>
			aviso('Registro correcto! Ya puedes iniciar sesión.','7000');
			</script>
			<?php	
		}elseif($_GET['err'] == 'susOk'){
			?>
			<script>
			aviso('La suscripciÃ³n se realizo con éxito.','7000');
			</script>
			<?php	
		}elseif($_GET['err'] == 'susC'){
			?>
			<script>
			aviso('Se cancelo la suscripción.','7000');
			</script>
			<?php	
		}elseif($_GET['err'] == 'loginF'){
			?>
			<script>
			error('Usuario o contraseña incorrecta.','7000');
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
					<img src="<?= $CONT_ESTATICO;?>/paquetesenial.jpg">
				</div><!-- End Item -->

				<?php foreach($articulos_d as $art_d):?>
					<div class="item" id="portada">
					<!--<img src="http://placehold.it/840x400/cccccc/ffffff">-->
						<img class="imgCarousel" src="<?= $CONT_ESTATICO . $art_d['imagen'];?>">
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
					<!--<label class="col-xs-3 control-label"for="embeddingDatePicker">EdiciÃ³n</label>-->
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
			//die(var_dump($banner));
			if ($banner != null){
				
			?>
			<img id="img_banner_p" class="publiBannerP" alt="banner">
			<!-- Banner rotativo cargado en el script de final de pagina-->
			
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
<div class="well well-sm text-muted" id="<?=$seccion['nombre']?>"><h3><a class="well-seccion" href="<?= $PRESENTACION;?>/seccion.php?id=<?php echo $seccion['id_s']?>"><?=$seccion['nombre']?></a></h3></div>
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
			<div class="img-noticia"><img alt="" src="<?= $CONT_ESTATICO . $art['imagen'];?>"></div>
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
			<img class="img-noti-index" src="<?= $CONT_ESTATICO_PUB . $p['p'];?>" alt='pub'>
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
		<div class="well well-sm text-muted" id=""><h3>Noticia con mas Me Gusta!</h3></div>
			<div class="noticia_esp">
				<?php 
				$art_mas_likes = $articulo->artConMasLikes();
				//die(var_dump($art_mas_likes));
				?>
				<a href="<?= $PRESENTACION;?>/noticia.php?art=<?=$art_mas_likes['id_a']?>">
					<div><img class="img_not_esp" alt="Image" src="<?= $CONT_ESTATICO . $art_mas_likes['imagen'];?>"></div>
					<div class="titulo_not_esp"><?= $art_mas_likes['titulo'];?></div>
				</a>
			</div>
		</div><!--col-->

		<div class="col-md-6">
			<div class="well well-sm text-muted" id=""><h3>Mas visitadas!</h3></div>
			<div class="noticia_esp">
				<?php 
				$mas_visitadas = $articulo->masVisitadas();
//die(var_dump($mas_visitadas));
				?>
				<a id="mas_vistas_href" href="">
					<div ><img class="img_not_esp" id="mas_vistas_img" alt="Image"></div>
					<div id="mas_vistas_txt" class="titulo_not_esp"></div>
				</a>
			</div>
		</div><!--col-->
	</div>
<?php 
} 
?>
</div><!--container-->
</div>
<?php endforeach;?>


<!--BANNER ROTATIVO-->
<script>
i = 0;
var timer = setInterval(cambiar_banner, 5000);

var timer_mas_vistas = setInterval(cambiar_mas_vistas,4000);
var z = 0;
var art0 = <?php echo '["' . implode('", "', $mas_visitadas[0]) . '"]' ?>;
var art1 = <?php echo '["' . implode('", "', $mas_visitadas[1]) . '"]' ?>;
var art2 = <?php echo '["' . implode('", "', $mas_visitadas[2]) . '"]' ?>;

function cambiar_mas_vistas(){
	
	var link = document.getElementById("mas_vistas_href");
	var img_art = document.getElementById("mas_vistas_img");
	var titulo = document.getElementById("mas_vistas_txt");
	
	if (z == 0){
		img_art.src = '<?php echo $CONT_ESTATICO;?>' + art0[2];
		titulo.innerHTML = art0[1];
		link.href = "../presentacion/noticia.php?art=" 	+ art0[0];
	}else if (z == 1){
		img_art.src = '<?php echo $CONT_ESTATICO;?>' + art1[2];
		titulo.innerHTML = art1[1];
		link.href ="../presentacion/noticia.php?art=" 	+ art1[0];
	}else if (z == 2){
		img_art.src = '<?php echo $CONT_ESTATICO;?>' + art2[2];
		titulo.innerHTML = art2[1];
		link.href = "../presentacion/noticia.php?art=" 	+ art2[0];
	}
	z = z + 1;
	if (z >= 3){
		z = 0;
	}
}


/*Cambiar banner*/		
var p = <?php echo '["' . implode('", "', $banner) . '"]' ?>;

function cambiar_banner(){
	var img = document.getElementById("img_banner_p");
	img.src = '<?php echo $CONT_ESTATICO_PUB;?>' + p[i];
	i = i + 1;
	if (i >= p.length){
		i = 0;
	}
}
</script>