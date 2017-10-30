<?php
require_once('model.php');

class comentario extends Model{
    private $id;
    private $id_usuario;
    private $nom_usuario;
    private $id_noticia;
    private $fecha;
    private $comentario;
    private $estado;
   

function __construct($id='',$id_usuario='',$nom_usuario='',$id_noticia='',$fecha='',$comentario='',$estado='')
{
    //Cargo el constructor de la superclase
    parent::__construct();

    $this->id=$id;
    $this->id_usuario=$id_usuario;
    $this->nom_usuario=$nom_usuario;
    $this->id_noticia=$id_noticia;
    $this->fecha=$fecha;
    $this->comentario=$comentario;
    $this->estado=$estado;

}
public function setId($id){
    $this->id=$id;
}
public function setIdUsu($id_usuario){
    $this->id_usuario=$id_usuario;
}
public function setNomUsu($nom_usuario){
    $this->nom_usuario=$nom_usuario;
}
public function setIdNoticia($id_noticia){
    $this->id_noticia=$id_noticia;
}
public function setFecha($fecha){
    $this->fecha=$fecha;
}
public function setComentario($comentario){
    $this->comentario=$comentario;
}
public function setEstado($estado){
    $this->estado=$estado;
}
//GET
public function getId(){
    return $this->id;
}
public function getIdUsu(){
    return $this->id_usuario;
}
public function getNomUsu(){
    return $this->nom_usuario;
}
public function getIdNoticia(){
    return $this->id_noticia;
}
public function getFecha(){
    return $this->fecha;
}
public function getComentario(){
    return $this->comentario;
}
public function getEstado(){
    return $this->estado;
}

public function altaComentario(){
//Guarda un comentario realizado 
    $id_usuario = $this->getIdUsu();
    $id_noticia = $this->getIdNoticia();
    $fecha = $this->getFecha();
    $comentario = $this->getComentario();
    $estado = $this->getEstado();

    //Guardo en la tabla Comentario 
    $sql ="INSERT INTO `comentario`(`comentario`, `estado`, `fecha_c`) VALUES (?,?,?)";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('sis',$comentario,$estado,$fecha);
    $result -> execute();
    //Guardo el id del comentario 
    $id_c = $result->insert_id;

    //Guardo en la tabla hace (Cliente ->hace->Comentario)
    $sql ="INSERT INTO `hace`(`id_cm`, `id_cl`) VALUES (?,?)";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('ii',$id_c,$id_usuario);
    $result -> execute();

    //Guardo en la tabla tiene (Noticia tiene comentario)
    $sql="INSERT INTO `tiene`(`id_cm`, `id_a`) VALUES (?,?)";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('ii',$id_c,$id_noticia);
    $result -> execute();

    return (true);
}
public function listarComentarios(){
/*  Devuelve los comentarios de una publicacion
*/
    $id_noticia = $this->getIdNoticia();
    
    //Consulto a la base
    $sql="SELECT comentario.id_cm, comentario.comentario, comentario.fecha_c FROM comentario, hace, tiene 
    WHERE (comentario.estado = 1) AND (tiene.id_a = ?) AND (hace.id_cm = comentario.id_cm) AND (tiene.id_cm = hace.id_cm)";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_noticia);
    $result -> execute();
    $resultado = $result->get_result();

    $comentarios = array();
    while ($row = $resultado->fetch_assoc()){
        $comentarios[] = $row;
    }

    //Si no hay comentarios devuelvo false
    if ($comentarios == null){
        return (false); 
    }else{
        return ($comentarios);//Devuelvo los comentarios
    }
}
public function listarComentariosold(){
//Devuelve array con los comentarios de una publicacion 

    $id_noticia = $this->getIdNoticia();
    //Averiguo el id de los comentarios realizados en esa noticia
    $sql="SELECT `id_cm` FROM `tiene` WHERE `id_a` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_noticia);
    $result -> execute();
    $resultado = $result->get_result();
    
    $comentarios = array();
    while ($row = $resultado->fetch_assoc()){
        $comentarios[] = $row;
    }
    
    //Si no hay comentarios en esa publicacion...
    if ($comentarios == null){
        return (false); //Devuelve false
    }else{
        $i = array();
        foreach($comentarios as $c){//paso de array multi a simple
            $i[] = $c['id_cm'];
        }
        $c = implode(' OR ',$i); //convierto array a strig separado por 'OR' para consultar a la base
        //Traigo los datos de los comentarios
        $sql="SELECT * FROM `comentario` WHERE `estado` = 1 AND (?)";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('s',$c);
        $result -> execute();
        $resultado = $result->get_result();

        $co = array();
        while ($row = $resultado->fetch_assoc()){
            $co[]=$row;//id_cm, comentario, fecha, estado 
        }
        return ($co);
    }
}
public function cantComentarios(){
//Devulve cantidad de comentarios que tiene una noticia
    $id_noticia = $this->getIdNoticia();

    $sql="SELECT COUNT(`id_cm`) AS cant FROM `tiene` WHERE `id_a` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_noticia);
    $result -> execute();
    $resultado = $result->get_result();
    $resultado = $resultado->fetch_assoc();
    if($resultado != null){
        $cant = $resultado;
    }else{
        $cant=0;
    }
    
    return($cant);
}
}
