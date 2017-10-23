<?php
require_once('model.php');
class publicidad extends Model{

    private $id;
    private $fecha_i;
    private $fecha_f;
    private $precio;
    private $img;
    private $tipo;

function __construct($id='',$fecha_i='',$fecha_f='',$precio='',$img='',$tipo=''){

    //Cargo el constructor de la superclase
    parent::__construct();

    $this->id=$id;
    $this->fecha_i=$fecha_i;
    $this->fecha_f=$fecha_f;
    $this->precio=$precio;
    $this->img=$img;
    $this->tipo=$tipo;

}

//SET
public function setId($id){
    $this->id=$id;
}
public function setFechaI($fecha_i){
    $this->fecha_i=$fecha_i;
}
public function setFechaF($fecha_f){
    $this->fecha_f=$fecha_f;
}
public function setPrecio($precio){
    $this->precio=$precio;
}
public function setImg($img){
    $this->img=$img;
}
public function setTipo($tipo){
    $this->tipo=$tipo;
}
//GET
public function getId(){
    return $this->id;
}
public function getFechaI(){
    return $this->fecha_i;
}
public function getFechaF(){
    return $this->fecha_f;
}
public function getPrecio(){
    return $this->precio;
}
public function getImg(){
    return $this->img;
}
public function getTipo(){
    return $this->tipo;
}
/// otros metodos
public function listarPubIndex(){
//Devuelve array con las publicidades

}
public function listarPubNoticia(){
//Devuelve la ruta a la img de una publicidad que este en fecha valida
//De todas la publicidades selecciona una aleatoriamente
//Banner Noticia = espacio 2 (bd)

    $espacio = 2;
    $fecha_hoy = date('Y-m-d');
    //Averiguo los id de las publicaciones en ese espacio
    $sql="SELECT `id_pub` FROM `hay` WHERE `id_esp` = ?";

    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$espacio);
    $result -> execute();
    $resultado = $result->get_result();
    
    $publicidades = array();
    while ($row = $resultado->fetch_assoc()){
        $publicidades[] = $row;//ids de las publicidades
    }
    
    //Si no hay publicidades en esa publicacion...
    if ($publicidades == null){
        return (false); //Devuelve false
    }else{
        $i = array();
        foreach($publicidades as $p){//paso de array multi a simple
            $i[] = $p['id_pub'];
        }
        
        $publicidad = implode(' OR ',$i); //convierto array a strig separado por 'OR' para consultar a la base
       
        $sql="SELECT `publicacion` FROM `publicidad` WHERE `fecha_h` > ? AND (`id_pub` = ?)";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('si',$fecha_hoy,$publicidad);
        $result -> execute();
        $resultado = $result->get_result();

        $banners = array();
        while ($row = $resultado->fetch_assoc()){
            $banners[]=$row;//todos las direcciones de las publicidades que puedo listar
        }
        
        
        $publi = array_rand($banners);
        $banner = $banners[$publi];//Ruta img banner
        return($banner);
    }
}

}