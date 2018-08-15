<?php
//Recibo el id del articulo al que le dan like
if (isset($_POST['id_art'])){

    $id_art = $_POST['id_art'];

    //Llamo a la clase articulo
    require_once($CLASES_DIR .'/articulo.class.php');

    $a = New articulo();

    $a->setId($id_art);

    $like = $a->like();

    if($like == true){
        ?>
        <script>
        document.getElementById("btnLike").disabled = true;
        </script>
        <?php
    }  
}  
