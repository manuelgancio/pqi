<?php
    
    
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        ini_set('display_errors','on');

    $PATH = $_SERVER["DOCUMENT_ROOT"];


    $IP_SERV = $_SERVER['SERVER_NAME'] ;
    //echo $PATH;

    //$CONT_ESTATICO ='192.168.43.85/img_publicidad/';
$CONT_ESTATICO_PUB = 'http://192.168.43.85/img_publicidad/';
    $IP_CONT_ESTATICO ='192.168.43.85';

    #PARA LLAMAR DESDE HTML#
    $PRESENTACION='/presentacion/';
    $CLASES='/clases/';
    $CSS='/css/';
    $LOGICA='/logica/';
    $PERSISTENCIA='/persistencia/';
    $JS ='/js/';
    $IMG ='/images';
    $CONFIG ='/config/';
    #PARA LLAMAR DESDE PHP#
    $PRESENTACION_DIR = $PATH .'/presentacion/';
    $CLASES_DIR = $PATH .'/clases/';
    $LOGICA_DIR = $PATH .'/logica/';
    $PERSISTENCIA_DIR = $PATH .'/persistencia/';
    //$CONFIG_DIR =$PATH .'/config/';
    $CONFIG_DIR = '/var/www/config/';

include($CONFIG_DIR.'dbconfig.php');