<?php



require_once('model.php');

class userModel extends Model{

    public $idP;
    public $username;
    public $password;
    public $cargo;
    public $nombre;
    public $apellido;
    public $telefono;
    public $seccion;


    public function __construct($idP='',$username='',$password='',$cargo='',$nombre='',$apellido='',$seccion=''){
        // Carga el constructor de la superclase
        parent::__construct();

        $this->idP=$idP;
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
               where p.id_p = e.id_p and cargo = 'Admin';";

        $result = mysqli_query($this->_db,$sqladmin);

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
                                            <b>" . $row[3] . "</b>
                                        </h4>
                                        <p>@pqi.com</p>
                                    </td>

                                        

                                    <td>
                                        <img src='http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png' class='img-circle' width='60'>
                                    </td>
                                    <td>
                                        <h4>
                                            <b> " . $row[1] . " ". $row[2] . "</b>
                                        </h4>
                                        <a href='mailto:ramonvillaw@gmail.com'>" . $row[4] . "</a>
                                    </td>
                                    <td>2 años</td>
                                    <td>
                                            

                                        <div class='btn-group'>
                                            <button class='btn btn-default' value='left'>
                                            <a data-toggle='modal' data-target='#eliminar'>
                                            <i class='fa fa-fw s fa-remove'>
                                            </i><a href='../logica/eliminar.php?id=". $row[0] ."&t=adm'>Eliminar</a></button>
                                            </a>
                                         <div>    
                                         
                                        </div>   
                                            <div class='btn-group'>
                                              <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                Configurar
                                              </button>
                                              <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='../presentacion/cambiarContra.php?p=" . $row[1] . "&i=" . $row[0] . "&tip=adm'  >Cambiar Contraseña
                                                <a class='dropdown-item' href='#'>Ejemplo</a>
                                                
                                            </div>
                                        </div>

                                        
                                                                                     

                                        <div class='fade modal' id='eliminar'>
                                            <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                                <h2 class='modal-title' id='myModalLabel'>Eliminar.</h2>
                                            </div>
                                            <div class='modal-body'>
                                            Desea eliminar a este Administrador?
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

    public function activar(){
        $id_p = $this->getIdp();

        $sql="UPDATE `cliente` SET `edo_cl`= 1 WHERE `id_p` = ?";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('i',$id_p);
        $result -> execute();

        return (true);
    }

     public function activarComentario($idComentario){

        $sql="UPDATE comentario SET estado = '1' WHERE comentario.id_cm = ?";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('i',$idComentario);
        $result -> execute() or die('error interno al activar comentario.');

        return (true);
    }

    public function bloquearComentario($idComentario){
        $sql="UPDATE comentario SET estado = '0' WHERE comentario.id_cm = ?";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('i',$idComentario);
        $result -> execute() or die('error interno al activar comentario.');

        return (true);
    }
     public function bloquear(){
        $id_p = $this->getIdp();

        $sql="UPDATE `cliente` SET `edo_cl`= 0 WHERE `id_p` = ?";
        $result = $this->_db->prepare($sql);
        $result -> bind_param('i',$id_p);
        $result -> execute();

        return (true);
    }
   public function Masters(){


        $sqladmin="select p.id_p, p.p_nomb, p.p_ap, e.cargo, e.e_correo from persona p
               inner join empleado e 
               where p.id_p = e.id_p and cargo = 'Master';";

        $result = mysqli_query($this->_db,$sqladmin);

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
                                            <b>" . $row[3] . "</b>
                                        </h4>
                                        <p>@pqi.com</p>
                                    </td>
                                    <td>
                                        <img src='http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png' class='img-circle' width='60'>
                                    </td>
                                    <td>
                                        <h4>
                                            <b> " . $row[1] . " ". $row[2] . "</b>
                                        </h4>
                                        <a href='mailto:ramonvillaw@gmail.com'>" . $row[4] . "</a>
                                    </td>
                                    <td>2 años</td>
                                    <td>
                                            

                                        <div class='btn-group'>
                                            <button class='btn btn-default' value='left'>
                                            <a data-toggle='modal' data-target='#eliminar'>
                                            <i class='fa fa-fw s fa-remove'>
                                            </i><a href='../logica/eliminar.php?id=". $row[0] ."&t=mas'>Eliminar</a></button>
                                            </a>
                                         <div>    
                                         
                                        </div>   
                                            <div class='btn-group'>
                                              <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                Configurar
                                              </button>
                                              <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='../presentacion/cambiarContra.php?p=" . $row[1] . "&i=" . $row[0] . "&tip=mas'>Cambiar Contraseña
                                                <a class='dropdown-item' href='#'>Ejemplo</a>
                                                
                                            </div>
                                        </div>                             
                                        <div class='fade modal' id='eliminar'>
                                            <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                                <h2 class='modal-title' id='myModalLabel'>Eliminar.</h2>
                                            </div>
                                            <div class='modal-body'>
                                            Desea eliminar a este Administrador?
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



         public function moderadores(){


        $sqladmin="select p.id_p, p.p_nomb, p.p_ap, e.cargo, e.e_correo from persona p inner join empleado e where p.id_p = e.id_p and cargo = 'moderador'";

        $result = mysqli_query($this->_db,$sqladmin);

         while($row=mysqli_fetch_array($result)){

            echo "<div class='section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                         

                        <form action='../logica/eliminarAdmin.php' method='POST'> 
                        <input type='hidden' name='idP' id='idP' value=" . $row['cargo'] . " />
                        <table class='table table-hover table-striped'>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href='#'><i class='fa fa-2x fa-fw fa-eye-slash'></i></a>
                                        <a href='#'><i class='-alt fa fa-2x fa-eye fa-fw'></i></a>
                                    </td>
                                    <td>
                                        <h4>
                                            <b>" . $row['cargo'] . "</b>
                                        </h4>
                                        <p>@pqi.com</p>
                                    </td>
                                    <td>
                                        <img src='http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png' class='img-circle' width='60'>
                                    </td>
                                    <td>
                                        <h4>
                                            <b> " . $row[1]." ". $row[2] . "</b>
                                        </h4>
                                        <a href='mailto:ramonvillaw@gmail.com'>" . $row[4] . "</a>
                                    </td>
                                    <td>2 años</td>
                                    <td>
                                        <div class='btn-group'>
                                            <button class='btn btn-default' value='left'>
                                            <a data-toggle='modal' data-target='#eliminar'>
                                            <i class='fa fa-fw s fa-remove'>
                                            </i><a href='../logica/eliminar.php?id=". $row[0] ."&t=mod'>Eliminar</a></button>
                                            </a>
                                         <div>    
                                         
                                        </div>   
                                            <div class='btn-group'>
                                              <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                Configurar
                                              </button>
                                              <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='../presentacion/cambiarContra.php?p=" . $row[1] . "&i=" . $row[0] . "&tip=mod'  >Cambiar Contraseña
                                                <a class='dropdown-item' href='#'>Ejemplo</a>
                                                
                                            </div>
                                        </div>


                                        <div class='fade modal' id='eliminar'>
                                            <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                                <h2 class='modal-title' id='myModalLabel'>Eliminar.</h2>
                                            </div>
                                            <div class='modal-body'>
                                            Desea eliminar a este Moderador?
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

   public function listarSecciones(){

    $sqladmin="select nombre from seccion";
    $result1 = $this->_db->query($sqladmin);
    $tabla= $result1->fetch_all();

        echo "
        <div class='container'>
          <form>
            <div class='form-group'>
              <label for='sel1'>Seccion:</label>
              <select class='form-control' id='seccion' name='seccion'>
            ";
                foreach($tabla as $filas){
                echo "<option value=" . $filas[0] . "> " . $filas[0] . "</option>";
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
 public function usuariosNormal(){
    /* Devuelve cantidad de usuarios que se registran con fb */
    $sql="SELECT COUNT(id_cl) FROM `cliente` WHERE `id_fb` = 0";
    $result = mysqli_query($this->_db,$sql);
    
      $row = mysqli_fetch_array($result);
          
            echo"
                <div class='card text-white bg-primary o-hidden h-100'>
                  <div class='card-body'>
                    <div class='card-body-icon'>
                      <i class='fa fa-fw fa-list'></i>
                    </div>
                    <div class='mr-5'>
                    <strong>Usuario registrados desde nuestra plataforma: </strong> " . $row[0] . "<br><br>
                      
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




public function usuariosfb(){
    /* Devuelve cantidad de usuarios que se registran con fb */
    $sql="SELECT COUNT(id_cl) FROM `cliente` WHERE `id_fb` != 0";
    $result = mysqli_query($this->_db,$sql);
    
      $row = mysqli_fetch_array($result);
          
            echo"
                <div class='card text-white bg-primary o-hidden h-100'>
                  <div class='card-body'>
                    <div class='card-body-icon'>
                      <i class='fa fa-fw fa-list'></i>
                    </div>
                    <div class='mr-5'>
                    <strong>Usuario registrados utilizando Facebook:</strong> " . $row[0] . "<br><br>
                      
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

   public function usuariosFrontend(){

    $sqladmin="select p.id_p, p.p_nomb, p.p_ap, c.corre_c, c.edo_cl  from persona p inner join cliente c where p.id_p = c.id_p ";
    $result = mysqli_query($this->_db,$sqladmin);

    echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Ingrese lo que quiere buscar..' title='Type in a name'>
        <ul id='myUL'>";

    while($row=mysqli_fetch_array($result)){

    $habilitado = $row[4];
    $row4="";
    $id=$row[0];
    $_SESSION["idPersonaComentario"]=$id;

    if($habilitado == 1){
        $row4="
        <i class='fa fa-eye' aria-hidden='true'></i> 
        Usuario activo.
        <div style='float: right;'>
        <form action='../logica/procesarBloquear.php?pid=". $id ."&acc=blo' method='POST'>
        <button style='float: right; margin-rigth: 10px; ' type='submit' class='btn btn-danger'>Bloquear</button>
        </form>
        </div>
        ";
    }
    else{
        $row4="
                <i class='fa fa-eye-slash' aria-hidden='true'></i> 
                Usuario bloqueado.
                <div style='float: right;'>
                <form action='../logica/procesarBloquear.php?pid=". $id ."&acc=act' method='POST'>
                <button type='submit' class='btn btn-success'>Desbloquear</button>
                </form>
                </div>
                ";

    }    



    echo "    
          <li>
          <article>
          <a >
          <div style=''><i class='fa fa-user' aria-hidden='true'></i> ". $row[1] ." ". $row[2] ."</div>
          <div><i class='fa fa-envelope' aria-hidden='true'></i> ". $row[3] ."</div>

          <div>". $row4 ."</div>
          <div style='color:#159AF3 ;' data-toggle='modal' data-target='#linkComentarios". $id ."' href='#linkComentarios". $id ."'><small>Haga click aqui para ver comentarios.</small></div>
          
          </a>
          </article>
          </li>

          <div class='modal fade' id='linkComentarios". $id ."' role='dialog'>
            <div class='modal-dialog '>
              <div class='modal-content'>
                <div class='modal-header'>
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  <h4 class='modal-title'></h4>
                </div>
                <div class='modal-body'> 
                <div class='list-group'>
                  <a href='#' class='list-group-item list-group-item-action flex-column align-items-start active'>
                    <div class='d-flex w-100 justify-content-between'>
                      <h5 class='mb-1'>Comentarios de ". $row[1] . " ". $row[2] .".</h5>
                      <small>Hoy es "; echo date('d/m/Y'); echo "</small>
                    </div>
                    <p class='mb-1'>Para ver mas opciones, haga click sobre el comentario.</p>
                  </a>";
                    $this->comentarios();
                    echo "
                </div>
                </div>
                <div class='modal-footer'>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Salir</button>
                </div>
                </form>
              </div>
            </div>
            </div>

        ";
     }   
     echo "</ul>
     ";
    }

 public function comentarios(){

        $idper = $_SESSION['idPersonaComentario'];

    $sqladmin=" select c.comentario, c.fecha_c, a.titulo ,c.reportado,c.estado,c.id_cm FROM comentario c 
                INNER JOIN hace h ON c.id_cm = h.id_cm 
                INNER JOIN cliente cl ON cl.id_cl = h.id_cl 
                INNER JOIN tiene t ON c.id_cm = t.id_cm
                INNER JOIN articulo a ON t.id_a = a.id_a
                WHERE cl.id_p =". $idper."";

        $result = mysqli_query($this->_db,$sqladmin);

         while($row=mysqli_fetch_array($result)){
            echo "
            <a href='#' class='list-group-item list-group-item-action flex-column align-items-start'>
            <div class='d-flex w-100 justify-content-between'>
              <h5 class='mb-1'>". $row[2] ."</h5>
              <small class='text-muted'>" . $row[1] . "</small>
            </div>
            <p class='mb-1' style='color: red;'><strong>``" . $row[0] . "´´</strong></p>

            ";

            $estado = $row[4];
            if($estado == 0){

                $v = "danger";
                $t = "Bloquear";
                $acc = "act";
            }
            else{

                $v = "success";
                $t = "Activar";
                $acc = "blo";
             }   

            if($row[3] == NULL){

                echo "<small class='text-muted'>Este comentario no ha sido reportado.</small>

                    <form action='../logica/bloquearComentario.php?idp=". $row[5] ."&acc=". $acc ."' method='POST'>
                    <button style='float: right; ' type='submit' class='btn btn-". $v."'>". $t ."</button>
                    </form>
        </a>";
            }
            else{

            echo "<small class='text-muted'>Reportado como ofensivo ".$row[3]."  veces.</small> 
            <form action='../logica/bloquearComentario.php?idp=". $row[5] ."&acc=". $acc ."' method='POST'>
                    <button style='float: right; ' type='submit' class='btn btn-". $v."'>". $t ."</button>
                    </form>
                    </a>";
            }
                       
        }
    
}
    public function Editores(){

        $sqladmin="select p.id_p, p.p_nomb, p.p_ap, e.cargo, e.e_correo, e.seccion from persona p inner join empleado e where p.id_p = e.id_p and cargo = 'Editor'";

        $result = mysqli_query($this->_db,$sqladmin);

         while($row=mysqli_fetch_array($result)){

            echo "<div class='section'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                         

                        <form action='../logica/eliminarAdmin.php' method='POST'> 
                        <input type='hidden' name='idP' id='idP' value=" . $row['cargo'] . " />
                        <table class='table table-hover table-striped'>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href='#'><i class='fa fa-2x fa-fw fa-eye-slash'></i></a>
                                        <a href='#'><i class='-alt fa fa-2x fa-eye fa-fw'></i></a>
                                    </td>
                                    <td>
                                        <h4>
                                            <b>" . $row['cargo'] . "</b>
                                        </h4>
                                        <p>@pqi.com</p>
                                    </td>
                                    <td>
                                        <img src='http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png' class='img-circle' width='60'>
                                    </td>
                                    <td>
                                        <h4>
                                            <b> " . $row[1]." ". $row[2] . "</b>
                                        </h4>
                                        <a href='mailto:ramonvillaw@gmail.com'>" . $row[4] . "</a>
                                    </td>

                                    <td>" . $row[5]." </td>

                                    <td>
                                        <div class='btn-group'>
                                            <button class='btn btn-default' value='left'>
                                            <a data-toggle='modal' data-target='#eliminar'>
                                            <i class='fa fa-fw s fa-remove'>
                                            </i><a href='../logica/eliminar.php?id=". $row[0] ."&t=edi'>Eliminar</a></button>
                                            </a>
                                         <div>    
                                         
                                        </div>   
                                            <div class='btn-group'>
                                              <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                Configurar
                                              </button>
                                              <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='../presentacion/cambiarContra.php?p=" . $row[1] . "&i=" . $row[0] . "&tip=edi'  >Cambiar Contraseña
                                                <a class='dropdown-item' href='#'>Ejemplo</a>
                                                
                                            </div>
                                        </div>


                                        <div class='fade modal' id='eliminar'>
                                            <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
                                                <h2 class='modal-title' id='myModalLabel'>Eliminar.</h2>
                                            </div>
                                            <div class='modal-body'>
                                            Desea eliminar a este Moderador?
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

    public function cambiarContra($idP,$contra,$tipo){

        $query = "UPDATE empleado e SET pass_e = ? WHERE e.id_p = ? ";
        $consulta = $this->_db->prepare($query);

        $consulta ->bind_param('ss', $contra,$idP);
        $consulta->execute();

        if ($tipo == "adm"){

        echo "
         <script> 
          alert(' Contraseña cambiada correctamente.');
          window.location.href = '../presentacion/abmAdmin.php'
         </script> 
         ";

        }
        elseif ($tipo == "mod") {
            
             echo "
         <script> 
          alert(' Contraseña cambiada correctamente.');
          window.location.href = '../presentacion/abmModerador.php'
         </script> 
         ";
        }
        elseif ($tipo == "edi") {
            
             echo "
         <script> 
          alert(' Contraseña cambiada correctamente.');
          window.location.href = '../presentacion/abmEditor.php'
         </script> 
         ";
        }
        elseif ($tipo == "mas") {
            
             echo "
         <script> 
          alert(' Contraseña cambiada correctamente.');
          window.location.href = '../presentacion/abmMaster.php'
         </script> 
         ";
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

    public function ingresarMaster(){

        $query = "INSERT INTO persona( id_p, p_nomb, p_ap, tel) VALUES (?,?,?,?)";
        

        $hash_password = password_hash($this->password, PASSWORD_DEFAULT);
        
        $id_p = "";
        $id_e = "";
        $seccion= "";
        $cargo= "Master";

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

 public function ingresarModerador(){

        $query = "INSERT INTO persona( id_p, p_nomb, p_ap, tel) VALUES (?,?,?,?)";
        

        $hash_password = password_hash($this->password, PASSWORD_DEFAULT);
        
        $id_p = "";
        $id_e = "";
        $seccion= "";
        $cargo= "Moderador";

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

     public function ingresarEditor(){

        $query = "INSERT INTO persona( id_p, p_nomb, p_ap, tel) VALUES (?,?,?,?)";
        

        $hash_password = password_hash($this->password, PASSWORD_DEFAULT);
        
        $id_p = "";
        $id_e = "";
        $cargo= "Editor";

        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('ssss',$id_p, $this->nombre, $this->apellido, $this->telefono );
        $resultado->execute();

        $lastIdP = $resultado -> insert_id;

        $query = "INSERT INTO empleado( id_e, e_correo, pass_e, cargo, seccion, id_p) VALUES (?,?,?,?,?,?)";
        $resultado = $this->_db->prepare($query);
        $resultado -> bind_param('ssssss',$id_e, $this->username, $this->password, $cargo, $this->seccion, $lastIdP );
        $resultado->execute();

        echo "<script type=\'text/javascript\'>alert(\'Usuario ingresado correctamente. \');</script>";
        
        } 

    public function eliminar($idPe){

         $query1 = "DELETE FROM empleado WHERE empleado.id_p = ? ";
         $consulta = $this->_db->prepare($query1);
         $consulta ->bind_param('i', $idPe);
         $consulta->execute();
         

         $query2 = "DELETE FROM persona WHERE persona.id_p = ? ";
         $consulta = $this->_db->prepare($query2);
         $consulta ->bind_param('i', $idPe);
         $consulta->execute();
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

    public function obtenerIdEmpleado(){

        $sql="SELECT id_e FROM empleado where e_correo = ? ;";
        $result = $this->_db->prepare($sql);

        $correo = $_SESSION['Correo'];  
        $result -> bind_param('s',$correo);
        $result->execute();
        $resultado = $result->get_result();
        $row = $resultado->fetch_assoc();
        $_SESSION["idEmpleado"] = $row['id_e'];
        }

    public function obtenerNombre(){

        $sql="SELECT p.p_nomb FROM persona p 
        inner join empleado e on p.id_p = e.id_p
        where e_correo = ? ;";
        $result = $this->_db->prepare($sql);

        $correo = $_SESSION['Correo'];  
        $result -> bind_param('s',$correo);
        $result->execute();
        $resultado = $result->get_result();
        $row = $resultado->fetch_assoc();
        $_SESSION["Nombre"] = $row['p_nomb'];
        }

     public function obtenerApellido(){

        $sql="SELECT p.p_ap FROM persona p 
        inner join empleado e on p.id_p = e.id_p
        where e_correo = ?;";

        $result = $this->_db->prepare($sql);
        $correo = $_SESSION['Correo'];  
        $result -> bind_param('s',$correo);
        $result->execute();
        $resultado = $result->get_result();
        $row = $resultado->fetch_assoc();
        $_SESSION["Apellido"] = $row['p_ap'];
        }

        public function obtenerCargo(){

        $sql="SELECT cargo FROM empleado WHERE e_correo = ?";

        $result = $this->_db->prepare($sql);
        $correo = $_SESSION['Correo'];  
        $result -> bind_param('s',$correo);
        $result->execute();
        $resultado = $result->get_result();
        $row = $resultado->fetch_assoc();
        $_SESSION["Cargo"] = $row['cargo'];

        }


        public function menuModerador(){

        echo '<li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="perfil.php">
                      <i class="fa fa-fw fa-dashboard"></i>
                      <span class="nav-link-text">
                        Inicio</span>
                    </a>
                  </li>

                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="abmSecciones.php">
                    <i class="fa fa-star" aria-hidden="true"></i>
                      <span class="nav-link-text">Secciones</span>
                    </a>
                  </li>


                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="noticias.php">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                      <span class="nav-link-text">Noticias</span>
                    </a>
                  </li>


                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="estadisticas.php">
                      <i class="fa fa-fw fa-area-chart"></i>
                      <span class="nav-link-text">
                        Estadisticas</span>
                    </a>
                  </li>


                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <span class="nav-link-text">
                        Usuarios</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                      <li>
                        <a href="usrFrontend.php">Front-end</a>
                      </li>
                    </ul>
                  </li>';

        }

        public function menuAdministrador(){

            echo '
               <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="perfil.php">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">
                    Inicio</span>
                </a>
               </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span class="nav-link-text">
                    Usuarios</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                  <li>
                    <a href="abmAdmin.php">Administradores</a>
                  </li>
                  <li>
                    <a href="abmModerador.php">Moderador</a>
                  </li>
                  <li>
                    <a href="abmEditor.php">Editor</a>
                  </li>
                  <li>
                    <a href="abmMaster.php">Master</a>
                  </li>
                  <li>
                    <a href="usrFrontend.php">Front-end</a>
                  </li>
                </ul>
              </li>


              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="publicidad.php">
                  <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                  <span class="nav-link-text">Publicidad</span>
                </a>
              </li>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="suplementos.php">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span class="nav-link-text">
                    Cargar suplementos</span>
                </a>
              </li>

                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="abmSecciones.php">
                    <i class="fa fa-star" aria-hidden="true"></i>
                      <span class="nav-link-text">Secciones</span>
                    </a>
                  </li>


                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="noticias.php">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                      <span class="nav-link-text">Noticias</span>
                    </a>
                  </li>


                  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="estadisticas.php">
                      <i class="fa fa-fw fa-area-chart"></i>
                      <span class="nav-link-text">
                        Estadisticas</span>
                    </a>
                  </li>

            ';

        }


        public function menuEditor(){

             echo '

              <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="perfil.php">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">
                    Inicio</span>
                </a>
              </li>

               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                    <a class="nav-link" href="noticias.php">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                      <span class="nav-link-text">Noticias</span>
                    </a>
                  </li>


              ';

        }


        public function menuMaster(){
             
         echo '

              <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="perfil.php">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">
                    Inicio</span>
                </a>
              </li>

              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="publicidad.php">
                  <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                  <span class="nav-link-text">Publicidad</span>
                </a>
              </li>

              ';
        }

        
        }
