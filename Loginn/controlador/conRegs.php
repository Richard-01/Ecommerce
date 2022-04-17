<?php

include 'assets/conexion/conexionLg.php';

error_reporting(0);

session_start();

if (isset($_SESSION['usuario'])) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$usuario = $_POST['usuario'];
	$correo = $_POST['correo'];
	$contraseña = md5($_POST['contraseña']);
	$cnfcontraseña = md5($_POST['cnfcontraseña']);

	if ($contraseña == $cnfcontraseña) {

		$sql = "SELECT * FROM administrador WHERE correo='$correo'";
		$result = mysqli_query($conn, $sql);

		$mysqli = "SELECT * FROM administrador WHERE usuario='$usuario'";
		$result1 = mysqli_query($conn, $mysqli);

		if (!$result->num_rows > 0) {
			if (!$result1->num_rows > 0) {
				$sql = "INSERT INTO administrador (foto, usuario, fecha, estado, correo, contraseña)
					VALUES ('default.jpg', '$usuario', NOW(), 'inactivo', '$correo', '$contraseña')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('Usuario registrado exitosamente.')</script>";
					$usuario = "";
					$correo = "";
					$_POST['contraseña'] = "";
					$_POST['cnfcontraseña'] = "";
				} else {
					echo "<script>alert('Algo salio mal, intentalo de nuevo.')</script>";
				}
			} else {
				echo "<script>alert('Este usuario ya esta en uso.')</script>";
			}
		} else {
			echo "<script>alert('Este correo ya esta en uso.')</script>";
		}
	} else {
		echo "<script>alert('Las contraseñas no coinciden.')</script>";
	}
}
