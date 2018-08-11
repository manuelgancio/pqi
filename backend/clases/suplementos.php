<?php

require_once('model.php');
class claseSuplementos extends Model{

    public $titulo;
    public $email;
    public $suplemento;
    public $mensaje;
    public $adjunto;

    public function __construct($titulo='',$email='',$suplemento='',$mensaje='',$adjunto=''){
        // Carga el constructor de la superclase
        parent::__construct();

        $this->titulo=$titulo;
        $this->email=$email;
        $this->suplemento=$suplemento;
        $this->mensaje=$mensaje;
        $this->adjunto=$adjunto;
    }

    public function setTitulo($titulo){
    $this->titulo=$titulo;
    }  
    public function setEmail($email){
    $this->email=$email;
    }   
    public function setSuplemento($suplemento){
    $this->suplemento=$suplemento;
    } 
    public function setMensaje($mensaje){
    $this->mensaje=$mensaje;
    }
    public function setAdjunto($adjunto){
    $this->adjunto=$adjunto;
    }

    public function getTitulo(){
    return $this->titulo;
    }
    public function getEmail(){
    return $this->email;
    }
    public function getSuplemento(){
    return $this->suplemento;
    }
    public function getMensaje(){
    return $this->mensaje;
    }
    public function getAdjunto(){
    return $this->adjunto;
    }

    public function enviarCorreo($Tsuplemento,$titulo,$mensaje,$adjunto,$nombreAdj,$formatoAdj){
    	             
        require "../phpmailer/class.phpmailer.php";
    
          $msg = null;  
          $para ="";

          //Consulta quienes son los clientes suscriptos para enviarle el suplemento.
	      $Consulta_from="select cliente.corre_c from suscripcion 
		  inner join pago on suscripcion.id_cp = pago.id_cp
		  inner join cliente on pago.id_cl = cliente.id_cl
		  where plan = " . $Tsuplemento ." and cliente.edo_cl = 0;";

		  $result1 = $this->_db->query($Consulta_from);
		  $tabla= $result1->fetch_all();
	   	  
		  $mail = new PHPMailer;
          $mail->IsSMTP();

	   	  foreach($tabla as $filas){
	          $para= $filas[0];
	          $mail->addAddress($para , 'PQI');
		  } 

		  //Debo de hacer autenticación SMTP
          $mail->SMTPAuth = true;
          $mail->SMTPSecure = "tls";

		  //indico el servidor de hotmail para SMTP
          $mail->Host = "smtp.live.com";

		  //indico el puerto que usa hotmail
          $mail->Port = 25;
		  // indico un usuario / clave de usuario de hotmail
          $mail->Username = "paqueteinoformespqi@hotmail.com";
          $mail->Password = "Santiago123";

          $mail->From = "paqueteinoformespqi@hotmail.com";        
          $mail->FromName = "Administrador";      
          $mail->Subject = $titulo;

          
          $mail->AddAttachment($adjunto,$nombreAdj);  // optional name
          $mail->MsgHTML($mensaje);
        

     /*  if ($adjunto ["size"] > 0)
      {
           
          $mail->addAttachment($adjunto ["tmp_name"], $adjunto ["name"]);
   }*/
    
        
        if($mail->Send()){ ?>
            <script> 
               alert("correo enviado.");
            </script>   
        <?php
        }
        else
        {
        ?>
            <script> 
               alert("Error al enviar correo.");
            </script>   
        <?php
        }
     	}

    public function moduloSuplementos(){
    
    echo '
    
    <div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Adm. Suplementos</li>
        </ol>
            <div class="jumbotron jumbotron-sm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <h1 class="h1">
                            Suplementos <small>, Solo para usuarios suscriptos. </small></h1>
                    </div>
                </div>
            </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="well well-sm">
                            
                            <form enctype="multipart/form-data" action="../logica/enviarSuplemento.php" method="POST">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Titulo </label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="" required="required" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="subject">
                                            Tipos de suscripciones </label>
                                        <select id="tsuscripciones-list" name="tsuscripciones-list" class="form-control" required="required">
                                            <option value="1" selected="">Todos los dias</option>
                                            <option value="2">Sabados y Domingos</option>
                                            <option value="3">Lun, Mie y Viernes</option>                                     
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Mensaje </label>
                                        <textarea name="mensaje" id="mensaje" class="form-control" rows="9" cols="25" required="required"
                                            placeholder="Le quieres agregar algo mas?"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                         <legend><span class="glyphicon glyphicon-globe"></span>Adjuntar suplemento.</legend>
                        
                            <td>Seleccione archivo a enviar:</td>
                            <td><input type="file" id="adj" name="adj"></td>
                        
                        <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" id="btnEnviar"> Enviar suplementos</button>
                                </div>
                        
                    
                    </div>
                </div>
            </div>
            </form>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->

    ';

     }   

}

