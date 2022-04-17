<?php 


//conexion bd
include("admin_tienda/conexion/conexion.php");

$sid = session_id();

$sentencia = $pdo->prepare("SELECT * FROM `producto` WHERE 1");
$sentencia->execute();
$listaproducto = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $pdo->prepare("SELECT * FROM `detalleventa` WHERE 1");
$sentencia->execute();
$listavea = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $pdo->prepare("SELECT MAX(id_venta) AS max_items FROM ventas");
$sentencia->execute();
$venta = $sentencia->fetchAll(PDO::FETCH_ASSOC);
foreach ($venta as $vent) {
    $idmax= $vent["max_items"];
    
 }


$sentencia = $pdo->prepare("SELECT * FROM `ventas` WHERE id_venta=".$idmax."");
$sentencia->execute();
$listaventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $pdo->prepare("SELECT * FROM `detalleventa` WHERE id_venta=".$idmax."");
$sentencia->execute();
$listadetalle = $sentencia->fetchAll(PDO::FETCH_ASSOC);
foreach ($listadetalle as $detalle) {
$idprod=$detalle['id_producto'];
}



?>