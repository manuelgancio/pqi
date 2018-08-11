<?php

require('model.php');
class clasePublicidad extends Model{

    public $idPublicidad;
    public $fechaDesde;
    public $fechaHasta;
    public $publicacion;
    public $idEmpleado;
    public $idEspacio;

    public function __construct($idPublicidad='',$fechaDesde='',$fechaHasta='',$publicacion='',$idEmpleado='',$idEspacio=''){
        // Carga el constructor de la superclase
        parent::__construct();

        $this->idPublicidad=$idPublicidad;
        $this->fechaDesde=$fechaDesde;
        $this->fechaHasta=$fechaHasta;
        $this->publicacion=$publicacion;
        $this->idEmpleado=$idEmpleado;
        $this->idEspacio=$idEspacio;
    }

    public function setIdPublicidad($idPublicidad){
    $this->idPublicidad=$idPublicidad;
    }  
    public function setFechaDesde($fechaDesde){
    $this->fechaDesde=$fechaDesde;
    }   
    public function setFechaHasta($fechaHasta){
    $this->fechaHasta=$fechaHasta;
    } 
    public function setPublicacion($publicacion){
    $this->publicacion=$publicacion;
    }
    public function setIdEmpleado($idEmpleado){
    $this->idEmpleado=$idEmpleado;
    }
    public function setIdEspacio($idEspacio){
    $this->idEspacio=$idEspacio;
    }

    public function getIdPublicidad(){
    return $this->idPublicidad;
    }
    public function getFechaDesde(){
    return $this->fechaDesde;
    }
    public function getFechaHasta(){
    return $this->fechaHasta;
    }
    public function getPublicacion(){
    return $this->publicacion;
    }
    public function getIdEmpleado(){
    return $this->idEmpleado;
    }
    public function getIdEspacio(){
    return $this->idEspacio;
    }

     public function ingresarPublicidad(){

        $query = "INSERT INTO publicidad( id_pub, fecha_d, fecha_h, publicacion, id_e,id_seccion) VALUES(?,?,?,?,?,?)";
        $idPublicacion = "";
        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('ssssss',$idPublicacion, $this->fechaDesde, $this->fechaHasta, $this->publicacion, $this->idEmpleado,$this->idEspacio);
        $resultado->execute() or die('Error al ingresar publicidad');  
        
        $idPub = $resultado -> insert_id;

        $query2 = "INSERT INTO hay( id_pub, id_esp) VALUES(?,?)";
        $resultado2 = $this->_db->prepare($query2);
        $resultado2 -> bind_param('ss',$idPub, $this->idEspacio );
        $resultado2->execute() or die('Error al ingresar publicidad:2');

        $idPub ="";
    echo "<script type=\'text/javascript\'>alert(\' Publicacion ingresada correctamente \');</script>";        

     }   


   public function listarEspacios(){

    $sqladmin="select ubicacion,seccion from espacio";
    $result1 = $this->_db->query($sqladmin);
    $tabla= $result1->fetch_all();

        echo "
        <div class='container'>

            <div class='form-group'>
              <select class='form-control' id='espacio' name='espacio'>
            ";
                foreach($tabla as $filas){
                echo "<option value=" . $filas[0] . ">" . $filas[1] . " </option>";

                }  
        echo "        
              </select>
            </div>
        </div>

        </body>
        </html>

        ";
    }
     
    public function cambiarAtrPublicidadDesde($idPublicidad,$atributo){

      $query = "UPDATE publicidad SET fecha_d = ? WHERE publicidad.id_pub = ? ";
      $consulta = $this->_db->prepare($query);
      $consulta ->bind_param('ss', $atributo,$idPublicidad);
      $consulta->execute() or die('error interno al cambiar el atributo de la publicidad.');
    
    }

    public function cambiarAtrPublicidadSeccion($idPublicidad,$espacio){

      $query = "UPDATE hay SET id_esp = ? WHERE hay.id_pub = ?";
      $consulta = $this->_db->prepare($query);
      $consulta ->bind_param('ss', $espacio, $idPublicidad);
      $consulta->execute() or die('error interno al cambiar el atributo de la seccion.');
    
    }
    public function eliminarPublicidad($idPublicidad){
      
      $query = "DELETE FROM hay WHERE hay.id_pub = ?";
      $consulta = $this->_db->prepare($query);
      $consulta ->bind_param('s',$idPublicidad);
      $consulta->execute() or die('error interno al eliminar la publicidad-.');

      $query = "DELETE FROM publicidad WHERE publicidad.id_pub = ?";
      $consulta = $this->_db->prepare($query);
      $consulta ->bind_param('s',$idPublicidad);
      $consulta->execute() or die('error interno al eliminar la publicidad.');
    
    }
    public function cambiarAtrPublicidadHasta($idPublicidad,$atributo){

      $query = "UPDATE publicidad SET fecha_h = ? WHERE publicidad.id_pub = ? ";
      $consulta = $this->_db->prepare($query);
      $consulta ->bind_param('ss', $atributo,$idPublicidad);
      $consulta->execute() or die('error interno al cambiar el atributo de la publicidad.');
    
    }

