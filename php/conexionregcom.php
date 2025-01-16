
<?php
// Configuración de conexión
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'registro';

// Crear conexión
$conexion = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}
?>

