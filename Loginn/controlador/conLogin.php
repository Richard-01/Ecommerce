<?php

include 'assets/conexion/conexionLg.php'; 

session_start();

error_reporting(0);

if (isset($_SESSION['usuario'])) {
    header("Location: ../admin_tienda/panel.php");
}

if (isset($_POST['submit'])) {
	$correo = $_POST['correo'];
	$contraseña = md5($_POST['contraseña']);

	$sql = "SELECT * FROM administrador WHERE correo='$correo' AND contraseña='$contraseña'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['usuario'] = $row['usuario'];
		$_SESSION['id_usuario'] = $row['id_usuario'];
		header("Location: ../admin_tienda/panel.php");
	} else {
		echo "<script>alert('El correo o contraseña son incorrectos.')</script>";
	}
} 

?>