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

        $query = "INSERT INTO publicidad( id_pub, fecha_d, fecha_h, publicacion, id_e) VALUES(?,?,?,?,?)";
        $idPublicacion = "";
        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('sssss',$idPublicacion, $this->fechaDesde, $this->fechaHasta, $this->publicacion, $this->idEmpleado );
        $resultado->execute() or die('No hay chance');  
        $idPub = $resultado -> insert_id;

        echo "<script type=\'text/javascript\'>alert(\' Publicacion ingresada correctamente \');</script>";

        $query = "INSERT INTO hay( id_pub, id_esp) VALUES(?,?)";
        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('ss',$idPub, $this->idEspacio );
        $resultado->execute() or die('No hay chance 2');
        

     }   

   public function listarEspacios(){

    $sqladmin="select ubicacion,seccion from espacio";
    $result1 = $this->_db->query($sqladmin);
    $tabla= $result1->fetch_all();

        echo "
        <div class='container'>
          <form>
            <div class='form-group'>
              <label for='sel1'><h6>Ingresa espacio publicitario:</h6></label>
              <select class='form-control' id='espacio' name='espacio'>
            ";
                foreach($tabla as $filas){
                echo "<option value=" . $filas[0] . ">" . $filas[1] . " </option>";

                }  
        echo "        
              </select>
            </div>
          </form>
        </div>

        </body>
        </html>

        ";
    }



    public function publicidades(){


        $sqladmin="SELECT p.fecha_d,p.fecha_h,p.publicacion,e.seccion FROM publicidad p 
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
                <img class='card-img-top' src=". $row[2] .">
                  <div class='card-footer'>
                  <small>Desde: " . $row[0] . "</small><br>
                  <small>Hasta: " . $row[1] . "</small><br>
                  <small>Seccion:". $row[3] ."</small>
                  <button class='btn btn-secondary float-right btn-sm'>Editar</button>
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

