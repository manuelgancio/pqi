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

function __construct($id='',$titulo='',$noticia='',$seccion='',$fecha='',$autor='',$destacado='',$comentario='')
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
//OTROS METODOS
public function listarArt(){
    $id_a = $this->getId();

    $sql="SELECT * FROM articulo where id_a = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_a);
    $result ->execute();
    $resultado = $result->get_result();
    $art = $resultado->fetch_assoc();

    return($art);
}
public function listarArtXsec($offset,$artXPag){
//Devuelve todas las noticias de la seccion
    //offset y artXPag paso por la funcion

    $id_s = $this -> getSeccion();
//die(var_dump($offset,$artXPag));
    $sql="SELECT `id_a`, `titulo`, `fecha_a`, `contenido`, `autor`, `id_s` FROM articulo WHERE `id_s` = ? LIMIT ?, ?";
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
public function comentarArt(){

}
public function compartirArt(){

}
public function megustaArt(){

}
public function busquedaArt(){

}
public function filtrarXfecha(){

}


}