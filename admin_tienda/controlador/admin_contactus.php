<?php 
   $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
   include('conexion/conexion.php');


   $sentencia = $pdo->prepare("SELECT * FROM contacto WHERE 1");
   $sentencia->execute();
   $listasms = $sentencia->fetchAll(PDO::FETCH_ASSOC);
   switch ($accion) {
      case "vermass":


         $id_sms = $_POST['txtid_sms'];

         $sentencia = $pdo->prepare("SELECT * FROM `contacto` WHERE id_contacto= $id_sms");
         $sentencia->execute();
         $detallesms = $sentencia->fetchAll(PDO::FETCH_ASSOC);
         break;
   }
?>