<?php
session_start();
if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    // Destruir la sesión
    session_unset();
    session_destroy();
    echo 'success';
} else {
    echo 'error';
}
?>
