<?php
/* PATH */

    $PATH = $_SERVER["DOCUMENT_ROOT"].'/pqi/frontend';

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
    $PRESENTACION_DIR = $PATH .'/presentacion/';
    $CLASES_DIR = $PATH .'/clases/';
    $LOGICA_DIR = $PATH .'/logica/';
    $PERSISTENCIA_DIR = $PATH .'/persistencia/';
    $CSS_DIR = $PATH .'/css/';
    $JS_DIR = $PATH .'/js/';
    $IMG_DIR =$PATH .'/img/';
    $CONFIG_DIR =$PATH .'/config/';
    
/* Include */

    include($CONFIG_DIR.'dbconfig.php');
   
