<?php
require 'controlador/carrito.php';
require 'controlador/pdf.php';

if ($_POST) {
    $total = 0;
    $entrada=[];
    $status=[];
    $entrada = array("aprobado", "pendiente", "denegado");
    $status = array_rand($entrada, 1);
   $nombre=$_POST['nombrec'];
   $apellido=$_POST['apellido'];
   $nombrecompleto=$nombre ." ". $apellido;
   $direccion=$_POST['direccion'];
   $telefono=$_POST['phone'];
    
    //clave de la session
    $sid = session_id();
    $correo = $_POST['email'];
    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }
    $sentencia = $pdo->prepare("INSERT INTO `ventas` (`id_venta`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `nombre`, `Correo`, `telefono`, `direccion`, `Total`, `Status`) 
    VALUES (NULL, :ClaveTransaccion, '', NOW(), :nombre, :Correo, :telefono, :direccion, :Total, :estatus);");
    $sentencia->bindParam(":ClaveTransaccion", $sid);
    $sentencia->bindParam(":Correo", $correo);
    $sentencia->bindParam(":Total", $total);
    $sentencia->bindParam(":estatus", $entrada[$status]);
    $sentencia->bindParam(":nombre", $nombrecompleto);
    $sentencia->bindParam(":direccion", $direccion);
    $sentencia->bindParam(":telefono", $telefono);
    $sentencia->execute();
    $idventa = $pdo->LastInsertId();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $subtotal = ($producto['PRECIO'] * $producto['CANTIDAD']);
        $sentencia = $pdo->prepare("INSERT INTO 
        `detalleventa` (`id`, `id_venta`, `id_producto`, `PrecioUnitario`, `cantidad`, `descargado`,`total`) 
        VALUES (NULL, :id_venta, :id_producto, :PrecioUnitario, :cantidad, '0', :total);");
        $sentencia->bindParam(":id_venta", $idventa);
        $sentencia->bindParam(":id_producto", $producto['id_producto']);
        $sentencia->bindParam(":PrecioUnitario", $producto['PRECIO']);
        $sentencia->bindParam(":cantidad", $producto['CANTIDAD']);
        $sentencia->bindParam(":total", $subtotal);
        $sentencia->execute();
    
      }
}
header("Location: http://localhost/ecommerce/pagar.php");
?>