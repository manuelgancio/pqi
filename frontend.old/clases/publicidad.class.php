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
/* Listo publicidades de las secciones del index */

    $espacio = 1; //index
    $fecha_hoy = date('Y-m-d');

    $sql="SELECT publicidad.publicacion AS p FROM publicidad, espacio, hay WHERE espacio.ubicacion = ? 
    AND publicidad.fecha_h > ? AND hay.id_pub = publicidad.id_pub AND hay.id_esp = espacio.id_esp";
    $result=$this->_db->prepare($sql);
    $result ->bind_param('ss',$espacio,$fecha_hoy);
    $result ->execute();
    $resultado = $result->get_result();

    $publicidades = array();
    while ($row = $resultado->fetch_assoc()){
        $publicidades[] = $row;
    }

    //Si no hay publicidades en esa publicacion...
    if ($publicidades == null){
        return (false); //Devuelve false
    }else{
        $i = array();
        foreach($publicidades as $p){//paso de array multi a simple
            $i[] = $p['p'];
        }
    return ($publicidades);
    }
}
public function listarPubNoticia(){
/* Publicidades para banner horizontal de pagina noticia 
   No depende de una seccion 
*/
    $espacio = 2; //noticias banner
    $fecha_hoy = date('Y-m-d');

    $sql="SELECT publicidad.publicacion AS p FROM publicidad, espacio, hay WHERE espacio.ubicacion = ? 
    AND publicidad.fecha_h > ? AND hay.id_pub = publicidad.id_pub AND hay.id_esp = espacio.id_esp";
    $result=$this->_db->prepare($sql);
    $result ->bind_param('ss',$espacio,$fecha_hoy);
    $result ->execute();
    $resultado = $result->get_result();

    $publicidades = array();
    while ($row = $resultado->fetch_assoc()){
        $publicidades[] = $row;
    }

    //Si no hay publicidades en esa publicacion...
    if ($publicidades == null){
        return (false); //Devuelve false
    }else{
        $i = array();
        foreach($publicidades as $p){//paso de array multi a simple
            $i[] = $p['p'];
        }
        
        $p = array_rand($i);
    return ($i[$p]);
    }
}
public function listarPubNoticiaXseccion($id_seccion){
/* Lista publicidades para banner vertical en pagina
   noticia segun seccion a la que pertenece */

    $espacio = 4; //id en tabla espacio
    $fecha_hoy = date('Y-m-d');

    //La id seccion la recibo por parametro

    $sql="SELECT publicidad.publicacion AS p FROM publicidad, hay, espacio, seccion WHERE publicidad.fecha_h > ? 
    AND espacio.ubicacion = ? AND publicidad.id_seccion = ? AND hay.id_pub = publicidad.id_pub AND hay.id_esp = espacio.id_esp
    AND publicidad.id_seccion = seccion.id_s";
    $result=$this->_db->prepare($sql);
    $result ->bind_param('sis',$fecha_hoy,$espacio,$id_seccion);
    $result ->execute();
    $resultado = $result->get_result();

    $publicidades = array();
    while ($row = $resultado->fetch_assoc()){
        $publicidades[] = $row;
    }

    //Si no hay publicidades en esa publicacion...
    if ($publicidades == null){
        return (false); //Devuelve false
    }else{
        $i = array();
        foreach($publicidades as $p){//paso de array multi a simple
            $i[] = $p['p'];
        }
        
        $p = array_rand($i);
    return ($i[$p]);
    }
}
public function listarPubSeccion($id_seccion){
/*Lista publicidad para la seccion elegida*/

    $espacio = 3;
    $fecha_hoy = date('Y-m-d');

    $sql="SELECT publicidad.publicacion AS p FROM publicidad, hay, espacio, seccion WHERE publicidad.fecha_h > ? 
    AND espacio.ubicacion = ? AND publicidad.id_seccion = ? AND hay.id_pub = publicidad.id_pub AND hay.id_esp = espacio.id_esp
    AND publicidad.id_seccion = seccion.id_s";
    $result=$this->_db->prepare($sql);
    $result ->bind_param('sis',$fecha_hoy,$espacio,$id_seccion);
    $result ->execute();
    $resultado = $result->get_result();

    $publicidades = array();
    while ($row = $resultado->fetch_assoc()){
        $publicidades[] = $row;
    }

    //Si no hay publicidades en esa publicacion...
    if ($publicidades == null){
        return (false); //Devuelve false
    }else{
        $i = array();
        foreach($publicidades as $p){//paso de array multi a simple
            $i[] = $p['p'];
        }
        
        $p = array_rand($i);
    return ($i[$p]);
    }
    
}
public function listarPubIndexBanner(){
/*  Devuelve una publicidad para el banner del index
    Selecciona aleatoriamente una de todas las activas
    No depende de una seccion
*/
    $espacio = 5; //Id espacio en la base (index banner)
    $fecha_hoy = date('Y-m-d');

    $sql="SELECT publicidad.publicacion AS p FROM publicidad, espacio, hay WHERE espacio.ubicacion = ? 
    AND publicidad.fecha_h > ? AND hay.id_pub = publicidad.id_pub AND hay.id_esp = espacio.id_esp";
    $result=$this->_db->prepare($sql);
    $result ->bind_param('is',$espacio,$fecha_hoy);
    $result ->execute();
    $resultado = $result->get_result();

    $publicidades = array();
    while ($row = $resultado->fetch_assoc()){
        $publicidades[] = $row;
    }

    //Si no hay publicidades en esa publicacion...
    if ($publicidades == null){
        return (false); //Devuelve false
    }else{
        $i = array();
        foreach($publicidades as $p){//paso de array multi a simple
            $i[] = $p['p'];
        }
        
    return ($i);
        //$p = array_rand($i);
    //return ($i[$p]);
    }
}
}