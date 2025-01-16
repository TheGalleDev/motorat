<?php 

session_start();

include '../php/conexionregcom.php';

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Validar que se proporcionen datos
if(empty($username) || empty($password)) {
    echo '<script>alert("Por favor, introduzca su nombre de usuario y contraseña."); window.location = "../php/login.php";</script>';
    exit();
}

$escaped_username = mysqli_real_escape_string($conexion, $username);
$validar_login = mysqli_query($conexion, "SELECT * FROM registropw WHERE (username='$escaped_username' OR Email='$escaped_username')");

// Encontrar coincidencias
if(mysqli_num_rows($validar_login) > 0 ){
    // Si el usuario existe, verificar la contraseña
    $usuario = mysqli_fetch_assoc($validar_login);
    if ($password == $usuario['password']) {
        // Si la contraseña es correcta, guardar el nombre de usuario en la sesión y redirigir al usuario
        $_SESSION['usuario'] = $usuario['username']; // Guardar el nombre de usuario en la sesión
        header("location:../index.php");
        exit();
    } else {
        // Si la contraseña es incorrecta, mostrar un mensaje de error y redirigir al usuario al formulario de inicio de sesión
        echo '<script>alert("El nombre de usuario o la contraseña son incorrectos. Verifique los datos introducidos."); window.location = "../php/login.php";</script>';
        exit();
    }
} else {
    // Si no hay coincidencias, mostrar un mensaje de error y redirigir al usuario al formulario de inicio de sesión
    echo '<script>alert("El nombre de usuario no existe o la contraseña es incorrecta. Verifique los datos introducidos."); window.location = "../php/login.php";</script>';
    exit();
}

?>
