<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacto";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conexion->connect_error) {
    die("No se ha podido conectar a la Base de Datos: " . $conexion->connect_error);
}
?>
