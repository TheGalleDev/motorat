<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="formulario">
        <h1>Registro</h1>
        <form method="POST" action="../php/registerdt.php">
            <div class="columna">
                <div class="Nom_Pri">
                    <label for="Nom_Pri">Nombre Completo:</label>
                    <input type="text" id="Nom_Pri" name="Nom_Pri" required>
                </div>
                
                <div class="Email">
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="Email" required>
                </div>
            </div>
            <div class="columna">
                <div class="Telefono">
                    <label for="Telefono">Telefono:</label>
                    <input type="number" id="Telefono" name="Telefono" required>
                </div>
                <div class="Direccion">
                    <label for="Direccion">Direccion:</label>
                    <input type="text" id="Direccion" name="Direccion" required>
                </div>
                <div class="Ciudad">
                    <label for="Ciudad">Ciudad:</label>
                    <input type="text" id="Ciudad" name="Ciudad" required>
                </div>
                <div class="Fecha_de_nacimiento">
                    <label for="Fecha_de_nacimiento">Fecha De Nacimiento:</label>
                    <input type="date" id="Fecha_de_nacimiento" name="Fecha_de_nacimiento" required>
                </div>
                <div class="username">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="password">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            </div>
            <div class="forgot-password">
                <a href="../php/login.php">Iniciar sesión</a>
            </div>
            <div class="submit">
                <input type="submit" name="submit" value="Registrarme">
            </div>
        </form>
    </div>
</body>
</html>
