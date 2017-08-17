<?php

?>

<html>

<body>
<div class="row">
    <div class="col-md-3">
    fecha
    </div>
    <div class="col-md-6">
    <img src="logo.png" style="width:100%;height:200px;">
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-2">
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalLogin" style="margin-top:80px;" align="left">
            <span class="glyphicon glyphicon-log-in"> Ingresar</span>
        </button>
    </div>
</div>
<!-- asdasd-->
<!-- BARRA DE NAVEGACION -->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<!-- MODAL REGISTRO -->
<div id="modalLogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ingresar</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="formLogin" role="form">
          <div class="form-group">
            <label for="correo">Correo</label>
              <input type="text" id="correo" name="correo" required class="form-control">
          </div>

        </form>
      </div><!--modal body-->
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div>

  </div>
</div>



