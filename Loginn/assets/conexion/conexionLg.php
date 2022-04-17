<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "Ecommerce";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('conexión fallida.')</script>");
}

?>