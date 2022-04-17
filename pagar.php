<?php
require 'controlador/carrito.php';
require 'controlador/pdf.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="./img/globales/favicon.ico" type="image/x-icon" />
  <script src="plugins/fontawesome/all.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="estilos/templates/cabecera.css">
  <title>compras</title>
</head>

<body>

  <br><br> <br> <br>
  <?php 
  foreach ($listaventas as $ventas) {
    if($ventas["Status"]=="aprobado"){ ?>
  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">

          <img src="img/globales/check.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top">
          <br><br>
          <h2 class="display-3 text-black">GRACIAS!</h2>
          <p class="lead mb-5">SEGUIREMOS CRECIENDO JUNTOS.</p>
          <p><a href="redireccion.php" class="btn btn-sm btn-primary"><span class="fa fa-check "></span> Volver a la tienda</a></p>
          <div class="row">
            <div id="content" class="col-lg-12">
              <a class="btn btn-primary" target="_blank" href="factura.php"><i class="fa fa-download"></i> Ver Factura</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }
  if($ventas["Status"]=="pendiente"){ ?>
    <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">

          <img src="img/globales/check.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top">
          <br><br>
          <h2 class="display-3 text-black">GRACIAS!</h2>
          <p class="lead mb-5">Estamos a la espera de que tu pago sea aprobado</p>
          <p class="lead mb-5">Estaremos en contacto contigo.</p>
          <p><a href="redireccion.php" class="btn btn-sm btn-primary"><span class="fa fa-check "></span> Volver a la tienda</a></p>
          <div class="row">
            <div id="content" class="col-lg-12">
              <a class="btn btn-primary" target="_blank" href="factura.php"><i class="fa fa-download"></i> Ver Factura</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php }
  if($ventas["Status"]=="denegado"){ ?>
    <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">

          <img src="img/globales/false.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top">
          <br><br>
          <h2 class="display-3 text-black">Upss!</h2>
          <p class="lead mb-5">Tu pago no fue aprobado lo sentimos.</p>
          <p><a href="redireccion.php" class="btn btn-sm btn-primary"><span class="fa fa-check "></span> Volver a la tienda</a></p>
          <div class="row">
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php }}?>






</body>

</html>