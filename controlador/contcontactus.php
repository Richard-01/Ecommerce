<?php


$txtnombre = (isset($_POST['txtnombre'])) ? $_POST['txtnombre'] : "";
$txtemail = (isset($_POST['txtemail'])) ? $_POST['txtemail'] : "";
$txttitulo = (isset($_POST['txttitulo'])) ? $_POST['txttitulo'] : "";
$txtmensaje = (isset($_POST['txtmensaje'])) ? $_POST['txtmensaje'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
include("conexion/conexion.php");
$mostrarModal = false;

switch ($accion) {

    case "Enviar":
        $mostrarModal = true;
        $sentencia = $pdo->prepare("INSERT INTO contacto(id_contacto, nombre, email, titulo, mensaje, fecha) 
    VALUES (null, :nombre, :email, :titulo, :mensaje, NOW())");

        $sentencia->bindParam(':nombre', $txtnombre);
        $sentencia->bindParam(':email', $txtemail);
        $sentencia->bindParam(':titulo', $txttitulo);
        $sentencia->bindParam(':mensaje', $txtmensaje);
        $sentencia->execute();

        break;
}
