<?php
require_once('model.php');

class articulo extends Model{
    private $id;
    private $titulo;
    private $noticia;
    private $seccion;
    private $fecha;
    private $autor;
    private $destacado; //boolean
    private $comentario;//string de ids de comentario
    private $visita;

function __construct($id='',$titulo='',$noticia='',$seccion='',$fecha='',$autor='',$destacado='',$comentario='',$visita='')
{
    //Cargo el constructor de la superclase
    parent::__construct();

    $this->id=$id;
    $this->titulo=$titulo;
    $this->noticia=$noticia;
    $this->seccion=$seccion;
    $this->fecha=$fecha;
    $this->autor=$autor;
    $this->destacado=$destacado;
    $this->comentario=$comentario;
    $this->visita=$visita;

}
//SET
public function setId($id){
    $this->id=$id;
}
public function setTitulo($titulo){
    $this->titulo=$titulo;
}
public function setNoticia($noticia){
    $this->setNoticia=$noticia;
}
public function setSeccion($seccion){
    $this->seccion=$seccion;
}
public function setFecha($fecha){
    $this->fecha=$fecha;
}
public function setAutor($autor){
    $this->autor($autor);
}
public function setDestacado($destacado){
    $this->destacado($destacado);
}
public function setComentario($comentario){
    $this->comentatio($comentario);
}
public function setVisita($visita){
    $this->visita($visita);
}
//GET
public function getId(){
    return $this->id;
}
public function getTitulo(){
    return $this->titulo;
}
public function getNoticia(){
    return $this->noticia;
}
public function getSeccion(){
    return $this->seccion;
}
public function getFecha(){
    return $this->fecha;
}
public function getAutor(){
    return $this->autor;
}
public function getDestacado(){
    return $this->destacado;
}
public function getComentario(){
    return $this->comentario;
}
public function getVisita(){
    return $this->visita();
}
//OTROS METODOS
public function listarArt(){
/* Devuelve la informacion de un articulo segun su id */
    $id_a = $this->getId();

    $sql="SELECT * FROM articulo where id_a = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_a);
    $result ->execute();
    $resultado = $result->get_result();
    $art = $resultado->fetch_assoc();

    return($art);
}
public function listartArtXSecPortada(){
/* Devuelve las 6 ULTIMAS noticias en una seccion determida
   y en una fecha determinada
*/
    $id_s = $this -> getSeccion();
    $fecha = $this-> getFecha();

    $sql="SELECT `id_a`,`fecha_a`, `titulo`, `contenido`, `autor`, `id_s` FROM articulo WHERE `id_s` = ? AND  `fecha_a` = ? ORDER BY `fecha_a` DESC LIMIT 6";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('is',$id_s,$fecha);
    $result -> execute();
    $resultado = $result->get_result();
    
    $articulos = array();
    while ($row = $resultado->fetch_assoc()){
        $articulos[] = $row;
    }
    
    return ($articulos);
}
public function listarArtXsec($offset,$artXPag){
/* Devuelve todas las noticias de la seccion con limite para paginacion.
   offset y artXPag paso por la funcion
*/
    $id_s = $this -> getSeccion();

    $sql="SELECT `id_a`, `titulo`, `fecha_a`, `contenido`, `autor`, `id_s` FROM articulo WHERE `id_s` = ? ORDER BY fecha_a DESC LIMIT ?, ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('iii',$id_s,$offset,$artXPag);
    $result -> execute();
    $resultado = $result->get_result();
    
    $articulos = array();
    while ($row = $resultado->fetch_assoc()){
        $articulos[] = $row;
    }
    
    return ($articulos);
   
}
public function cantArtXListar(){
/* Devuelve cantidad de ariticulos para listar en una categoria
   Usado para calcular cantidad de paginas al listar todos los art
   de una categoria
*/
    $id_s = $this-> getSeccion();

    $sql="SELECT COUNT(id_a) as cant FROM articulo WHERE id_s = ?";
    $result = $this->_db->prepare($sql);
    $result ->bind_param('i',$id_s);
    $result ->execute();
    $resultado = $result->get_result();
    $cant = $resultado->fetch_assoc();

    return($cant);

 
}
public function listarArtDest(){
//Devuelve array de articulos destacados del día
    $fecha = $this->getFecha();

    $sql="SELECT `id_a`, `titulo`, `contenido`, `autor`, `id_s` FROM `articulo` WHERE `art_d` = true AND `fecha_a` =?";

    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$fecha);
    $result -> execute();
    $resultado = $result->get_result();
    
    $articulos = array();
    while ($row = $resultado->fetch_assoc()){
        $articulos[] = $row;
    }
    
    return ($articulos);
}
public function verificarFecha(){
/*Verifica que en esa fecha de edicion haya algun articulo publicado 
/  Devuelve true si hay y false en caso de que no haya nada
*/
    $fecha = $this->getFecha();

    $sql="SELECT `id_a` FROM `articulo` WHERE `fecha_a` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$fecha);
    $result -> execute();
    $resultado = $result->get_result();

    $a = array();
    while ($row = $resultado->fetch_assoc()){
        $a[]= $row;
    }
    if($a == null){//No hay articulos
        return (false);
    }else{//hay articulos
        return (true);
    }

}
public function visita(){
/* Suma una visita al contador de visitas de cada articulo en la base de datos*/
    $id_art = $this->getId();
    //Averiguo cantidad de visitas actuales
    $sql="SELECT `contador_a` FROM `articulo` WHERE `id_a` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_art);
    $result->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    $visitas = $row['contador_a'];
       
    //Sumo una visita
    $visitas = $visitas + 1;
    //Guardo la nueva cant de visitas en la base
    $sql="UPDATE `articulo` SET `contador_a`= ? WHERE `id_a` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('ii',$visitas,$id_art);
    $result->execute();
    
    return (true);
        
}
public function like(){
/*  Dar me gusta a un articulo, guardar en la base
    Bloquear icono luego de que se da mg
*/
    $id_art = $this->getId();

    //Averiguo la cantidad de likes
    $sql="SELECT `likes` FROM `articulo` WHERE id_a = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_art);
    $result->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    $likes = $row['likes'];
    //sumo 1 like
    $likes = $likes + 1;

    //Guardo nuevo like en la base
    $sql="UPDATE `articulo` SET `likes`= ? WHERE id_a = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('ii',$likes,$id_art);
    $result->execute();

    return (true);
    
}
public function busquedaArt(){

}
public function filtrarXfecha(){

}


}