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

  <header th:fragment="navBar">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark justify-content">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="img/globales/log2.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        Rosport
      </a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="compras_hombre.php">Compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="quienesSomos.php">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="contactus.php">Contacto</a>
          </li>
        </ul>


        <div class="">

          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <div class="pruebita"><i class="fa fa-user fa-fw usericon"></i></div>

            <a class="nav-link prueba" href="Loginn/login.php">administrador</a>
            <div class="pruebita"><i class="fa fa-shopping-cart fa-fw usericon "></i></div>
            <a class="nav-link  prueba" href="mostrarcarrito.php" tabindex="-1" aria-disabled="true">carrito
              (<?php
                //validamos, empty valida si hay algo, ? es un if ternario
                echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']);

                ?>)</a>
          </ul>

        </div>

      </div>
    </nav>
  </header>



  <br><br> <br>
  <div class="container">