<?php
    include $PRESENTACION_DIR ."headerNoti.php";
?>

<html>
<head>
    <link rel="stylesheet" href="<?= $CSS;?>/estilos.css">
</head>
<body id="">
<div class="container" id="faq">

    <p><a data-toggle="collapse" data-target="#q1"><h1>¿Como puedo publicitar mi producto en esta página?</h1></a></p>
        <div id="q1"class="collapse query">
            <p>Puedes ponerte en contacto a través de publicidad@pqi.com</p>
        </div>
    <p><a data-toggle="collapse" data-target="#q2"><h1>¿Qué quiere decir Iniciar Sesión con Facebook?</h1></a></p>
        <div id="q2"class="collapse query">
            <p>Quiere decir que le das permiso a Facebook para que nos de acceso a algunos de tus datos</br> 
            para poder identificarte. Tienes todas las mismas funcionalidades que registrandote con nuetro sistema</br>
            pero de esta forma es mas rápido.</br> Solo utilizaremos tu correo, tu nombre y tu edad. Y no los compartiremos con nadie!</p>
        </div>
    <p><a data-toggle="collapse" data-target="#q3"><h1>¿Por que debo estar registrado para comentar noticias?</h1></a></p>
        <div id="q3"class="collapse query">
            <p>Debes estar registrado para evitar los comentarios que no correspondan, de esta forma si un cometario</br>
            es racista, clasista o fuera de lugar esa persona puede ser bloqueada y no podra comentar mas</p>
        </div>
</div> 
</body>

