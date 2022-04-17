<?php
//imprime que valores tiene la variable
//echo $_POST ['txtid_producto'];
//identificar si la variable tiene valores
$txtid_producto = (isset($_POST['txtid_producto'])) ? $_POST['txtid_producto'] : "";
$txtid_vendedor = (isset($_POST['txtid_vendedor'])) ? $_POST['txtid_vendedor'] : "";
$txtnombre = (isset($_POST['txtnombre'])) ? $_POST['txtnombre'] : "";
$txtdescripcion = (isset($_POST['txtdescripcion'])) ? $_POST['txtdescripcion'] : ""; 
$txtstock = (isset($_POST['txtstock'])) ? $_POST['txtstock'] : "";
$txtprecio = (isset($_POST['txtprecio'])) ? $_POST['txtprecio'] : "";
$txttalla = (isset($_POST['txttalla'])) ? $_POST['txttalla'] : "";

$slcestado = (isset($_POST['slcestado'])) ? $_POST['slcestado'] : "";
$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto']["name"] : ""; 

$slccategoria = isset($_POST['slccategoria']) ? $_POST['slccategoria'] : false;

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

   

    case "btnAgregar":

        //verifica si esta vacio y valida se hace por seguridad de la pag
        if ($txtid_vendedor == "") {
            $error['id_vendedor'] = "Escribe el id de vendedor";
        }
        if ($txtnombre == "") {
            $error['nombre'] = "Escribe el nombre";
        }
        if ($txtdescripcion == "") {
            $error['descripcion'] = "Escribe la descripcion";
        }
        if ($txtstock == "") {
            $error['stock'] = "Escribe la cantidad en stock";
        }
        if ($txtprecio == "") {
            $error['precio'] = "Escribe el precio";
        }
        if ($txttalla == "") {
            $error['talla'] = "Escribe el talla";
        }
        if ($slccategoria == "") {
            $error['slccategoria'] = "selecciona uno";
        }

        if (count($error) > 0) {
            $mostrarModal = true;

            break;
        }


        //ejecutamos sentencia sql y con execute y pdo pasa a la bd
        $sentencia = $pdo->prepare("INSERT INTO producto(id_producto,id_vendedor,nombre,descripcion,stock,precio,talla,foto,categoria,estado) VALUES(:id_producto,:id_vendedor,:nombre,:descripcion,:stock,:precio,:talla,:foto,:categoria,:estado)");

        $sentencia->bindParam(':id_producto', $txtid_producto);
        $sentencia->bindParam(':id_vendedor', $txtid_vendedor);
        $sentencia->bindParam(':nombre', $txtnombre);
        $sentencia->bindParam(':descripcion', $txtdescripcion);
        $sentencia->bindParam(':stock', $txtstock);
        $sentencia->bindParam(':precio', $txtprecio);
        $sentencia->bindParam(':talla', $txttalla);
        $sentencia->bindParam(':categoria', $slccategoria);
        $sentencia->bindParam(':estado', $slcestado);

        //se guarda la hora por si el usuario sube dos archvos con igual nombre evita errores
        $Fecha = new DateTime();
        //recibe la variable de imagen y si no hay imagen se pone la imagen.jpg en la carpeta por default
        $nombreArchivo = ($txtfoto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["txtfoto"]["name"] : "imagen.jpg";
        $tmpFoto = $_FILES["txtfoto"]["tmp_name"];
        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "img/imagenes_cart/" . $nombreArchivo);
        }

        $sentencia->bindParam(':foto', $nombreArchivo);
        $sentencia->execute();
        //redireccion para que no se mande el formulario de nuevo
        header('location: vistaadmin_producto.php');

        break;

    case "btnModificar":
        //ejecutamos sentencia sql y con execute y pdo pasa a la bd
        $sentencia = $pdo->prepare("UPDATE producto SET 
          id_vendedor=:id_vendedor,nombre=:nombre,
          descripcion=:descripcion,stock=:stock,precio=:precio
          ,talla=:talla,categoria=:categoria,estado=:estado WHERE id_producto=:id_producto");

        $sentencia->bindParam(':id_vendedor', $txtid_vendedor);
        $sentencia->bindParam(':nombre', $txtnombre);
        $sentencia->bindParam(':descripcion', $txtdescripcion);
        $sentencia->bindParam(':stock', $txtstock);
        $sentencia->bindParam(':precio', $txtprecio);
        $sentencia->bindParam(':talla', $txttalla);
        $sentencia->bindParam(':categoria', $slccategoria);
        $sentencia->bindParam(':estado', $slcestado);

        $sentencia->bindParam(':id_producto', $txtid_producto);
        $sentencia->execute();


        //se guarda la hora por si el usuario sube dos archvos con igual nombre evita errores
        $Fecha = new DateTime();
        //hace que la foto se actualize si existe una nueva foto

        $nombreArchivo = ($txtfoto != "") ? $Fecha->getTimestamp() . "_" . $_FILES["txtfoto"]["name"] : "imagen.jpg";
        $tmpFoto = $_FILES["txtfoto"]["tmp_name"];

        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "img/imagenes_cart/" . $nombreArchivo);

            $sentencia = $pdo->prepare("SELECT foto FROM producto  WHERE id_producto=:id_producto");

            $sentencia->bindParam(':id_producto', $txtid_producto);
            $sentencia->execute();
            $producto = $sentencia->fetch(PDO::FETCH_LAZY); 



            if (isset($producto["foto"])) {
                if (file_exists("img/imagenes_cart/" . $producto["foto"]) && $producto["foto"] != "imagen.jpg") {
                    unlink("img/imagenes_cart/" . $producto["foto"]);
                }
            }



            $sentencia = $pdo->prepare("UPDATE producto SET 
          foto=:foto WHERE id_producto=:id_producto");
            $sentencia->bindParam(':foto', $nombreArchivo);

            $sentencia->bindParam(':id_producto', $txtid_producto);
            $sentencia->execute();
        }








        //redireccion para que no se mande el formulario de nuevo
        header('location: vistaadmin_producto.php');


        echo "presionaste btnModificar";
        break;


    case "btnEliminar":
        $sentencia = $pdo->prepare("SELECT foto FROM producto  WHERE id_producto=:id_producto");

        $sentencia->bindParam(':id_producto', $txtid_producto);
        $sentencia->execute();
        $producto = $sentencia->fetch(PDO::FETCH_LAZY);



        if (isset($producto["foto"])) {
            if (file_exists("img/imagenes_cart/" . $producto["foto"]) && $producto["foto"] != "imagen.jpg") {
                unlink("img/imagenes_cart/" . $producto["foto"]);
            }
        }


        $sentencia = $pdo->prepare("DELETE FROM producto  WHERE id_producto=:id_producto");

        $sentencia->bindParam(':id_producto', $txtid_producto);
        $sentencia->execute();
        header('location: vistaadmin_producto.php');
        echo "presionaste btnEliminar";
        break;

    case "btnCancelar":
        header('location: vistaadmin_producto.php');
        break;

    case "btnClose":
        header('location: vistaadmin_producto.php');
        break;



    case "Seleccionar":

        $accionAgregar = "disabled hidden";
        $accionModificar = $accionEliminar = $accionCancelar = "";
        $mostrarModal = true;

        $sentencia = $pdo->prepare("SELECT * FROM producto  WHERE id_producto=:id_producto");

        $sentencia->bindParam(':id_producto', $txtid_producto);
        $sentencia->execute();
        $producto = $sentencia->fetch(PDO::FETCH_LAZY);



        $txtid_vendedor = $producto['id_vendedor'];
        $txtnombre = $producto['nombre'];
        $txtdescripcion = $producto['descripcion'];
        $txtstock = $producto['stock'];
        $txtprecio = $producto['precio'];
        $txttalla = $producto['talla'];
        $txtfoto = $producto['foto'];
        $slccategoria = $producto['slccategoria'];
        $slcestado = $producto['slcestado'];
        







        break;
}
//ejecutamos sentencia sql y con fetchAll la convertimos en un array y se pueda mostrar con 
//$listaproductos
$sentencia = $pdo->prepare("SELECT * FROM `producto` WHERE 1");
$sentencia->execute();
$listaproducto = $sentencia->fetchAll(PDO::FETCH_ASSOC);
