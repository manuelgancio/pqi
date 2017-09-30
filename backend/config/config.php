<?php
    
    
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        ini_set('display_errors','on');

    $PATH = $_SERVER["DOCUMENT_ROOT"] ;
    
    //echo $PATH;

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
    $CONFIG_DIR =$PATH .'/config/';


include($CONFIG_DIR.'dbconfig.php');