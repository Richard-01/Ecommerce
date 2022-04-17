<?php
require 'controlador/pdf.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Factura</title>
  <link rel="stylesheet" href="estilos/factura/main.css">
</head>

<body>
  <div class="control-bar">
    <div class="container">
      <div class="row">
        <div class="col-2-4">
          <div class="slogan">Facturación </div>


        </div>
        <div class="col-4 text-right">
          <a href="javascript:window.print()">Descargar</a>
        </div>
        <!--.col-->
      </div>
      <!--.row-->
    </div>
    <!--.container-->
  </div>
  <!--.control-bar-->

  <header class="row">
    <div class="logoholder text-center">
      <img src="img/globales/log2.png">
    </div>
    <!--.logoholder-->

    <div class="me">
      <p>
        <strong>Sistema Web S.A. de C.V.</strong><br>
        Avenida siempre viva<br>
        Colombia.<br>

      </p>
    </div>
    <!--.me-->

    <div class="info">
      <p>
        Web: <a href="http://volkerotto.net">http://localhost/ecommerce</a><br>
        E-mail: <a href="mailto:info@obedalvarado.pw">Pagina@gmail.com</a><br>
        Tel: (+57) 314-344-5852<br>

      </p>
    </div><!-- .info -->



  </header>


  <div class="row section">

    <div class="col-2">
      <h1>Factura</h1>
    </div>
    <!--.col-->
    <?php
    foreach ($listaventas as $ventas) {
    ?>
      <div class="col-2 text-right details">
        <p>
          Fecha: <?php echo $ventas['Fecha']; ?><br>
          Factura #: <?php echo $ventas['id_venta']; ?><br>

        </p>
      </div>
      <!--.col-->
    <?php }
    ?>


    <div class="col-2">

      <?php
      foreach ($listaventas as $ventas) {
      ?>
        <p class="client">
          <strong>Facturar a</strong><br>
          <?php echo $ventas['nombre']; ?><br>
          <?php echo $ventas['Correo']; ?><br>
          <?php echo $ventas['direccion']; ?><br>
          <?php echo $ventas['telefono']; ?>
        </p>
    </div>
    <!--.col-->
  <?php }
  ?>


  <div class="col-2">


    <p class="client">
      <strong>Enviar a</strong><br>

      <?php echo $ventas['nombre']; ?><br>
      <?php echo $ventas['telefono']; ?><br>
      <?php echo $ventas['direccion']; ?>

    </p>
  </div>
  <!--.col-->



  </div>
  <!--.row-->



  <div class="invoicelist-body">
    <table>
      <thead>
        <th width="5%">Código</th>
        <th width="60%">Descripción</th>

        <th width="10%">Cant.</th>
        <th width="15%">Precio</th>

        <th width="10%">Total</th>
      </thead>
      <tbody>
        <?php $total = 0;
        foreach ($listadetalle as $detalle) {
        ?>
          <tr>
            <td width='5%'> <span><?php echo $detalle['id_producto'];
                                  $idprod = $detalle['id_producto']; ?></span></td>
            <td width='60%'><span><?php
                                  $sentencia = $pdo->prepare("SELECT nombre FROM `producto` WHERE id_producto=" . $idprod . "");
                                  $sentencia->execute();
                                  $listaprod = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                                  foreach ($listaprod as $prodd) {
                                    echo $prodd['nombre'];
                                  } ?></span></td>
            <td class="amount"><?php echo $detalle['cantidad']; ?></td>
            <td class="rate"><?php echo $detalle['PrecioUnitario']; ?></td>
            <?php
            $total = $total + ($detalle['total']); ?>
            <td class="sum"><?php echo $detalle['total']; ?></td>

          </tr>
        <?php }
        ?>
      </tbody>
    </table>

  </div>
  <!--.invoice-body-->

  <div class="invoicelist-footer">
    <table>

      <tr>
        <td><strong>Total:</strong></td>
        <td id="total_price"><?php echo number_format($total, 2); ?></td>
      </tr>
    </table>
  </div>

  <div class="note">
    <h2>Nota: El pago sigue siendo procesado por el banco</h2>
  </div>
  <!--.note-->

  <footer class="row">
    <div class="col-1 text-center">
      <p class="notaxrelated">El monto de la factura no incluye el impuesto sobre las ventas.</p>

    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="assets/bower_components/jquery/dist/jquery.min.js"><\/script>')
  </script>
  <script src="assets/js/main.js"></script>
</body>

</html>