    public function publicidades(){

        $sqladmin="SELECT p.fecha_d,p.fecha_h,p.publicacion,e.seccion, p.id_pub FROM publicidad p 
                   INNER JOIN hay h ON p.id_pub = h.id_pub
                   INNER JOIN espacio e ON h.id_esp = e.id_esp";

        $result = mysqli_query($this->_db,$sqladmin);

        echo "
        <div class='container'> 
          <div class='row'>";

       while($row=mysqli_fetch_array($result)){

        echo "
            <div class='col-sm-6 col-md-4 col-lg-3 mt-4' >
              <div class='card'>
                <img class='card-img-top' src= http://192.168.43.85/img_publicidad/". $row[2] .">
                  <div class='card-footer'>
                  <small>Desde: " . $row[0] . "</small><br>
                  <small>Hasta: " . $row[1] . "</small><br>
                  <small>Seccion:". $row[3] ."</small><br><br>


                  <button type='button' class='btn btn-link' data-toggle='modal' data-target='#linkEditar". $row[4] ."'><small><a href='#linkEditar". $row[4] ."'><i class='fa fa-address-card-o' aria-hidden='true'></i> Editar</a></small></button>
                   -
                  <button type='button' class='btn btn-link' data-toggle='modal' data-target='#linkEliminar". $row[4] ."'><small><a href='#linkEliminar". $row[4] ."'> <i class='fa fa-trash' aria-hidden='true'></i> Eliminar</a></small></button>

                  <div class='modal fade' id='linkEditar". $row[4] ."' role='dialog'>
                    <div class='modal-dialog '>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          <h4 class='modal-title'>Editar publicidad</h4>
                        </div>
                        <div class='modal-body'>

                        <table class='table table-striped'>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nuevo</th>
                              <th>Actual</th>
                              <th>Editar</th>
                            </tr>
                          </thead>
                        <tbody>
                        </tbody>
                          <tbody>
                            <tr>
                              <td>Desde:</td>
                              <td>
                              <form name='formpub' action='../logica/editarPublicidad.php?idp=". $row[4] ."&btn=d' method='POST'>
                              <input type='date' name='desde' id='desde' required>
                              <td>
                              <small>" . $row[0] . "</small>
                              </td>
                              <th scope='row'>
                              <button id='btn' type='submit' class='btn btn-link' >
                              <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                              </th>
                              </button>
                              </td>
                              </form>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                              <td>Hasta:</td>
                              <td>
                              <form name='formpub' action='../logica/editarPublicidad.php?idp=". $row[4] ."&btn=h' method='POST'>
                              <input type='date' name='hasta' id='hasta' required>
                              <td>
                              <small>" . $row[1] . "</small>
                              </td>
                              <th scope='row'>
                              <button id='btn' type='submit' class='btn btn-link' >
                              <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                              </th>
                              </button>
                              </td>
                              </form>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                              <td>Seccion:</td>
                              <td>
                              <form name='fr' action='../logica/editarPublicidad.php?idp=". $row[4] ."&btn=s' method='POST'>
                              
                              ";  
                              $this->listarEspacios(); 
                              echo "
                              
                              <td>
                              <small>" . $row[3] . "</small><br>
                              </td>
                              <th scope='row'>
                              <button id='btn' type='submit' class='btn btn-link' >
                              <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                              </button>
                              </th>
                              </td>
                              </form>
                            </tr>
                        </tbody>
                    </table>
                            
                        </div>
                        <div class='modal-footer'>
                          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
             </div>
            </div>




                  <div class='modal fade' id='linkEliminar". $row[4] ."' role='dialog'>
                    <div class='modal-dialog '>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <button type='button' class='close' data-dismiss='modal'>&times;</button>
                          <h4 class='modal-title'></h4>
                        </div>
                        <div class='modal-body'> 
                        <form name='frm' action='../logica/eliminarPublicidad.php?idp=". $row[4] ."' method='POST'>
                        <p> Desea eliminar a esta publicidad? </p>
                        </div>
                        <div class='modal-footer'>
                        <button type='submit' class='btn btn-danger'>Eliminar</button>
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Salir</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              ";
        }
    echo "
          </div>
          ";
    }
}

