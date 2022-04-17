<?php
require 'controlador/carrito.php';
require 'template/cabecera.php';


?>
<link rel="stylesheet" href="estilos/compras/compras.css">

<br>
<?php if ($mensaje != "") { ?>
  <div class="alert alert-warning">
    pantalla de mensaje...
    <?php //echo $mensaje; 
    ?>
    <a href="mostrarcarrito.php" class="badge badge-primary"> ver carrito</a>
  </div>
<?php } ?>

<section class="content">
  <div class="container-fluid">
  <div class="card-header bg-white border-transparent col-md-12">
      
      <button class="boton"><a class="aboton" href="compras_hombre.php">quitar filtro</a></button> 
      
      <br><br>
    <div class="row">
    
      <?php
      foreach ($listaproducto as $producto) {
        if ($producto['estado'] == 'activo') {
          if ($producto['categoria'] == "hombre") {  ?>
          <div class="col-lg-3 col-6">
            <div class="card">
              <img id="myImg" class="img-thumbnail" width="300px" height="317px !important" src="admin_tienda/img/imagenes_cart/<?php echo $producto['foto']; ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion']; ?>">
              <div class="card-body">
                <span><?php echo $producto['nombre']; ?></span>
                <h5 class="card-title">$<?php echo $producto['precio']; ?></h5>
                <p class="card-text">Stock: <?php echo $producto['stock']; ?></p>


                <form action="" method="POST">
                  <input type="hidden" name="foto" id="foto" value="<?php echo $producto['foto']; ?>">
                  <input type="hidden" name="id_producto" id="id_producto" value="<?php echo openssl_encrypt($producto['id_producto'], COD, KEY); ?>">
                  <input type="hidden" name="txtid_producto" value="<?php echo $producto['id_producto']; ?>">
                  <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                  <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                  cantidad <input type="number" min="1" max="100" name="cantidad" id="cantidad" value="1">
                  <br> <br>
                  <button class="btn btn-primary" type="submit" name="btnAccion" value="Agregar">agregar al carrito</button>
                  <br> <br>
                  <button class="btn btn-primary" type="submit" name="btnAccion" value="mostrar">ver mas...</button>
                </form>


              </div>

            </div>

          </div>
      <?php }}
      } ?>
    </div>

  </div>
</section>








<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="exampleModal">
    <div class="modal-content"><a href="#" onclick="Resetpage()" data-dismiss="modal" class="rbm_btn_x_out_shtr rbm_sldr_cmrce_close">close</a>
      <div class="row">
        <div class="col-xs-12 col-sm-5 col-md-5">
          <div id="rbm_sldr_commerce" class="carousel slide rbm_sldr_cmrce_indicators thumb_scroll_x swipe_x rbms_easeOutInCubic" data-ride="carousel" data-pause="hover" data-interval="false" data-duration="2000">
            <div class="carousel-inner" role="listbox">
              <?php

              foreach ($listaproducto as $producto) {

                if ($producto['id_producto'] == $ID) {  ?>
                  <br><br><br>
                  <div class="item active" style="transition-duration: 2000ms;"><img class="img-thumbnail" src="admin_tienda/img/imagenes_cart/<?php echo $producto['foto']; ?>" alt="rbm_slider_commerce_01"></div>

            </div>

          </div>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-7">
          <div class="rbm_sldr_cmrce_txt">
            <input type="hidden" class="form-control required" name="txtid_producto" value="<?php echo $txtid_producto; ?>" placeholder="" id="txtid_producto" require="" readonly onmousedown="return false;">
            <h1><?php echo $txtnombre; ?></h1>
            <h2>$<?php echo $producto['precio']; ?></h2>
            <h2>talla: <?php echo $txttalla; ?></h2>
            <p><?php echo $txtdescripcion; ?></p>
            <br>



        <?php }
              }

        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="rbm_form_num"><label>cantidad</label> <input type="number" min="1" max="100" name="cantidad" id="cantidad" value="1"></div>
          <input type="hidden" name="txtid_producto" value="<?php echo $producto['id_producto']; ?>">
          <input type="hidden" name="id_producto" id="id_producto" value="<?php echo openssl_encrypt($ID, COD, KEY); ?>">
          <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($NOMBRE, COD, KEY); ?>">
          <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($PRECIO, COD, KEY); ?>">
          <br>
          <div class="rbm_form_cmrce_btn"><button class="rbm_btn_x_out_shtr btn btn-primary" type="submit" name="btnAccion" value="Agregar">agregar al carrito</button></div>
        </form>

        <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {

    if (window.innerWidth < 768) {
      $('.btn').addClass('btn-sm');
    }

  });
</script>

<script>
  function Resetpage() {
    window.location.replace("hombres.php");


  }
</script>



<?php
//funcion que hace que el modal aparezca
if ($mostrarModal) { ?>

  <script>
    $('#exampleModal').modal('show');
  </script>
<?php } ?>
</div>

<script>
  $(function() {
    $('[data-toggle="popover"]').popover()
  })
</script>



<?php
require 'template/pie.php';
?>