<?php 

//imprime que valores tiene la variable
//echo $_POST ['txtid_usuario '];
//identificar si la variable tiene valores
$txtid_usuario  = (isset($_POST['txtid_usuario'])) ? $_POST['txtid_usuario'] : "";
$txtusuario = (isset($_POST['txtusuario'])) ? $_POST['txtusuario'] : "";
$txtnombre = (isset($_POST['txtnombre'])) ? $_POST['txtnombre'] : "";
$txtApellido = (isset($_POST['txtApellido'])) ? $_POST['txtApellido'] : ""; 
$txtfecha = (isset($_POST['txtfecha'])) ? $_POST['txtfecha'] : "";
$txtcorreo = (isset($_POST['txtcorreo'])) ? $_POST['txtcorreo'] : "";
$txttalla = (isset($_POST['txttalla'])) ? $_POST['txttalla'] : "";

$slcestado = (isset($_POST['slcestado'])) ? $_POST['slcestado'] : false;
$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto']["name"] : ""; 



//identifica con accion que boton fue oprimido
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
//sirve para almacenar todos los errores 
$error = array();


//inicializar variable para modal
$accionAgregar = "";
$accionModificar = $accionEliminar = "disabled";
$mostrarModal = false;



//conexion bd
include("conexion/conexion.php");

switch ($accion) {    

    case "btnModificar":
        //ejecutamos sentencia sql y con execute y pdo pasa a la bd
        $sentencia = $pdo->prepare("UPDATE administrador SET 
          usuario=:usuario,nombre=:nombre,
          Apellido=:Apellido,fecha=:fecha,correo=:correo
          ,estado=:estado WHERE id_usuario=:id_usuario");

        $sentencia->bindParam(':usuario', $txtusuario);
        $sentencia->bindParam(':nombre', $txtnombre);
        $sentencia->bindParam(':Apellido', $txtApellido);
        $sentencia->bindParam(':fecha', $txtfecha);
        $sentencia->bindParam(':correo', $txtcorreo);

       
        $sentencia->bindParam(':estado', $slcestado);

        $sentencia->bindParam(':id_usuario', $txtid_usuario );
        $sentencia->execute();


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
        header('location: detalleadmin.php');


        echo "presionaste btnModificar";
        break;


    case "btnEliminar":       
        $sentencia = $pdo->prepare("SELECT foto FROM administrador  WHERE id_usuario=:id_usuario");

        $sentencia->bindParam(':id_usuario', $txtid_usuario);
        $sentencia->execute();
        $admin = $sentencia->fetch(PDO::FETCH_LAZY);



        if (isset($admin["foto"])) {
            if (file_exists("img/imagenes_admins/" . $admin["foto"]) && $admin["foto"] != "imagen.jpg") {
                unlink("img/imagenes_admins/" . $admin["foto"]);
            }
        }


        $sentencia = $pdo->prepare("DELETE FROM administrador  WHERE id_usuario=:id_usuario");

        $sentencia->bindParam(':id_usuario', $txtid_usuario);
        $sentencia->execute();
        header('location: detalleadmin.php');
        echo "presionaste btnEliminar";
        break;

    case "btnCancelar":
        header('location: detalleadmin.php');
        break;

    case "btnClose":
        header('location: detalleadmin.php');
        break;



    case "Seleccionar":

        $accionAgregar = "disabled hidden";
        $accionModificar = $accionEliminar = $accionCancelar = "";    
        $mostrarModal = true;

         

        $sentencia = $pdo->prepare("SELECT * FROM administrador  WHERE id_usuario=:id_usuario");

        $sentencia->bindParam(':id_usuario', $txtid_usuario);
        $sentencia->execute();
        $admin = $sentencia->fetch(PDO::FETCH_LAZY);



        $txtusuario = $admin['usuario'];
        $txtfoto = $admin['foto'];
        $txtnombre = $admin['nombre'];
        $txtApellido = $admin['Apellido'];
        $txtfecha = $admin['fecha'];
        $txtcorreo = $admin['correo'];
       
        $slcestado = $admin['estado'];







        break;
}

$sentencia = $pdo->prepare("SELECT * FROM `administrador` WHERE 1");
$sentencia->execute();
$listaadmin = $sentencia->fetchAll(PDO::FETCH_ASSOC); 


?>