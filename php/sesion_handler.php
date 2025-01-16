<?php 
session_start();

// Cerrar sesión si se hace clic en el enlace "Cerrar sesión"
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location:../index.html");
    exit();
}

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    $usuario = null;
}
?>
