<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    // Redirigir al usuario al formulario de inicio de sesión si no ha iniciado sesión
    header("Location:../php/login.php");
    exit();
}

// Función para generar el recibo de compra y almacenar en la base de datos
function generarRecibo($car, $cantidad) {
    $precio = 0;

    // Obtener el precio del vehículo seleccionado
    switch ($car) {
        case "bmw_s1000r":
            $precio = 350000000;
            break;
        case "honda_500cf":
            $precio = 150000000;
            break;
        case "ducati_v4":
            $precio = 200000000;
            break;
        case "suzuki_huyabusa":
            $precio = 450000000;
            break;
        case "dominar_400":
            $precio = 150000;
            break;
        case "mv_agusta":
            $precio = 450000000;
            break;
        case "husqvarna_701":
            $precio = 100000000;
            break;
        case "yamaha_fz250":
            $precio = 25000000;
            break;
        case "kawasaki_z1000":
            $precio = 350000000;
            break;
        case "kawasaki_h2r":
            $precio = 450000000;
            break;
        case "bmw_r1250r":
            $precio = 150000000;
            break;
        case "bmw_f900":
            $precio = 250000000;
            break;
        case "yamaha_mt09":
            $precio = 150000000;
            break;
        case "ducati_multistrada_v4":
            $precio = 250000000;
            break;
        case "ktm_super_duke_1390":
            $precio = 350000000;
            break;
        case "BMW S1000":
            $precio = 200000000;             
            break;
        default:
            $precio = 0;
    }

    // Obtener datos del usuario de la sesión
    $nombreUsuario = $_SESSION['usuario'];

    // Calcular el total a pagar
    $totalpagar = $precio * $cantidad; // Precio del vehículo multiplicado por la cantidad
    $fechaCompra = date("Y-m-d H:i:s"); // Obtener la fecha y hora actual

    // Conectar a la base de datos
    $servername = "localhost"; // o el nombre de tu servidor
    $username = "root"; // tu usuario de la base de datos
    $password = ""; // tu contraseña de la base de datos
    $dbname = "ecomerce"; // tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar datos de la compra en la base de datos
    $sql = "INSERT INTO recibos (usuario, vehiculo, precio, cantidad, totalpagar, fechaCompra) VALUES ('$nombreUsuario', '$car', $precio, $cantidad, $totalpagar, '$fechaCompra')";

    if ($conn->query($sql) === TRUE) {
        // Generar el recibo de compra
        $recibo = "Usuario: $nombreUsuario\n";
        $recibo .= "Vehículo: $car\n";
        $recibo .= "Precio unitario: $precio\n";
        $recibo .= "Cantidad: $cantidad\n";
        $recibo .= "Total a pagar: $totalpagar\n";
        $recibo .= "Fecha de compra: $fechaCompra\n";
    } else {
        $recibo = "Error al guardar la compra: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();

    return $recibo;
}

// Procesar el formulario si se reciben datos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['car']) && isset($_POST['cantidad'])) {
    // Obtener el vehículo seleccionado y la cantidad
    $car = $_POST['car'];
    $cantidad = intval($_POST['cantidad']); // Asegúrate de que la cantidad es un número entero

    // Generar el recibo de compra
    $recibo = generarRecibo($car, $cantidad);

    // Mostrar el recibo de compra
    echo "<h2>Recibo de Compra</h2>";
    echo "<p>" . nl2br($recibo) . "</p>";
    exit(); // Terminar la ejecución del script después de mostrar el recibo
}
?>

