<?php
include("conexion/configventas.php");
include("conexion/conexionventas.php");

$sentencia = $pdo->prepare("SELECT count(*) totalventas FROM ventas");
$sentencia->execute();
$registro=$sentencia->fetch(PDO::FETCH_ASSOC);
$totalventas = $registro['totalventas'];

$sentencia = $pdo->prepare("SELECT count(*) totalventas FROM ventas WHERE Status=\"aprobado\"");
$sentencia->execute();
$registro=$sentencia->fetch(PDO::FETCH_ASSOC);
$aprobadas = $registro['totalventas'];
$sentencia = $pdo->prepare("SELECT count(*) totalventas FROM ventas WHERE Status=\"denegado\"");
$sentencia->execute();
$registro=$sentencia->fetch(PDO::FETCH_ASSOC);
$denegados = $registro['totalventas'];
$sentencia = $pdo->prepare("SELECT count(*) totalventas FROM ventas WHERE Status=\"pendiente\"");
$sentencia->execute();
$registro=$sentencia->fetch(PDO::FETCH_ASSOC);
$pendientes = $registro['totalventas'];

?>