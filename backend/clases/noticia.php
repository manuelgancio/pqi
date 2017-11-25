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
        $resultado -> bind_param('isssssiiss',$idArticulo, $this->titulo, $this->fechaArticulo, $this->contenido, $this->autor, $this->likes, $this->contador_a, $this->id_s, $this->art_d, $this->imagen );
        $resultado->execute() or die('No hay chance');  

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

    public function listarSecciones(){

    $tipoUsuario = $_SESSION['Cargo'];
    if ($tipoUsuario == "Admin"){

    $sqladmin="select nombre from seccion";
    $result1 = $this->_db->query($sqladmin);
    $tabla= $result1->fetch_all();

         echo "
        <div class='container'>
          <form>
            <div class='form-group'>
              <label ><h6>Ingresa espacio publicitario:</h6></label>
              <select class='form-control' id='Seccion' name='Seccion'>
            ";
                foreach($tabla as $filas){
                echo "<option value=" . $filas[0] . ">" . $filas[0] . " </option>";

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

 public function noticias(){

        $sqladmin="SELECT titulo,fecha_a,autor,likes,contador_a,imagen from articulo;";
        $result = mysqli_query($this->_db,$sqladmin);
        
        echo "
        <div class='container'> 
          <div class='row'>";

        while($row=mysqli_fetch_array($result)){

        echo "
            <div class='col-sm-6 col-md-4 col-lg-3 mt-4' >
              <div class='card'>
                <img class='card-img-top' src=". $row[5] .">
                  <div class='card-footer'>
                  <small>Titulo: " . $row[0] . "</small><br>
                  <small>Fecha : " . $row[1] . "</small><br>
                  <small>Autor: ". $row[2] ."</small>
                  <small>Contenido: ". $row[2] ."</small>
                  <small>Likes: ". $row[3] ."</small>
                  <small>Visitas: ". $row[4] ."</small>
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
