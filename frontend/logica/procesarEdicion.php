<?php 

if(isset($_GET['btnEdicion'])){
    if(isset($_GET['selectedDate'])){
        $fecha_e = $_GET['selectedDate'];
    
  
    //Verifico que sea menor o igual a la fecha de hoy

    $fecha_hoy = date('Y-m-d');
    
    if($fecha_e >= $fecha_hoy){//Si es mayor al dia de hoy..
        ?>
        <script>
            window.location.replace ("../presentacion/index.php");
        </script>
        <?php
    }else{//si la fecha es anterior al dia de hoy... 
        /*Cargo la portada con los articulos de esa fecha
          Si no hay articulos en esa fecha muestro cartel que diga 
          No hay articulos para esa fecha y redirijo a index
        */
        //Llamo a la clase articulo
        require_once($CLASES_DIR . 'articulo.class.php');
        $art = New articulo();
        $art->setFecha($fecha_e);
        //Verifico que en esa fecha haya articulos
        $fecha_ok = $art->verificarFecha();

        if($fecha_ok == false){//No hay articulos
            ?>
            <script>
                alert('En esa fecha no hay artículos disponibles');
                window.location.replace ("../presentacion/index.php");
            </script>
            <?php
        }else{//Hay articulos
            ?>
            <script>
                window.location.replace("../presentacion/index.php?fecha=" + "<?php echo $fecha_e;?>");
            </script>
            <?php
        }
    }
    

}
}