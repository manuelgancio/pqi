<?php


require('model.php');

class userModel extends Model{

    public $idP;
    public $username;
    public $password;
    public $cargo;
    public $nombre;
    public $apellido;
    public $telefono;
    public $seccion;


    public function __construct($username='',$password='',$cargo='',$nombre='',$apellido='',$seccion=''){
        // Carga el constructor de la superclase
        parent::__construct();

        $this->username=$username;
        $this->password=$password;
        $this->cargo=$cargo;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->seccion=$seccion;
    }

    public function setId($idP){
    $this->idP=$idP;
    }  
    public function setUsername($username){
    $this->username=$username;
    }   
    public function setPassword($password){
    $this->password=$password;
    } 
    public function setCargo($cargo){
    $this->cargo=$cargo;
    }
    public function setNombre($nombre){
    $this->nombre=$nombre;
    }
    public function setApellido($apellido){
    $this->apellido=$apellido;
    }
    public function setTelefono($telefono){
    $this->telefono=$telefono;
    }
    public function setSeccion($seccion){
    $this->seccion=$seccion;
    }

    public function getIdp(){
    return $this->idP;
    }
    public function getUsername(){
    return $this->username;
    }
    public function getPassword(){
    return $this->password;
    }
    public function getCargo(){
    return $this->cargo;
    }
    public function getNombre(){
    return $this->nombre;
    }
    public function getApellido(){
    return $this->apellido;
    }
    public function getTelefono(){
    return $this->telefono;
    }
    public function getSeccion(){
    return $this->seccion;
    }

    public function administradores(){


        $sqladmin="select p.id_p, p.p_nomb, p.p_ap, e.cargo, e.e_correo from persona p
               inner join empleado e 
               where p.id_p = e.id_p;";

        $result = mysqli_query($this->_db,$sqladmin);

         while($row=mysqli_fetch_array($result)){


                   

            echo "<div class='section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                         

                        <form action='../logica/eliminarAdmin.php' method='POST'> 
                        <input type='hidden' name='idP' id='idP' value=" . $row[0] . " />
                        <table class='table table-hover table-striped'>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href='#'><i class='fa fa-2x fa-fw fa-eye-slash'></i></a>
                                        <a href='#'><i class='-alt fa fa-2x fa-eye fa-fw'></i></a>
                                    </td>
                                    <td>
                                        <h4>
                                            <b>" . $row[3] . "</b>
                                        </h4>
                                        <p>@pqi.com</p>
                                    </td>
                                    <td>
                                        <img src='http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png' class='img-circle' width='60'>
                                    </td>
                                    <td>
                                        <h4>
                                            <b> " . $row[1], $row[2] . "</b>
                                        </h4>
                                        <a href='mailto:ramonvillaw@gmail.com'>" . $row[4] . "</a>
                                    </td>
                                    <td>2 años</td>
                                    <td>
                                        <div class='btn-group'>

                                            <button class='btn btn-default' value='left' type='submit'>
                                                <i class='fa fa-fw s fa-remove'></i>Eliminar</button>


                                            <button class='btn btn-default' value='right' type='button'>
                                                <i class='fa fa-fw fa-cog'></i>Configurar</button>
                                        </div>
                                    </td>
                                </tr>
                               
                               
                            </tbody>
                        </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        
";
                       
                   }
                   }

        

    public function save(){

        $query = "INSERT INTO users(username, password) VALUES (?,?)";
        $hash_password = password_hash($this->password, PASSWORD_DEFAULT);


        $stmt = $this->_db->prepare($query);
        $stmt -> bind_param('ss',$this->username, $hash_password);

        $stmt->execute();


        if( $stmt->affected_rows == 1 ){
           return True;
        }
        else{
           return False;
    }
    }
    public function categoria(){
        $correo=$this->getUsername();
        $sql1="SELECT cargo FROM empleado WHERE e_correo = ?";
        $result = $this->_db->prepare($sql1);
        $result -> bind_param('s',$correo);
        $result->execute();
        $resultado = $result->get_result();
        //echo '<script>alert("' . $resultado . '")</script>';

        $row = $resultado->fetch_assoc();

        if($resultado == NULL){ 
            
            return false;
        }
        else{       

            return $row['cargo'];
        }
    } 

     public function ingresarAdmin(){

        $query = "INSERT INTO persona( id_p, p_nomb, p_ap, tel) VALUES (?,?,?,?)";
        

        $hash_password = password_hash($this->password, PASSWORD_DEFAULT);
        
        $id_p = "";
        $id_e = "";
        $seccion= "";
        $cargo= "Admin";

        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('ssss',$id_p, $this->nombre, $this->apellido, $this->telefono );
        $resultado->execute();

        $lastIdP = $resultado -> insert_id;

        $query = "INSERT INTO empleado( id_e, e_correo, pass_e, cargo, seccion, id_p) VALUES (?,?,?,?,?,?)";
        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('ssssss',$id_e, $this->username, $this->password, $cargo, $seccion, $lastIdP );
        $resultado->execute();

        echo "<script type=\'text/javascript\'>alert(\'Usuario ingresado correctamente. \');</script>";
        
    } 
 
    public function eliminarAdmin(){

         $query = "DELETE FROM empleado e WHERE e.id_p = ? ";
         $query = "DELETE FROM persona p WHERE p.id_p = ? ";

         $consulta = $this->_db->prepare($query);
         $consulta -> bind_param('i',$this->idP);
         $consulta->execute();
         echo "<script type=\'text/javascript\'>alert(\'Usuario eliminado correctamente. \');</script>";
        
    } 


    public function validate(){

        $correo=$this->getUsername();
        $pass=$this->getPassword(); 

        $sql="SELECT * FROM empleado where e_correo = ? AND pass_e = ?";

        $result = $this->_db->prepare($sql);

        $result -> bind_param('ss',$correo,$pass);

        $result->execute();

        $resultado = $result->get_result();
        $row = $resultado->fetch_assoc();

        
        if($row == NULL){ 
            
            echo "<script type=\"text/javascript\">alert(\"Error de autentificacion. \");</script>"; 
          
            return false;
        }
        else{       

            echo "<script type=\"text/javascript\">alert(\"Usuario ingresado correctamente. \");</script>"; 
            return true;
        }

    }

}
