<?php
    include $PRESENTACION_DIR ."headerNoti.php";
?>

<html>
<head>
    <link rel="stylesheet" href="<?= $CSS;?>/estilos.css">
</head>
<body id="">

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h3 class="h3">
                <small>¿Tenes alguna sugerencia? ¿Queres trabajar con nosotros?</small></h3>
                <h1 id="c">Ponete en contacto</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="" method="" id="" name="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Ingrese su nombre" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Ingrese su email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Motivo</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Elija uno:</option>
                                <option value="service">Sugerencias</option>
                                <option value="suggestions">Trabajo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Ingrese su sugerencia o su curriculum"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Enviar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Nuestra oficina</legend>
            <address>
                <strong>Paqueteinformes, SA.</strong><br>
                WTC Montevideo Free Zone, Apto 600<br>
                Montevideo, Uruguay<br>
                <abbr title="Telefono">
                    Tel:</abbr>
                (598) 2458-7890
            </address>
            <address>
                <strong>Correo</strong><br>
                <a href="#">contacto@pqi.com</a>
            </address>
            </form>
        </div>
    </div>
</div>