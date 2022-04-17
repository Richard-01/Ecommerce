<?php
require 'controlador/index.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rosport</title>


    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="plugins/fontawesome/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="./img/globales/log2.png" type="image/x-icon" />
    <link rel="stylesheet" href="estilos/index/indexpc.css">
    <link rel="stylesheet" href="estilos/templates/cabecera.css">
    <link rel="stylesheet" href="estilos/templates/footer.css">





</head>
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="img/globales/log2.png" alt="AdminLTELogo" height="60" width="60">
</div>


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
                        <a class="nav-link active" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="compras_hombre.php">Compras</a>
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

    <app-root class="root"></app-root>
    <!-- Carusel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/index/backk.jpg" alt="First slide">
                <div class="carousel-caption vertical-align d-none d-md-block text-left">
                    <h2 class="font-weigth bold text-uppercase">Tenemos<br>Mucha variedad</h2>
                    <button class="bcomprar"><a class="bcomprar" href="compras_hombre.php">Compra ya</a></button>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/index/back1.jpg" alt="Second slide">
                <div class="carousel-caption vertical-align d-none d-md-block">
                    <h2 class="font-weigth bold text-uppercase tittle">Puedes escribirnos</h2>
                    <p class="lettter">y comentarnos tus dudas e inquietudes</p>
                    <button class="bcomprar"><a class="bcomprar" href="contactus.php">Aqu&iacute;</a> </button>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/index/back2.jpg" alt="Third slide">
                <div class="carousel-caption vertical-align d-none d-md-block text-left">
                    <h2 class="font-weigth bold text-uppercase letterr">SUSCR&Iacute;BETE</h2>
                    <p class="letterr">para recibir notificaciones sobre nosotros </p>
                    <form action="" method="POST">
                        <button class="bcomprar" type="submit" name="btnAccion" value="mostrar">Aqu&iacute;</button>
                    </form>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br><br><br>
    <div class="row">
        <div class="col-md-12">

            <div class="site-section1 site-blocks-2">

                <div class="contenedor">
                    <div class="col-sm-6 col-md-6 col-lg-6 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                        <div class="imagen">
                            <div class="escrito">
                                <span>
                                    ES LA HORA <br>
                                    PARA <br>
                                    AVANZAR <br>
                                    EN TU JUEGO
                                </span>
                                <br>
                                <br>
                                <br>
                                <button class="boton"><a class="aboton" href="compras_hombre.php">Compra ahora</a> </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                        <div class="imagen2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Wave">
        <div style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 100" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: orangered;"></path>
            </svg></div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="site-section site-blocks-2">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-7 site-section-heading pt-4">
                        <h2 class="letterr">Categor&iacute;as</h2>
                        <hr class="mx-auto">
                        <p class="letterr">Aquí puedes ver nuestras secciones.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                        <a class="block-2-item" href="mujeres.php">
                            <figure class="image">
                                <img src="img/index/women.jpg" alt="" class="img-fluid">
                            </figure>
                            <div class="text">
                                <span class="text-uppercase">Colecci&oacute;n</span>
                                <h3>Mujer</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                        <a class="block-2-item" href="accesorios.php">
                            <figure class="image">
                                <img src="img/index/accesorio.jpg" alt="" class="img-fluid">
                            </figure>
                            <div class="text">
                                <span class="text-uppercase">Colecci&oacute;n</span>
                                <h3>Accesorios</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                        <a class="block-2-item" href="hombres.php">
                            <figure class="image">
                                <img src="img/index/men.jpg" alt="" class="img-fluid">
                            </figure>
                            <div class="text">
                                <span class="text-uppercase">Colecci&oacute;n</span>
                                <h3>Hombre</h3>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="Wave">
        <div style="margin-top: -55px; height: 150px; background-color: orangered; "><svg viewBox="0 0 500 100" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C149.99,150.00 349.20, -49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: white;"></path>
            </svg></div>
    </div>
    <br>




    <div class="row">
        <div class="col-md-12">

            <div class="site-section1 site-blocks-2">


                <div class="contenedor3">

                    <div class="escrito5">
                        <div>
                            <p class="escrito5p">EJERCICIO EN <br>
                                CUALQUIER MOMENTO, <br>
                                EN CUALQUIER SITIO <br>
                            </p>
                        </div>
                        <div>
                            <p class="escrito5p2">Para el mejor rendimiento en el deporte <br>
                                encuentra todo en Ropa deportiva camisetas <br>
                                deportivas, Leggins, chaquetas deportivas, <br>
                                sudaderas, faldas deportivas y mucho más.
                            </p>
                            <button class="escrito5boton">leer mas</button>
                        </div>


                    </div>
                    <div class="imagen3"></div>
                </div>
            </div>
        </div>
    </div>


    <br>

    <br>
    <!--Articulos de compra-->
    
    
    


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="exampleModal"> 
            <br> <br> <br> <br> <br>
            <div class="modal-content"><a href="#" onclick="Resetpage()" data-dismiss="modal" class="rbm_btn_x_out_shtr rbm_sldr_cmrce_close">close</a>
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5">
                        <div id="rbm_sldr_commerce"  data-ride="carousel" data-pause="hover" data-interval="false" data-duration="2000">
                            <div class="carousel-inner" role="listbox">

                                <h2 class="modaletter">¡Suscribete para recibir todas nuestras ofertas!</h2>


                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7">
                        <div class="rbm_sldr_cmrce_txt">
                                <br> <br> 
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="email" class="form-control" required name="txtsus" id="txtsus" placeholder="example@gmail.com">  
                                <br> <br> <br>
                                <div class="rbm_form_cmrce_btn"><button class="rbm_btn_x_out_shtr btn btn-primary" type="submit" name="btnAccion" value="Agregar">Suscribete</button></div>
                            </form>


                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <img class="logg" src="img/globales/log2.png" alt="">
                <p class="pt-0.3">Crecemos contigo y nos adaptamos a ti ¡Porque tu eres lo mas 
                    importante para nosotros!
                </p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Mira mas</h5>
                <ul class="text-uppercase list-unstyled">
                        <li><a href="index.php">Home</a></li>
                       <li><a href="compras_hombre.php">Compras</a></li>
                       <li><a href="quienesSomos.php">Nosotros</a></li>
                       <li><a href="contactus.php">Contacto</a></li>   
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Contactenos</h5>
                <div>
                    <h6 class="text-uppercase">Dirección</h6>
                    <p>Calle 123 Numero 145A - 48 Sur</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Celular</h6>
                    <p>(+57) 314-344-5852</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>Pagina@gmail.com</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <h5 class="pb-2">Redes</h5>
                <div class="redes">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="row container">
                <div class="col-lg-3 col-md-6 col-12 text-nowrap">
                    <p>pagina ecommerce © 2021. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>


    <?php
    //funcion que hace que el modal aparezca
    if ($mostrarModal) { ?>
        <script>
            $('#exampleModal').modal('show');
        </script>
    <?php } ?>


    <script src="admin_tienda/dist/js/adminlte.js"></script>


</body>

</html>