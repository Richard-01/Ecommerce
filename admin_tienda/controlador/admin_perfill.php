<?php
include("conexion/conexion.php");
$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto']["name"] : ""; 
$txtid_usuario  = (isset($_POST['txtid_usuario'])) ? $_POST['txtid_usuario'] : "";
$txtnombre = (isset($_POST['txtnombre'])) ? $_POST['txtnombre'] : "";
$txtApellido = (isset($_POST['txtApellido'])) ? $_POST['txtApellido'] : ""; 
$txtcorreo = (isset($_POST['txtcorreo'])) ? $_POST['txtcorreo'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
switch($accion){

    case "modificar":
     //se guarda la hora por si el usuario sube dos archvos con igual nombre evita errores
     $Fecha = new DateTime();
     //hace que la foto se actualize si existe una nueva foto

     $nombreArchivo = ($txtfoto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["txtfoto"]["name"] : "default.jpg";
     $tmpFoto = $_FILES["txtfoto"]["tmp_name"];

     if ($tmpFoto != "") {
         move_uploaded_file($tmpFoto, "img/imagenes_admins/" . $nombreArchivo);

         $sentencia = $pdo->prepare("SELECT foto FROM administrador  WHERE id_usuario=:id_usuario");

         $sentencia->bindParam(':id_usuario',$txtid_usuario);
         $sentencia->execute();
         $admin = $sentencia->fetch(PDO::FETCH_LAZY); 



         if (isset($producto["foto"])) {
             if (file_exists("img/imagenes_admins/" . $admin["foto"]) && $admin["foto"] != "default.jpg") {
                 unlink("img/imagenes_admins/" . $admin["foto"]);
             }
         }



         $sentencia = $pdo->prepare("UPDATE administrador SET 
       foto=:foto WHERE id_usuario=:id_usuario");
         $sentencia->bindParam(':foto', $nombreArchivo);

         $sentencia->bindParam(':id_usuario',$txtid_usuario);
         $sentencia->execute();
     }
        //redireccion para que no se mande el formulario de nuevo
        header('location: perfil.php');
        echo "presionaste btnModificar";
    break;

    case "cambiar":
        $sentencia = $pdo->prepare("UPDATE administrador SET 
         nombre=:nombre,Apellido=:Apellido,correo=:correo
        WHERE id_usuario=:id_usuario");

   
        $sentencia->bindParam(':nombre', $txtnombre);
        $sentencia->bindParam(':Apellido', $txtApellido);        
        $sentencia->bindParam(':correo', $txtcorreo);
        $sentencia->bindParam(':id_usuario', $txtid_usuario );
        $sentencia->execute();
    break;
    }

$sentencia = $pdo->prepare("SELECT * FROM `administrador` WHERE 1");
$sentencia->execute();
$listaadmin = $sentencia->fetchAll(PDO::FETCH_ASSOC); 

?>