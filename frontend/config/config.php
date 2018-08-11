<?php
/* MOSTRAR ERROES */

 	date_default_timezone_set('America/Montevideo');

	ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        ini_set('display_errors','on');
/* PATH */

   	$PATH = $_SERVER["DOCUMENT_ROOT"].'/pqi/frontend';

	$CONT_ESTATICO = 'http://192.168.43.85/img_noticias/';

	$CONT_ESTATICO_PUB = 'http://192.168.43.85/img_publicidad/';

/* Sanitizacion de url*/
    $url = $_SERVER['REQUEST_URI'];
    $url_limpia = filter_var($url, FILTER_SANITIZE_STRING);
    $_SERVER['REQUEST_URI'] = $url_limpia;

    
/* Rutas */
    $RUTA ='/pqi/frontend';

    #PARA LLAMAR DESDE HTML#
    $PRESENTACION=$RUTA . '/presentacion';
    $CLASES=$RUTA .'/clases';
    $CSS=$RUTA .'/css';
    $LOGICA=$RUTA .'/logica';
    $PERSISTENCIA=$RUTA .'/persistencia';
    $JS =$RUTA .'/js';
    $IMG =$RUTA .'/img';
    $CONFIG =$RUTA .'/config';
    #PARA LLAMAR DESDE PHP#

    //$PRESENTACION_DIR = '/pqi/frontend/presentacion/';
//$CLASES_DIR = '/var/www/html/pqi/frontend/clases/';
//$LOGICA_DIR = '/var/www/html/pqi/frontend/logica/';
//$CSS_DIR = '/var/www/html/pqi/frontend/css/';
//$IMG_DIR = '/var/www/html/pqi/frontend/img/';
//$CONFIG_DIR = '/var/www/html/pqi/frontend/config/';
 
	$PRESENTACION_DIR = $PATH .'/presentacion/';
    $CLASES_DIR = $PATH .'/clases/';
    $LOGICA_DIR = $PATH .'/logica/';
    $PERSISTENCIA_DIR = $PATH .'/persistencia/';
    $CSS_DIR = $PATH .'/css/';
    $JS_DIR = $PATH .'/js/';
    $IMG_DIR =$PATH .'/img/';
    $CONFIG_DIR ='var/www/config/';
    
/* Include */

    include('dbconfig.php');
    include($PRESENTACION_DIR.'footer.php');
   
