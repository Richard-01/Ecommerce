<?php
$sentencia = $pdo->prepare("SELECT * FROM `administrador` WHERE 1");
$sentencia->execute();
$listaadmin = $sentencia->fetchAll(PDO::FETCH_ASSOC); 
?>