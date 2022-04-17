<?php
require 'controlador/conLogin.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="contenedor">
        <form action="" method="POST" class="login-correo">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Iniciar Sesión</p>
            <div class="input-group">
                <input type="email" placeholder="Correo" name="correo" value="<?php echo $correo; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Contraseña" name="contraseña" value="<?php echo $_POST['contraseña']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Iniciar Sesión</button>
            </div>
            <p class="register-text">¿No tienes una cuenta? <a href="registrarse.php">Registrate aquí</a></p>
            <p class="volver"><a href="../index.php">volver</a></p>
        </form>
    </div>
</body>

</html>