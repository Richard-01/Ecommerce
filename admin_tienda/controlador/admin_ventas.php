 <?php

   $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
   include("conexion/conexion.php");

   $sentencia = $pdo->prepare("SELECT * FROM `ventas` WHERE 1 ORDER BY id_venta DESC");
   $sentencia->execute();
   $listaventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);  

   switch ($accion) {
      case "vermas":


         $id_ventas = $_POST['txtid_venta'];




         $sentencia = $pdo->prepare("SELECT * FROM `detalleventa` WHERE id_venta= $id_ventas");
         $sentencia->execute();
         $detalleventas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
         break;
   }

   ?>