<?php
require_once('model.php');
class usuario extends Model{

    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $contraseña;
    private $tel;
    private $suscripto; //boolean
    private $t_credito;
    private $estado;  

function __construct($id='',$nombre='',$apellido='',$correo='',$contraseña='',
$tel='',$suscripto='',$t_credito='',$estado=''){

    //Cargo el constructor de la superclase
    parent::__construct();

    $this->id=$id;
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->correo=$correo;
    $this->contraseña=$contraseña;
    $this->tel=$tel;
    $this->suscripto=$suscripto;
    $this->t_credito=$t_credito;
    $this->estado=$estado;

}
//SET
public function setId($id){
    $this->id=$id;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setApellido($apellido){
    $this->apellido=$apellido;
}
public function setCorreo($correo){
    $this->correo=$correo;
}
public function setTel($tel){
    $this->tel=$tel;
}
public function setPass($contraseña){
    $this->contraseña=$contraseña;
}
public function setSuscripto($suscripto){
    $this->suscripto=$suscripto;
}
public function setTcredito($t_credito){
    $this->t_credito=$t_credito;
}
public function setEstado($estado){
    $this->estado=$estado;
}
//GET

public function getId(){
    return $this->id;
}
public function getNombre(){
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getCorreo(){
    return $this->correo;
}
public function getTel(){
    return $this->tel;
}
public function getPass(){
    return $this->contraseña;
}
public function getSuscripto(){
    return $this->suscripto;
}
public function getTcredito(){
    return $this->t_credito;
}
public function getEstado(){
    return $this->estado;
}
//OTROS METODOS
public function correoExistente(){
//Verifica que el correo no se encuentre registrado
    $correo = $this->getCorreo();

    $sql="SELECT corre_c from cliente WHERE corre_c = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$correo);
    $result -> execute();

    $resultado = $result ->get_result();
    $row = $resultado->fetch_assoc();
    
    if ($row == NULL){//si row es null el correo no esta registrado (BIEN)
        return false;
    }else{
        return true;//si devuelve algo, el correo ya esta registrado (MAL; NO PUEDE REGISTRARSE)
    }
}
public function registroUsu(){
//Registro usuario
    $correo = $this -> getCorreo();
    $nombre = $this -> getNombre();
    $apellido = $this -> getApellido();
    $tel = $this -> getTel();
    $pwd = $this -> getPass();
    $suscripto = $this -> getSuscripto();
        if ($suscripto == '1'){// 1 = true
            $t_credito = $this -> getTcredito();
        }
    $estado = $this -> getEstado();
    
    //Hash contraseña
    $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);

    /* Si no se suscribe guardo todo el la base menos la tarjeta de credito */
    if($suscripto == 0){
        //Tabla persona
        $sql = ("INSERT INTO `persona`(`p_nomb`, `p_ap`, `tel`) VALUES (?,?,?)");
        $result = $this->_db->prepare($sql);
        $result -> bind_param('ssi',$nombre,$apellido,$tel);
        $result -> execute();
        //id_p es el id auto increment generado
        $id_p = $result->insert_id;
        
        //tabla usuario
        $sql="INSERT INTO `cliente`(`id_p`, `corre_c`, `pass_c`, `edo_cl`) VALUES (?,?,?,?)";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('issi',$id_p,$correo,$pwd_hash,$estado);
        $result -> execute();
        //id del cliente para usar en el registro de suscripcion
        $id_cl = $result->insert_id;
        return($id_cl);

    }else{//si se subscribe guardo en la base la tarjeta de credito tambien

        //Tabla persona
        $sql = ("INSERT INTO `persona`(`p_nomb`, `p_ap`, `tel`) VALUES (?,?,?)");
        $result = $this->_db->prepare($sql);
        $result -> bind_param('ssi',$nombre,$apellido,$tel);
        $result -> execute();
        //id_p es el id auto increment generado
        $id_p = $result->insert_id;
        
        //tabla usuario
        $sql="INSERT INTO `cliente`(`id_p`, `corre_c`, `pass_c`, `edo_cl`,`t_credito`) VALUES (?,?,?,?,?)";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('issii',$id_p,$correo,$pwd_hash,$estado,$t_credito);
        $result -> execute();

    }

    /* Si se suscribe llamo a la otra clase y metodo para guardar en la tabla suscripcion */
}
public function verPerfil(){
//davuelve datos del perfil
    $correo = $this->getCorreo();

    //Datos de la tabla cliente
    $sql ="SELECT `corre_c`, `pass_c`,`id_p` FROM `cliente` WHERE corre_c = ?";

    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$correo);
    $result -> execute();
    $resultado = $result->get_result();
    $datos_c = $resultado->fetch_assoc();
    
    //id_p = id en la tabla persona
    $id_p = $datos_c['id_p'];
    
    //datos de la tabla persona
    $sql="SELECT `p_nomb`, `p_ap`, `tel` FROM `persona` WHERE id_p = ?";

    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_p);
    $result ->execute();
    $resultado = $result->get_result();
    $datos_p = $resultado->fetch_assoc();
    
