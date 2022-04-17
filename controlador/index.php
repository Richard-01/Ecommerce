<?php
include("conexion/conexion.php");
$txtsus = (isset($_POST['txtsus'])) ? $_POST['txtsus'] : "";
//identifica con accion que boton fue oprimido
$accion = (isset($_POST['btnAccion'])) ? $_POST['btnAccion'] : "";

$mostrarModal = false;

if (isset($_POST['btnAccion'])) {
switch($_POST['btnAccion']){
case "mostrar":
$mostrarModal = true;
break;}}


switch($accion){
case "Agregar":
    $sentencia = $pdo->prepare("INSERT INTO suscripcion(id_sub, correo) 
    VALUES (null, :correo)");

        
        $sentencia->bindParam(':correo', $txtsus);        
        $sentencia->execute();
    
    break;
}
?>