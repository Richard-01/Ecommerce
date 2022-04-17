<?php
require 'controlador/carrito.php';
require 'template/cabecera.php';
require 'controlador/mostrarcarrito.php';
?>

<link rel="stylesheet" href="estilos/compras/carrito.css">
<link rel="stylesheet" href="estilos/templates/footer.css">
<br> <br>


<div class="card">
    <div class="card-header border-transparent col-md-12">
        <h3>Lista del carrito</h3>
        <?php if (!empty($_SESSION['CARRITO'])) { ?>

    </div>
    <!-- /.card-header -->
    <div class="card-body p-0 col-md-12">
        <div class="table-responsive col-md-12">
            <table class="table m-0">
                <thead>
                    <tr>
                        <th class="headtable">Foto</th>
                        <th class="headtable">Nombre</th>
                        <th class="headtable">Cantidad</th>
                        <th class="headtable">Precio</th>
                        <th class="headtable">Total</th>
                        <th class="headtable">--</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php
                    //foreach lee la info de session, indice da el numero del array de carrito.php(producto)

                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    ?>
                        <tr>
                            <td><img class="img-thumbnail" width="300px" height="317px !important" src="admin_tienda/img/imagenes_cart/<?php echo $producto['FOTO']; ?>"></td>
                            <td><?php echo $producto['NOMBRE']; ?></td>
                            <td><input type="number" min="1" max="100" <?php echo $producto['CANTIDAD']; ?> value="<?php echo $producto['CANTIDAD']; ?>"></td>
                            <td>$<?php echo $producto['PRECIO']; ?></td>
                            <td>$<?php echo number_format($producto['CANTIDAD'] * $producto['PRECIO'], 2); ?></td>
                            <td class="botones">

                                <?php //con form y submit da la orden que tomar toda info y pasarla
                                ?>
                                <form action="" method="post">
                                    <input type="hidden" name="id_producto" id="id_producto" value="<?php echo openssl_encrypt($producto['id_producto'], COD, KEY); ?>">
                                    <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total = $total + ($producto['CANTIDAD'] * $producto['PRECIO']); ?>
                    <?php } ?>
                    <tr>
                        <td colspan="3" align="right">
                            <h3>Total</h3>
                        </td>
                        <td align="right">
                            <h3><?php echo number_format($total, 2); ?></h3>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="12">
                            <form action="check.php" method="post">

                                <button class="btn btn-primary btn-lg btn-block" value="proceder" name="btnAccion" type="submit">Proceder a pagar>></button>

                            </form>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
<?php } else { ?>

    <div class="alert alert-warning">
        No hay productos en el carrito...
    </div>

<?php } ?>
</div>
<!-- /.card-footer -->






</body>
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

</html>