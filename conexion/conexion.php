<?php 
$servidor="mysql:dbname=ecommerce;host=127.0.0.1";
$usuario="root";
$password="";

try{

    $pdo = new PDO($servidor,$usuario,$password);
    //echo "conectado";

}catch(PDOException $e){

        echo "conexion mala:(" .$e->getMessage();

}



?>