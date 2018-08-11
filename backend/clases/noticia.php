<?php

require_once('model.php');
class claseNoticia extends Model{

    public $idArticulo;
    public $titulo;
    public $fechaArticulo;
    public $art_d;
    public $contenido;
    public $autor;
    public $contador_a;
    public $imagen;
    public $likes;
    public $id_seccion;

    public function __construct($idArticulo='',$titulo='',$fechaArticulo='',$art_d='',$contenido='',$autor='',$contador_a='',$imagen='',$likes='',$id_seccion=''){
        // Carga el constructor de la superclase
        parent::__construct();

        $this->idArticulo=$idArticulo;
        $this->titulo=$titulo;
        $this->fechaArticulo=$fechaArticulo;
        $this->art_d=$art_d;
        $this->contenido=$contenido;
        $this->autor=$autor;
        $this->contador_a=$contador_a;
        $this->imagen=$imagen;
        $this->likes=$likes;
        $this->id_seccion=$id_seccion;
    }

    public function setIdArticulo($idArticulo){
    $this->idArticulo=$idArticulo;
    }  
    public function setTitulo($titulo){
    $this->titulo=$titulo;
    }   
    public function setFechaArticulo($fechaArticulo){
    $this->fechaArticulo=$fechaArticulo;
    } 
    public function setArtD($art_d){
    $this->art_d=$art_d;
    }
    public function setContenido($contenido){
    $this->contenido=$contenido;
    }
    public function setAutor($autor){
    $this->autor=$autor;
    }
       public function setContador($contador_a){
    $this->contador_a=$contador_a;
    }
       public function setImagen($imagen){
    $this->imagen=$imagen;
    }
       public function setLikes($likes){
    $this->likes=$likes;
    }
       public function setIdSeccion($id_seccion){
    $this->id_seccion=$id_seccion;
    }

    public function getIdArticulo(){
    return $this->idArticulo;
    }
    public function getTitulo(){
    return $this->titulo;
    }
    public function getFechaArticulo(){
    return $this->fechaArticulo;
    }
    public function getArt_d(){
    return $this->art_d;
    }
    public function getContenido(){
    return $this->contenido;
    }
    public function getAutor(){
    return $this->autor;
    }
    public function getContador(){
    return $this->contador_a;
    }
    public function getImagen(){
    return $this->imagen;
    }
    public function getLikes(){
    return $this->likes;
    }
    public function getId_seccion(){
    return $this->id_seccion;
    }

     public function ingresarNoticia(){

        $query = "INSERT INTO articulo( id_a, titulo, fecha_a, contenido, autor, likes, contador_a, id_s, art_d, imagen) VALUES(?,?,?,?,?,?,?,?,?,?)";

        $idArticulo = "";
        $resultado = $this->_db->prepare($query);

        $resultado -> bind_param('ssssssssss',$idArticulo, $this->titulo, $this->fechaArticulo, $this->contenido, $this->autor, $this->likes, $this->contador_a, $this->id_seccion, $this->art_d,$this->imagen);
        
        $resultado->execute() or die('Error interno: cons.');  

        echo "<script type=\'text/javascript\'>alert(\' Noticia ingresada correctamente \');</script>";
    }   

    public function ArtVisitas(){

      $query = "SELECT titulo, MAX(contador_a) FROM articulo";
      $result = mysqli_query($this->_db,$query);

      while($row=mysqli_fetch_array($result)){

        echo"
            <div class='card text-white bg-warning o-hidden h-100'>
              <div class='card-body'>
                <div class='card-body-icon'>
                  <i class='fa fa-fw fa-list'></i>
                </div>
                <div class='mr-5'>
                <strong>Articulo mas visitado:</strong> " . $row[0] . "<br><br>
                  " . $row[1] . " visitas!
                </div>
               </div>
                <a href='#' class='card-footer text-white clearfix small z-1'>
                <span class='float-left'>Ver mas</span>
                <span class='float-right'>
                <i class='fa fa-angle-right'></i>
                </span>
              </a>
            </div>
        ";

      }

    }
     public function SecVisitas(){

      $query = "SELECT nombre, MAX(contador) FROM seccion";
      $result = mysqli_query($this->_db,$query);

      while($row=mysqli_fetch_array($result)){

        echo"
            <div class='card text-white bg-danger o-hidden h-100'>
              <div class='card-body'>
                <div class='card-body-icon'>
                  <i class='fa fa-fw fa-list'></i>
                </div>
                <div class='mr-5'>
                <strong>Seccion mas visitada:</strong> " . $row[0] . "<br><br>
                  " . $row[1] . " visitas!
                </div>
               </div>
                <a href='#' class='card-footer text-white clearfix small z-1'>
                <span class='float-left'>Ver mas</span>
                <span class='float-right'>
                <i class='fa fa-angle-right'></i>
                </span>
              </a>
            </div>
        ";

      }

    }

    public function destacar($idNoticia){
      
        $sql="SELECT id_a FROM `articulo` WHERE art_d = 1";
        $result = $this->_db->prepare($sql);
        $result->execute() or die('error interno al destacar.');;
        $resultado = $result->get_result();
        $row = $resultado->fetch_assoc();
        $noDestacado = $row['id_a'];

        $sql="UPDATE `articulo` SET `art_d` = '0' WHERE `articulo`.`id_a` = ?";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('i',$noDestacado);
        $result -> execute() or die('error interno al destacar.');


        $sql="UPDATE `articulo` SET `art_d` = '1' WHERE `articulo`.`id_a` = ?";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('i',$idNoticia);
        $result -> execute() or die('error interno al destacar.');
        return (true);
    }

