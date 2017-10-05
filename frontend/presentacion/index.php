<body>
    <?php 
        include $PRESENTACION_DIR ."header.php";
    ?>
    <!-- PORTADA -->
    <div class="well well-sm text-muted" id="portada"><h3>PORTADA</h3></div>

<?php 
//LLamo a la clase articulo
	require_once($CLASES_DIR . 'articulo.class.php');

	$articulo = New articulo();
	$articulo->setFecha(date('y-m-d'));
	
	$articulos_d = $articulo->listarArtDest();

	//die(var_dump($articulos_d));
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
<div class="well well-sm text-muted" id="politica"><h3>POLÍTICA</h3></div>
<div class="container">
  <div class="row">
  
    <div class="noticia col-sm-3">
      <a href="#">
        <div class="img-noticia"><img alt="" src="http://placehold.it/300x200/dddddd/333333"></div>
        <div class="titulo">Titulo noticia</div>
      </a>
    </div>

    <div class="noticia col-sm-3">
      <a href="#">
        <div class="img-noticia"><img alt="" src="../img/bonomi.jpg"></div>
        <div class="titulo">Ajuste de cuentas</div>
      </a>
    </div>

    <div class="noticia col-sm-3">
      <a href="#">
        <div class="img-noticia"><img alt="" src="http://placehold.it/300x200/dddddd/333333"></div>
        <div class="titulo">Titulo noticia 3</div>
      </a>
    </div>
    
    <div class="publicidad col-sm-2">

    </div>
    
  </div><!--row-->

  <div class="row">
	  <div class="noticia col-sm-3">
      <a href="#">
        <div class="img-noticia"><img alt="" src="../img/bonomi.jpg"></div>
        <div class="titulo">Ajuste de cuentas</div>
      </a>
    </div>

    <div class="noticia col-sm-3">
      <a href="#">
        <div class="img-noticia"><img alt="" src="http://placehold.it/300x200/dddddd/333333"></div>
        <div class="titulo">Titulo noticia</div>
      </a>
    </div>

    <div class="noticia col-sm-3">
      <a href="#">
        <div class="img-noticia"><img alt="" src="http://placehold.it/300x200/dddddd/333333"></div>
        <div class="titulo">Titulo noticia 3</div>
      </a>
    </div>
    
    <div class="publicidad col-sm-2">

    </div>
    
  </div><!--row-->
</div><!--container-->

<div class="well well-sm text-muted"><h3>DEPORTE</h3></div>


</body>