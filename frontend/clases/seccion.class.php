<?php
require_once('model.php');

class seccion extends Model{

    private $id;
    private $nombre;
    private $visitas;
    private $id_edicion;

function __construct($id='',$nombre='',$visitas='',$id_edicion='')
{
    //Cargo el constructor de la superclase
    parent::__construct();


    $this->id=$id;
    $this->nombre=$nombre;
    $this->visitas=$visitas;
    $this->id_edicion=$id_edicion;

}
//SET
public function setId($id){
    $this->id=$id;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setVisitas($visitas){
    $this->visitas=$visitas;
}
//GET
public function getId(){
    return $this->id;
}
public function getNombre(){
    return $this->nombre;
}
public function getVisitas(){
    return $this->visitas;
}
//OTROS METODOS

public function listarSecciones(){
//Devuelve id y nombre de todas las secciones
    $sql="SELECT `id_s`, `nombre` FROM `seccion`";
    
    $result = $this->_db->prepare($sql);
    $result->execute();
    $resultado = $result->get_result();
    //$row = $resultado->fetch_assoc();

    $secciones = array();
    while ($row = $resultado->fetch_assoc()) {
      $secciones[] = $row;
    }

    return ($secciones);
}
public function nombreSeccion(){
//devuelve el nombre de la seccion segun id

    $id_s = $this->getId();

    $sql="SELECT `nombre`FROM `seccion` WHERE `id_s` =?";
    
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_s);
    $result->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();

    return ($row);

}
public function visita(){
/* Suma una visita al contador de visitas de cada seccion en la base de datos*/
    $id_seccion = $this->getId();
    //Averiguo cantidad de visitas actuales
    $sql="SELECT `contador` FROM `seccion` WHERE `id_s` =?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_seccion);
    $result->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();

    $visitas = $row['contador'];
   
    //Sumo una visita
    $visitas = $visitas + 1;
    //Guardo la nueva cant de visitas en la base
    $sql="UPDATE `seccion` SET `contador`= ? WHERE `id_s` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('ii',$visitas,$id_seccion);
    $result->execute();

    return (true);
    
}
}