<?php
@session_start();

session_unset();
session_destroy();

//header ('Location: ' . $PRESENTACION_DIR .'/index.php');
?>
<script>
window.location.replace ("../presentacion/index.php");
</script>
