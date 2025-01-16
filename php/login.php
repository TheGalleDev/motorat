<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
    <div class="formulario">
        <h1>Inicio de sesión</h1>
        <form method="post" action="../php/inicio_sesion.php">
            <div class="username">
                <label for="username">Nombre de usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="password">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="forgot-password">
                <a href="#">¿Olvidó contraseña?</a>
            </div>
            <div class="submit_iniciar">
                <input type="submit" value="Iniciar">
            </div>
        </form>
    </div>
</body>
</html>