    public function listarSecciones(){

    $tipoUsuario = $_SESSION['Cargo'];
    if ($tipoUsuario == "Admin"){

    $sqladmin="select id_s,nombre from seccion";
    $result1 = $this->_db->query($sqladmin);
    $tabla= $result1->fetch_all();

         echo "
        <div class='container'>
          <form>
            <div class='form-group' >
              <label ><h6>Ingresa seccion:</h6></label>
              <select class='form-control' id='seccion' name='seccion'>
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

 }
  public function eliminarNoticia($idNoticia){

      $query = "DELETE FROM tiene WHERE id_a = ?";
      $consulta = $this->_db->prepare($query);
      $consulta ->bind_param('s',$idNoticia);
      $consulta->execute() or die('error interno al eliminar la noticia-.');

      $query = "DELETE FROM articulo WHERE id_a = ?";
      $consulta = $this->_db->prepare($query);
      $consulta ->bind_param('s',$idNoticia);
      $consulta->execute() or die('error interno al eliminar la noticia.');
    
    }

 public function noticias(){

        $sqladmin="SELECT titulo,fecha_a,autor,likes,contador_a,id_a,art_d,imagen from articulo;";
        $result = mysqli_query($this->_db,$sqladmin);
        
        echo "
        <div class='container'> 
          <div class='row'>";

        while($row=mysqli_fetch_array($result)){

        $destacado = $row[6];
        if($destacado == 1){  
        echo "
            <div class='col-sm-6 col-md-4 col-lg-3 mt-4' >
              <div class='card'>
                <img class='card-img-top' src=". $row[7] .">
                  <div style='background-color: #E8BE14; color: #FFFEFE; text-align: center;'><small>Destacada de portada.</small></div>
                  <div class='card-footer'>
                  <small>Titulo: " . $row[0] . "</small><br>
                  <small>Fecha : " . $row[1] . "</small><br>
                  <small>Autor: ". $row[2] ."</small><br>
                  <small>Likes: ". $row[3] ."</small><br>
                  <small>Visitas: ". $row[4] ."</small><br>
        ";    
        }
        else{
          echo "
          <div class='col-sm-6 col-md-4 col-lg-3 mt-4' >
              <div class='card'>
                <img class='card-img-top' src= http://192.168.43.85/img_noticias/". $row[7] .">
                  <div class='card-footer'>
                  <small>Titulo: " . $row[0] . "</small><br>
                  <small>Fecha : " . $row[1] . "</small><br>
                  <small>Autor: ". $row[2] ."</small><br>
                  <small>Likes: ". $row[3] ."</small><br>
                  <small>Visitas: ". $row[4] ."</small><br>

            <button type='button' class='btn btn-link' data-toggle='modal' data-target='#linkDestacar". $row[5] ."'><i class='fa fa-star' aria-hidden='true'></i> <small><a href='#linkDestacar". $row[5] ."'> Destacar</a></small></button>
           ";
         }

          echo "
                   <button type='button' class='btn btn-link' data-toggle='modal' data-target='#linkEliminar". $row[5] ."'><small><a href='#linkEliminar". $row[5] ."'> <i class='fa fa-trash' aria-hidden='true'></i> Eliminar</a></small></button>
              </div>
             </div>
            </div>
              <div class='modal fade' id='linkEliminar". $row[5] ."' role='dialog'>
                <div class='modal-dialog '>
                  <div class='modal-content'>
                      <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4 class='modal-title'></h4>
                        </div>
                        <div class='modal-body'> 
                        <form name='frm' action='../logica/eliminarNoticia.php?idn=". $row[5] ."' method='POST'>
                        <p> Desea eliminar a esta noticia? </p>
                        </div>
                        <div class='modal-footer'>
                        <button type='submit' class='btn btn-danger'>Eliminar</button>
                        <button type='button' class='btn btn-default' data-dismiss='modal'>Salir</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

              <div class='modal fade' id='linkDestacar". $row[5] ."' role='dialog'>
                <div class='modal-dialog '>
                  <div class='modal-content'>
                      <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4 class='modal-title'></h4>
                        </div>
                        <div class='modal-body'> 
                        <form name='frm' action='../logica/destacarNoticia.php?idn=". $row[5] ."' method='POST'>
                        <p> Desea destacar a esta noticia? </p>
                        </div>
                        <div class='modal-footer'>
                        <button style='color: #FFFFFF;' type='submit' class='btn btn-warning'>Destacar</button>
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

public function ArtMeGusta(){
  /*Devuelve titulo del articulo con mas megusta*/

  $sql="SELECT `titulo`, MAX(`likes`) AS m FROM `articulo`GROUP BY id_a ORDER BY m DESC";
  $result = mysqli_query($this->_db,$sql);
  
    $row = mysqli_fetch_array($result);
        
          echo"
              <div class='card text-white bg-primary o-hidden h-100'>
                <div class='card-body'>
                  <div class='card-body-icon'>
                    <i class='fa fa-fw fa-list'></i>
                  </div>
                  <div class='mr-5'>
                  <strong>Articulo con mas Me Gusta:</strong> " . $row[0] . "<br><br>
                    " . $row[1] . " Me Gusta!
                  </div>
                 </div>
                  <a href='#' class='card-footer text-white clearfix small z-1'>
                  <span class='float-left'>Ver mas</span>
                  <span class='float-right'>
                  <i class='fa fa-angle-right'></i>
                  </span>
                </a>
              </div>
          ";        
}
public function ArtMenosVisitado(){

}
}
