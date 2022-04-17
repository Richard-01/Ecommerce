<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rosport</title>

    <link rel="icon" type="image/x-icon" href="img/globales/Triangulo.png">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="plugins/fontawesome/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="./img/globales/log2.png" type="image/x-icon" />
    <link rel="stylesheet" href="estilos/Nosotros/nosotros.css">
    <link rel="stylesheet" href="estilos/templates/cabecera.css">
    <link rel="stylesheet" href="estilos/templates/footer.css">
    <title>Document</title>
</head>

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
                    <a class="nav-link " href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="compras_hombre.php">Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="quienesSomos.php">Nosotros</a>
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

<body>

    <img src="/img/somos/Somos.PNG" alt="">
    <h1 class="title">¿Qui&eacute;nes somos?</h1>
    <br>
    <div class="texts">
        <div class="">

        </div>
        <p>Somos una empresa que distribuye prendas y accesorios de diferentes proveedores,
            nacionales e internacionales, en nuestro sitio web usted cuenta con m&uacute;ltiples opciones
            para su gusto y diferentes medio de pago desde la comodidad de su hogar.</p>
        <br>
        <br>
    </div>

    <div class="accordion">
        <div class="accordion-item">
            <div class="accordion-item-header">
                Misión
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <p> Es tener un ambiente de compra agradable, con facil acceso para mayor comodidad.
                    </p>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header">
                visión
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <p>Cada dia servir mejor a nuestros clientes para que siempre
                        esten a gustos con los precios.
                    </p>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <div class="accordion-item-header">
                Un poco de historia
            </div>
            <div class="accordion-item-body">
                <div class="accordion-item-body-content">
                    <p>Este sitio web fue creado para ayudar a empresas pymes que por problemas de la pandemia disminulleros sus comprar.</p>
                    <br>
                    <p>Lo que queremos lograr es que nuestro sitio ayuden a las empresas pymes para lograr superar sus compras y volver a sus estandares economicos.</p>
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

    <script>
        const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

        accordionItemHeaders.forEach(accordionItemHeader => {
            accordionItemHeader.addEventListener("click", event => {

                accordionItemHeader.classList.toggle("active");
                const accordionItemBody = accordionItemHeader.nextElementSibling;
                if (accordionItemHeader.classList.contains("active")) {
                    accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
                } else {
                    accordionItemBody.style.maxHeight = 0;
                }
            });
        });
    </script>



</body>

</html>