<?php
require 'controlador/carrito.php';


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
    <br><br>
    <div class="site-section">
        <div class="container">
        <form action="redireccionpago.php" method="post">
            <div class="row">
                <div class="col-md-6 mb-6 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Detalles pago</h2>
                    <div class="p-3 p-lg-6 border">
                        <div class="form-group">
                            <label for="c_country" class="text-black">Pais <span class="text-danger">*</span></label>
                            <select id="c_country" class="form-control">
                                <option value="" disabled selected>Selecciona un pais</option>
                                <option value="1">Colombia</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">nombre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nombrec" name="nombrec" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">apellido <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="dg 34 Nº38-91">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input id="email" class="form-control" type="email" name="email" placeholder="por favor escribe tu correo" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_companyname" class="text-black">Nº Tarjeta<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="tarjeta" name="tarjeta" required>
                            </div>
                        </div>               

                        

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_mes" class="text-black">Caducida/mm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_mes" name="c_mes" placeholder="mm">
                            </div>
                            <div class="col-md-6">
                                <label for="c_año" class="text-black">Caducida/aa  <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_año" name="c_año" placeholder="aa">
                            </div>
                        </div>

                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="cods" class="text-black">Cod seguridad<span class="text-danger">*</span></label>
                                <input id="email" class="form-control" type="cods" name="cods" placeholder="por favor escribe tu correo" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                            </div>
                        </div>                 

                    </div>
                </div>


                <div class="row col-md-6 mb-6 mb-md-0">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Tu orden</h2>
                        <div class="p-6 p-lg-6 border">
                            <table class="table site-block-order-table mb-5">
                                <thead>
                                    <th>Productos</th>
                                    <th>Total</th>
                                </thead>
                                <tbody>
                                <?php $total = 0; ?>
                                <?php
                                //foreach lee la info de session, indice da el numero del array de carrito.php(producto)
                    
                                 foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                                ?>
                                    <tr>
                                        <td><?php echo $producto['NOMBRE']; ?><strong class="mx-2">x</strong> <?php echo $producto['CANTIDAD']; ?></td>
                                        <td>$<?php echo $producto['CANTIDAD'] * $producto['PRECIO']; ?></td>
                                    </tr>
                                    <?php 
                                $total = $total + ($producto['CANTIDAD'] * $producto['PRECIO']);
                                } ?>                                    
                                    <tr>
                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                        <td class="text-black font-weight-bold"><strong>$<?php echo number_format($total, 2); ?></strong></td>
                                    </tr>
                                    
                                </tbody>
                            </table>



                            <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block" value="proceder" name="btnAccion" type="submit">Proceder a pagar>></button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            </form>
        </div>
        <!-- </form> -->
    </div>
    </div>

</body>

</html>