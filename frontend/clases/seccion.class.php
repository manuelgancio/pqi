<?php
require('model.php');

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
//GET
public function getId(){
    return $this->id;
}
public function getNombre(){
    return $this->nombre;
}
//otros metodos

public function listarSecciones(){
    //devuelve id y nombre de las secciones en la base
    $sql="SELECT `id_s`, `nombre` FROM `seccion`";
    
    $result = $this->_db->prepare($sql);
    $result->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_all();

    return ($row);
}
}