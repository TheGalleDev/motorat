<?php 
include '../php/conexionicontactcom.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los valores del formulario
    $first_name = mysqli_real_escape_string($conexion, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conexion, $_POST["last_name"]);
    $email = mysqli_real_escape_string($conexion, $_POST["email"]);
    $contact_number = mysqli_real_escape_string($conexion, $_POST["contact_number"]);
    $message = mysqli_real_escape_string($conexion, $_POST["message"]);

    // Preparar la consulta SQL con marcadores de posición
    $query = "INSERT INTO datoscontactar (first_name, last_name, email, contact_number, message) VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$message')";

    // Ejecutar la consulta utilizando la función mysqli_query()
    if(mysqli_query($conexion, $query)){
        echo '<script>alert("Mensaje enviado exitosamente"); window.location = "../index.php";</script>';
    } else {
        echo '<script>alert("Error al enviar el mensaje: ' . mysqli_error($conexion) . '"); window.location = "../php/contacto.php";</script>';
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>