    $datos = array_merge($datos_p,$datos_c);
    return ($datos);
}
public function actualizarPerfil($correo_old){
//Actualiza correo tel y pass
    //datos nuevos
    $correo = $this->getCorreo();
    $pass = $this->getPass();
    $tel = $this->getTel();

    //Hash contraseña
    $pwd_hash = password_hash($pass, PASSWORD_DEFAULT);

    //update correo y pass 
    $sql="UPDATE `cliente` SET `corre_c`= ?, `pass_c`= ? WHERE `corre_c` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('sss',$correo,$pwd_hash,$correo_old);
    $result ->execute();

    //Averiguo id_p
    $sql="SELECT `id_p` FROM `cliente` WHERE `corre_c` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$correo);
    $result ->execute();
    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    $id_p = $row['id_p'];

    //update tel
    $sql="UPDATE `persona` SET `tel`= ? WHERE `id_p` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('ii',$tel,$id_p);
    $result ->execute();

    return (true);
}
public function id_p(){
//devuelve el id de la tabla persona
    $correo = $this->getCorreo();

    $sql="SELECT `id_p`FROM `cliente` WHERE `corre_c` =?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$correo);
    $result->execute();

    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    $id_p = $row['id_p'];

    return ($id_p);
}
public function login(){
//log in
    $correo=$this->getCorreo();
    $pwd=$this->getPass(); 
        
    $sql="SELECT corre_c FROM cliente where corre_c = ?";
    
    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$correo);
    $result->execute();

    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    if($row == NULL){ 
        //Si no devuelve nada el correo es incorrecto          
        return false;
    }
    else{ //Si el correo es correcto..
        
        $sql ="SELECT pass_c FROM cliente where corre_c = ?";

        $result =$this->_db->prepare($sql);
        $result-> bind_param('s',$correo);
        $result->execute();

        $resultado = $result->get_result();
        $pwd_base = $resultado->fetch_assoc();
        $pwd_base = $pwd_base['pass_c'];

        //Devuelve true si las password coinciden
        if (password_verify($pwd , $pwd_base)){
            return true;
        }else{
            return false;
        }
    }
}
public function id(){
//devuelve el id del usuario (id tabla cliente)
    $correo = $this->getCorreo();
    
    $sql="SELECT `id_cl` FROM `cliente` WHERE `corre_c` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('s',$correo);
    $result->execute();

    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    $id_cl = $row['id_cl'];

    return ($id_cl);
}
public function estadoSuscripcion(){
//devuelve true si el usuario esta suscripto o false si es gratis
    $correo = $this->getCorreo();
    $id_cl = $this->id();

    $sql="SELECT * FROM `gratis` WHERE `id_cl` =?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_cl);
    $result->execute();

    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();
    
    if ($row != NULL){
        return false;// el usuario es gratis
    }else{
        return true;//el usuario esta suscripto
    }
}
public function fbUsuExiste(){
/*  Devuelve id_p id_c y correo_c  si el id_fb ya esta registrado en la tabla,
    False si el usuario todavia no esta registrado
*/
    $id_fb = $this->getId();

    $sql="SELECT `id_cl`,`id_p`,`corre_c` FROM `cliente` WHERE `id_fb` = ?";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('i',$id_fb);
    $result->execute();

    $resultado = $result->get_result();
    $row = $resultado->fetch_assoc();

    if ($row == NULL){
        return false;
    }else{
        return ($row);
    }
    
}
public function fbRegistro(){
/*  Guardo datos del usuario que entra con fb por primera vez.
    Datos: id_fb, Nombre, Apellido ,Correo
*/
    $id_fb = $this->getId();
    $nombre = $this->getNombre();
    $apellido = $this->getApellido();
    $correo = $this->getCorreo();
    $estado = 1;

    //Guardo en tabla persona
    $sql="INSERT INTO `persona`(`p_nomb`, `p_ap`) VALUES (?,?)";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('ss',$nombre,$apellido);
    $result -> execute();
    //id_p es el id auto increment generado
    $id_p = $result->insert_id;
    
    //Guardo en la tabla cliente
    $sql="INSERT INTO `cliente`(`corre_c`, `edo_cl`, `id_p`, `id_fb`) VALUES (?,?,?,?)";
    $result = $this->_db->prepare($sql);
    $result -> bind_param('siii',$correo,$estado,$id_p,$id_fb);
    $result -> execute();

    return (true);

}


}
