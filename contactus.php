<?php
require 'controlador/contcontactus.php';



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

  <header th:fragment="navBar">
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark justify-content">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="img/globales/log2.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
        ecommerce
      </a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item ">
            <a class="nav-link " href="index.php">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="compras_hombre.php">Compras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="quienesSomos.php">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contactus.php">Contacto</a>
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
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">

        <form action="" method="post" enctype="multipart/form-data">
          <!-- Default box -->
          <div class="card">
            <div class="card-body row">
              <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                  <h3>¡D&eacute;janos un mensaje,</h3>
                  <h3>o ll&aacute;manos!</h3>
                  <p class="lead mb-5">Tel&eacute;fono: +57 3104556789<br> 
                    
                  </p>
                </div>
              </div>
              <div class="col-7">
                <div class="form-group">
                  <label for="inputName"> <b>Nombre</b></label>
                  <input type="text" id="inputName" class="form-control" required name="txtnombre" />
                </div>
                <div class="form-group">
                  <label for="inputEmail"><b>Email</b></label>
                  <input type="email" id="inputEmail" class="form-control" required name="txtemail" />
                </div>
                <div class="form-group">
                  <label for="inputSubject"><b>titulo</b></label>
                  <input type="text" id="inputSubject" class="form-control" required name="txttitulo" />
                </div>
                <div class="form-group">
                  <label for="inputMessage"><b>Mensaje</b></label>
                  <textarea id="inputMessage" class="form-control" rows="4" required name="txtmensaje"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="accion" value="Enviar">
                </div>
              </div>
            </div>
          </div>
        </form>

      </section>
      <!-- /.content -->
      <div class="modal" tabindex="-1" role="dialog" id="modal">
        <div class="modal-dialog" role="document" id="modal">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Mensaje</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Gracias por comunicarte con nosotros</p>
              <p>Te responderemos lo mas rapido posible</p>
              <p>¡Tus comentarios nos hace evolucionar!</p>
            </div>
            <div class="modal-footer">              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    //funcion que hace que el modal aparezca
    if ($mostrarModal) { ?>

      <script>
        $('#modal').modal('show');
      </script>
    <?php } ?>

    <?php
    require 'template/pie.php';
    ?>