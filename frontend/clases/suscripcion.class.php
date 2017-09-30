<?php
require_once('model.php');
class suscripcion extends Model{

    private $id;
    private $id_usu;
    private $t_credito;
    private $tipo_sus;
    private $fecha_i;
    private $fecha_f;
    
    function __construct($id='',$id_usu='',$t_credito='',$tipo_sus='',$fecha_i='',$fecha_f=''){

        //Cargo el constructor de la superclase
        parent::__construct();
    
        $this->id = $id;
        $this->id_usu = $id_usu;
        $this->t_credito = $t_credito;
        $this->tipo_sus = $tipo_sus;
        $this->fecha_i = $fecha_i;
        $this->fecha_f = $fecha_f;
    }

    //SET
public function setId($id){
    $this->id=$id;
}
public function setIdUsu($id_usu){
    $this->id_usu=$id_usu;
}
public function setTipoSus($tipo_sus){
    $this->tipo_sus=$tipo_sus;
}
public function setFechaI($fecha_i){
    $this->fecha_i=$fecha_i;
}
public function setFechaF($fecha_f){
    $this->fecha_f=$fecha_f;
}
public function setTcredito($t_credito){
    $this->t_credito=$t_credito;
}    
//GET
public function getId(){
    return $this->id;
}
public function getIdUsu(){
    return $this->id_usu;
}
public function getTipoSus(){
    return $this->tipo_sus;
}
public function getFechaI(){
    return $this->fecha_i;
}public function getFechaF(){
    return $this->fecha_f;
}
public function getTcredito(){
    return $this->t_credito;
}
    //OTROS METODOS
public function altaSus(){
//
    $id_usu = $this->getIdUsu();
    $tipo = $this->getTipoSus();
    $fecha_i = $this->getFechaI();
    $t_credito = $this->getTcredito();
    
    //guardo en tabla pago la tarjeta y el id del cliente
    $sql="INSERT INTO `pago`(`ntarj`, `id_cl`) VALUES (?,?)";
    $result = $this->_db->prepare($sql);
    $result-> bind_param('ii',$t_credito,$id_usu);
    $result->execute();

    //$resultado = $result->get_result();
    //$row = $resultado->fetch_assoc();
    //id tabla pago
    $id_pago = $result->insert_id;

    //inerto los datos de la suscripcion en la tabla suscribe
    $sql="INSERT INTO `suscripcion`(`plan`, `fecha_d`) VALUES (?,?)";
    $result = $this->_db->prepare($sql);
    $result->bind_param('is',$tipo,$fecha_i);
    $result->execute();

    $id_sus= $result->insert_id;

    //inserto los id en la tabla relacion recive
    $sql="INSERT INTO `recibe`(`id_cp`, `id_sus`) VALUES (?,?)";
    $result = $this->_db->prepare($sql);
    $result->bind_param('ii',$id_pago,$id_sus);
    $result->execute();
    
    //Borro en la tabla gratis en caso que el usuario este registrado ahi

    $sql="DELETE FROM `gratis` WHERE `id_cl`=?";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_usu);
    $result->execute();

    
    return(true);
}
public function noSuscribe(){
//Cuando el usuario se registra pero no se suscribe guardo su id en la tabla gratis
    $id_usu = $this->getIdUsu();

    $sql="INSERT INTO `gratis`(`id_cl`) VALUES (?)";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_usu);
    $result->execute();

}
public function bajaSus(){
//Borra de la tabla suscribe, recibe y pago - agrega a la tabla gratis

    $id_cl= $this->getIdUsu();

    //Averiguo id tabla pago
    $sql="SELECT `id_cp` FROM `pago` WHERE `id_cl`=?";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_cl);
    $result->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    $id_pago = $row['id_cp'];
    
    //Averiguo id tabla suscripcion 
    $sql="SELECT `id_sus` FROM `recibe` WHERE `id_cp` =?";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_pago);
    $result->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();

    $id_sus = $row['id_sus'];
       
    //Borro linea de la tabla recibe
    $sql="DELETE FROM `recibe` WHERE `id_cp`=?";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_pago);
    $result->execute();

    //Borro linea de tabla suscripcion
    $sql="DELETE FROM `suscripcion` WHERE `id_sus`=?";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_sus);
    $result->execute();

    //Borro linea de la tabla pago
    $sql="DELETE FROM `pago` WHERE `id_cp`=?";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_cp);
    $result->execute();

    // Guardo en tabla gratis
    $sql="INSERT INTO `gratis`(`id_cl`) VALUES (?)";
    $result = $this->_db->prepare($sql);
    $result->bind_param('i',$id_cl);
    $result->execute();

    return (true);
}

}    