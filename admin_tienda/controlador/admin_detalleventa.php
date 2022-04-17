<?php



//$id_ventas="";

 //$id_ventas = $_POST['txtid_venta'];


 include("conexion/conexion.php"); 

 $sentencia = $pdo->prepare("SELECT * FROM `detalleventa` WHERE id_venta=30");
 $sentencia->execute();
 $detalleventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

  
?>
