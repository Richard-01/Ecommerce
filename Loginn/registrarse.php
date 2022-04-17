<?php
require 'controlador/conRegs.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Registrarse</title>
</head>
<body>
    <div class="contenedor">
        <form action="" method="POST" class="login-correo">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrarse</p>
            <div class="input-group">
                <input type="text" placeholder="Usuario" name="usuario" value="<?php echo $usuario; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Correo" name="correo" value="<?php echo $correo; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Contraseña" name="contraseña" value="<?php echo $_POST['contraseña']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirmar Contraseña" name="cnfcontraseña" value="<?php echo $_POST['cnfcontraseña']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Registrarse</button>
            </div>
            <p class="register-text" style="text-align: center;">¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></p>
        </form>
    </div>
</body>

</html>