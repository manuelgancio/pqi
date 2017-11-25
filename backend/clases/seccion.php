<?php


require('model.php');

class claseSeccion extends Model{

    public $idS;
    public $nomSeccion;
    public $contador;
    public $ided;
   


    public function __construct($idS='',$nomSeccion='',$contador='',$ided=''){
        // Carga el constructor de la superclase
        parent::__construct();

        $this->idS=$idS;
        $this->nomSeccion=$nomSeccion;
        $this->contador=$contador;
        $this->ided=$ided;
        
    }

    public function setId($idS){
    $this->idS=$idS;
    }  
    public function setNombre($nomSeccion){
    $this->nomSeccion=$nomSeccion;
    }   
    public function setContador($contador){
    $this->contador=$contador;
    } 
    public function setIded($ided){
    $this->ided=$ided;
    }
   

    public function getIdS(){
    return $this->idS;
    }
    public function getNombre(){
    return $this->nomSeccion;
    }
    public function getContador(){
    return $this->contador;
    }
    public function getIded(){
    return $this->ided;
    }
  

    public function secciones(){

 
        $sqlseccion="select id_s, nombre from seccion;";
			   
			   

        $result = mysqli_query($this->_db,$sqlseccion);

         while($row=mysqli_fetch_array($result)){


                   

            echo "<div class='section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                         
 
                        
                        <table class='table table-hover table-striped'>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href='#'><i class='fa fa-2x fa-fw fa-eye-slash'></i></a>
                                        <a href='#'><i class='-alt fa fa-2x fa-eye fa-fw'></i></a>
                                    </td>
                                    
                                    <td>
                                        <h4>
                                            <b> " . $row[1] . "</b>
                                        </h4>
                                        
                                    </td>
                                    
                                    <td>
                                            

                                        <div class='btn-group'>
                                            <button class='btn btn-default' value='left'>
                                            <a data-toggle='modal' data-target='#eliminar'>
                                            <i class='fa fa-fw s fa-remove'>
                                            </i><a href='../logica/eliminarSeccion.php?id=". $row[0] ."'>Eliminar</a></button>
                                            </a>
                                         <div>    
                                         
                                        </div>   
                                           
                                        
                                                                                     

                                        <div class='fade modal' id='eliminar'>
                                            <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                                <h2 class='modal-title' id='myModalLabel'>Eliminar.</h2>
                                            </div>
                                            <div class='modal-body'>
                                            Desea eliminar esta seccion?
                                            </div>
                                            <div class='modal-footer'>
                                            <button class='btn btn-success' type='submit' >Aceptar</button>
                                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancelar</button>
                                            </div>
                                            </div>
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
	
	
	 public function ingresarSeccion(){

        $query = "INSERT INTO seccion(id_s, nombre, contador, id_ed) VALUES (?,?,?,NULL)";
        

      
        
        $idS = "";
        
        $contador= "";
        

        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('sss',$idS, $this->nomSeccion, $contador);
        $resultado->execute() or die('error ');

       

        echo "<script type=\'text/javascript\'>alert(\'Seccion ingresada correctamente. \');</script>";
        
    } 
	
	    public function eliminar($idS){

         $query1 = "DELETE FROM seccion WHERE seccion.id_s = ? ";
         $consulta = $this->_db->prepare($query1);
         $consulta ->bind_param('i', $idS);
         $consulta->execute();
         

        // $query2 = "DELETE FROM persona WHERE persona.id_p = ? ";
         //$consulta = $this->_db->prepare($query2);
         //$consulta ->bind_param('i', $idPe);
         //$consulta->execute();
    } 
	} 