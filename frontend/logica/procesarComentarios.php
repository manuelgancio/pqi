<?php
session_start();
//Alta comentario
if (isset($_POST['btnComentar'])){
    //Recibo el comentario y el id de la noticia por POST 

    if(isset($_POST['comentario'])&& ($_POST['comentario'] != null)){
        $comentario = strip_tags($_POST['comentario']); 
    }
    if(isset($_POST['id_noticia'])){
        $id_noticia = $_POST['id_noticia'];
    }
    //Averiguo el id del usuario

    $correo = $_SESSION['Correo'];

    //LLamo a la clase usuario
    require_once($CLASES_DIR . 'usuario.class.php');
    $usu = New usuario();

    $usu->setCorreo($correo);
    $id_usuario = $usu->id();

    //Seteo el estado del comentario como true (Activo)
    $estado = true;

    //Fecha del comentario
    $fecha = date('Y-m-d');

    //LLamo a la clase comentario
    require_once($CLASES_DIR . 'comentarios.class.php');
    $c = New comentario();

    $c->setIdUsu($id_usuario);
    $c->setIdNoticia($id_noticia);
    $c->setComentario($comentario);
    $c->setFecha($fecha);
    $c->setEstado($estado);

    $alta = $c->altaComentario();

}

/* PROCESAR REPORTE DE COMENTARIO */
if (isset($_POST['btnReportar'])){
    $id_cm = $_POST['id_cm'];
    
    //Llamo clase comentarios
    require_once($CLASES_DIR . 'comentarios.class.php');
    $c = new comentario();

    $c->setId($id_cm);

    $reportar = $c->reportarComentario();


}