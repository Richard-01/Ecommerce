<?php
//permite trabajar con variable de session

use function PHPSTORM_META\elementType;

session_start();

$mostrarModal = false;

$cantidadprodd = 1;

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
$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto']["name"] : "";
//identifica con accion que boton fue oprimido
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

//inicializar variable para modal

$accionCancelar = "disabled";
$mostrarModal = false;
$new_cart = [];



//conexion bd
include("admin_tienda/conexion/conexion.php");
include("conexion/configcart.php");
include("conexion/conexioncarrito.php");


$mensaje = "";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case "Agregar":
            //is_numeric evalua, openssl desencripta
            if (is_numeric(openssl_decrypt($_POST['id_producto'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id_producto'], COD, KEY);
                $mensaje .= "ok ID correcto" . $ID;
            } else {
                $mensaje .= "aochss ID incorrecto" . $ID;
            }

            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje .= "ok ID nombre" . $NOMBRE;
            } else {
                $mensaje .= "aochss algo sucedio con el nombre";
                break;
            }

            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje .= "ok ID nombre" . $PRECIO;
            } else {
                $mensaje .= "aochss algo sucedio con el precio";
                break;
            }

            if ($_POST['cantidad']) {
                $CANTIDAD = $_POST['cantidad'];
                $mensaje .= "ok ID CANTIDAD" . $CANTIDAD;
            } else {
                $mensaje .= "aochss algo sucedio con la cantidad";
                break;
            }

            if ($_POST['foto']) {
                $FOTO = $_POST['foto'];
                $mensaje .= "ok ID foto" . $FOTO;
            } else {
                $mensaje .= "aochss algo sucedio con la foto";
                break;
            }
            


            //comprobamos que tengamos variables de sesion
            if (!isset($_SESSION['CARRITO'])) {


                //almacenamos toda la informacion del carrito
                $producto = array(
                    'id_producto' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                    'FOTO' => $FOTO
                

                );
                ($_SESSION['CARRITO'][0] = $producto);
                //$_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado al carrito";
            } else {


                //no se explicar que hice pero lo logre :')

                //$id = openssl_decrypt($_POST['id_producto'], COD, KEY);

                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['id_producto'] == $ID) {
                        //$_SESSION['CARRITO'][$indice]['CANTIDAD'] = $_SESSION['CARRITO'][$indice]['CANTIDAD'];
                    }
                }
                //no se explicar que hice pero lo logre :')

                $idProductos = array_column($_SESSION['CARRITO'], "id_producto");
                if (in_array($ID, $idProductos)) {
                    $index = array_search($ID, $idProductos);
                    $_SESSION['CARRITO'][$index]['CANTIDAD'] += $CANTIDAD;
                } else {

                    //contabiliza utilizando count el carrito de compras
                    $NumeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'id_producto' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'PRECIO' => $PRECIO,
                        'CANTIDAD' => $CANTIDAD,
                        'FOTO' => $FOTO

                    );
                    array_push($_SESSION['CARRITO'], $producto);
                    //$_SESSION['CARRITO'][$NumeroProductos] = $producto;
                    $mensaje = "Producto agregado al carrito";
                }
            }
            //$mensaje = print_r($_SESSION, true);
            


            break;
        case "Eliminar":

            if (is_numeric(openssl_decrypt($_POST['id_producto'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id_producto'], COD, KEY);
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['id_producto'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                    } else {

                        if (!isset($new_cart)) {                            
                            ($new_cart[0] = $_SESSION['CARRITO'][$indice]);
                        } else {
                            array_push($new_cart, $_SESSION['CARRITO'][$indice]);
                        }
                    }
                }
                unset($_SESSION['CARRITO']);
                $_SESSION['CARRITO']=$new_cart;
                unset($new_cart);
            }
            break;

        case "mostrar":
            $mostrarModal = true;
            if (is_numeric(openssl_decrypt($_POST['id_producto'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id_producto'], COD, KEY);
            }

            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
            }

            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
            }

            if ($_POST['cantidad']) {
                $CANTIDAD = $_POST['cantidad'];
            }
            if ($_POST['foto']) {
                $FOTO = $_POST['foto'];
            }




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
}





 
switch ($accion) {


    case "btnCancelar":

        header('location: compras_hombre.php');

        break;


    case "Seleccionar":


        $accionCancelar = "";
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

        break;
}
//ejecutamos sentencia sql y con fetchAll la convertimos en un array y se pueda mostrar con 
//$listaproductos
$sentencia = $pdo->prepare("SELECT * FROM `producto` WHERE 1");
$sentencia->execute();
$listaproducto = $sentencia->fetchAll(PDO::FETCH_ASSOC); 
