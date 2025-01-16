<?php
session_start();

// Verificar si el usuario está autenticado como administrador
if (!isset($_SESSION['usuario_id'])) {
    if (isset($_POST['admin_user']) && isset($_POST['admin_password'])) {
        $admin_user = 'TheGalle';
        $admin_password = '1873';

        if ($_POST['admin_user'] === $admin_user && $_POST['admin_password'] === $admin_password) {
            $_SESSION['usuario_id'] = $admin_user;
            $_SESSION['rol'] = 'admin';
        } else {
            echo "Usuario o contraseña incorrectos.";
            exit();
        }
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Login de Administrador</title>
            <link rel="stylesheet" href="../css/ADMMIN.CSS">
        </head>
        <body>
        <div class="card">
        <h4 class="title">Login de Administrador</h4>
        <form action="admin_control.php" method="post"> 
            <div class="field">
                <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                    <path d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 277.2V256.3C495.1 107.1 361.2-9.332 207.8 20.73zM239.1 304.3c-26.47 0-48-21.56-48-48.05s21.53-48.05 48-48.05s48 21.56 48 48.05S266.5 304.3 239.1 304.3z"></path>
                </svg>
                <input autocomplete="off" id="admin_user" placeholder="Usuario" class="input-field" name="admin_user" type="text" required>
            </div>
            <div class="field">
                <svg class="input-icon" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg">
                    <path d="M80 192V144C80 64.47 144.5 0 224 0C303.5 0 368 64.47 368 144V192H384C419.3 192 448 220.7 448 256V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V256C0 220.7 28.65 192 64 192H80zM144 192H304V144C304 99.82 268.2 64 224 64C179.8 64 144 99.82 144 144V192z"></path>
                </svg>
                <input autocomplete="off" id="admin_password" placeholder="Contraseña" class="input-field" name="admin_password" type="password" required>
            </div>
            <button class="btn" type="submit">Iniciar Sesión</button>
        </form>
    </div>
        </body>
        </html>
        <?php
        exit();
    }
}

// Incluir archivos de conexión
include '../php/conexion.php';         // Conexión a la base de datos de usuarios (registro)
include '../php/conexioncompras.php';  // Conexión a la base de datos de ecomerce
include '../php/conexioncontact.php';  // Conexión a la base de datos de contacto

// Manejar operaciones de usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    switch ($_POST['action']) {

        case 'registrar_usuario':
            $nombre_completo = $_POST['Nom_Pri'];
            $email = $_POST['Email'];
            $telefono = $_POST['Telefono'];
            $direccion = $_POST['Direccion'];
            $ciudad = $_POST['Ciudad'];
            $fecha_nacimiento = $_POST['Fecha_de_nacimiento'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rol = $_POST['rol'];

            if (isset($conexionregistro)) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO registropw (Nombre, Email, telefono, direccion, ciudad, fecha_de_nacimiento, username, password, ROL) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conexionregistro->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("sssssssss", $nombre_completo, $email, $telefono, $direccion, $ciudad, $fecha_nacimiento, $username, $hashed_password, $rol);

                    if ($stmt->execute()) {
                        echo "Usuario registrado exitosamente.";
                    } else {
                        echo "Error al registrar usuario: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Error al preparar la consulta: " . $conexionregistro->error;
                }
            } else {
                echo "Conexión a la base de datos no establecida.";
            }
            break;

        case 'agregar_contacto':
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $contact_number = $_POST['contact_number'];
            $message = $_POST['message'];

            if (isset($conexion_contacto)) {
                $sql = "INSERT INTO datoscontactar (first_name, last_name, email, contact_number, message) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conexion_contacto->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("sssss", $first_name, $last_name, $email, $contact_number, $message);

                    if ($stmt->execute()) {
                        echo "Contacto agregado exitosamente.";
                    } else {
                        echo "Error al agregar contacto: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Error al preparar la consulta: " . $conexion_contacto->error;
                }
            } else {
                echo "Conexión a la base de datos no establecida.";
            }
            break;

        case 'registrar_compra':
            $producto = $_POST['producto'];
            $cantidad = $_POST['cantidad'];
            $precio = $_POST['precio'];
            $usuario = $_POST['usuario'];
            $total = $cantidad * $precio;

            if (isset($conexion_ecomerce)) {
                $sql = "INSERT INTO recibos (usuario, vehiculo, cantidad, precio, totalpagar) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conexion_ecomerce->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("sssss", $usuario, $producto, $cantidad, $precio, $total);

                    if ($stmt->execute()) {
                        echo "Compra registrada exitosamente.";
                    } else {
                        echo "Error al registrar la compra: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Error al preparar la consulta: " . $conexion_ecomerce->error;
                }
            } else {
                echo "Conexión a la base de datos no establecida.";
            }
            break;

            case 'modificar_usuario':
                $username_actual = $_POST['username_actual']; // Nombre de usuario actual para buscar el registro
                $nombre_completo = $_POST['Nom_Pri'];
                $email = $_POST['Email'];
                $telefono = $_POST['Telefono'];
                $direccion = $_POST['Direccion'];
                $ciudad = $_POST['Ciudad'];
                $fecha_nacimiento = $_POST['Fecha_de_nacimiento'];
                $username_nuevo = $_POST['username']; // Nuevo nombre de usuario
                $rol = $_POST['rol'];
            
                if (isset($conexionregistro)) {
                    $sql = "UPDATE registropw SET Nombre=?, Email=?, telefono=?, direccion=?, ciudad=?, fecha_de_nacimiento=?, username=?, ROL=? WHERE username=?";
                    $stmt = $conexionregistro->prepare($sql);
            
                    if ($stmt) {
                        $stmt->bind_param("sssssssss", $nombre_completo, $email, $telefono, $direccion, $ciudad, $fecha_nacimiento, $username_nuevo, $rol, $username_actual);
            
                        if ($stmt->execute()) {
                            echo "Usuario modificado exitosamente.";
                        } else {
                            echo "Error al modificar usuario: " . $stmt->error;
                        }
            
                        $stmt->close();
                    } else {
                        echo "Error al preparar la consulta: " . $conexionregistro->error;
                    }
                } else {
                    echo "Conexión a la base de datos no establecida.";
                }
                break;
            

            case 'eliminar_usuario':
                $username = $_POST['username'];
            
                if (isset($conexionregistro)) {
                    $sql = "DELETE FROM registropw WHERE username=?";
                    $stmt = $conexionregistro->prepare($sql);
            
                    if ($stmt) {
                        $stmt->bind_param("s", $username);
            
                        if ($stmt->execute()) {
                            echo "Usuario eliminado exitosamente.";
                        } else {
                            echo "Error al eliminar usuario: " . $stmt->error;
                        }
            
                        $stmt->close();
                    } else {
                        echo "Error al preparar la consulta: " . $conexionregistro->error;
                    }
                } else {
                    echo "Conexión a la base de datos no establecida.";
                }
                break;

                case 'modificar_contacto':
                    $first_name_actual = $_POST['first_name_actual']; // Nombre actual del contacto para buscar el registro
                    $last_name_actual = $_POST['last_name_actual']; // Apellido actual del contacto para buscar el registro
                    $first_name_nuevo = $_POST['first_name'];
                    $last_name_nuevo = $_POST['last_name'];
                    $email = $_POST['email'];
                    $contact_number = $_POST['contact_number'];
                    $message = $_POST['message'];
                
                    if (isset($conexion_contacto)) {
                        $sql = "UPDATE datoscontactar SET first_name=?, last_name=?, email=?, contact_number=?, message=? WHERE first_name=? AND last_name=?";
                        $stmt = $conexion_contacto->prepare($sql);
                
                        if ($stmt) {
                            $stmt->bind_param("sssssss", $first_name_nuevo, $last_name_nuevo, $email, $contact_number, $message, $first_name_actual, $last_name_actual);
                
                            if ($stmt->execute()) {
                                echo "Contacto modificado exitosamente.";
                            } else {
                                echo "Error al modificar contacto: " . $stmt->error;
                            }
                
                            $stmt->close();
                        } else {
                            echo "Error al preparar la consulta: " . $conexion_contacto->error;
                        }
                    } else {
                        echo "Conexión a la base de datos no establecida.";
                    }
                    break;

            case 'eliminar_contacto':
                $nombre_contacto = $_POST['nombre_contacto']; // Nombre del contacto a eliminar
            
                if (isset($conexion_contacto)) {
                    $sql = "DELETE FROM datoscontactar WHERE first_name=?"; // Supongamos que deseas eliminar por nombre (puedes ajustar esto según tu necesidad)
                    $stmt = $conexion_contacto->prepare($sql);
            
                    if ($stmt) {
                        $stmt->bind_param("s", $nombre_contacto); // "s" para string
            
                        if ($stmt->execute()) {
                            echo "Contacto eliminado exitosamente.";
                        } else {
                            echo "Error al eliminar contacto: " . $stmt->error;
                        }
            
                        $stmt->close();
                    } else {
                        echo "Error al preparar la consulta: " . $conexion_contacto->error;
                    }
                } else {
                    echo "Conexión a la base de datos no establecida.";
                }
                break;

            case 'eliminar_compra':
                $usuario = $_POST['usuario']; // Usuario que realizó la compra
            
                if (isset($conexion_ecomerce)) {
                    $sql = "DELETE FROM recibos WHERE usuario=?";
                    $stmt = $conexion_ecomerce->prepare($sql);
            
                    if ($stmt) {
                        $stmt->bind_param("s", $usuario); // "s" para string
            
                        if ($stmt->execute()) {
                            echo "Compra eliminada exitosamente.";
                        } else {
                            echo "Error al eliminar la compra: " . $stmt->error;
                        }
            
                        $stmt->close();
                    } else {
                        echo "Error al preparar la consulta: " . $conexion_ecomerce->error;
                    }
                } else {
                    echo "Conexión a la base de datos no establecida.";
                }
                break;
            
                case 'modificar_compra':
                    // Verificar que todas las claves existen en $_POST
                    if (isset($_POST['usuario']) && isset($_POST['vehiculo']) && isset($_POST['cantidad']) && isset($_POST['precio'])) {
                        $usuario = $_POST['usuario'];
                        $vehiculo = $_POST['vehiculo'];
                        $cantidad = $_POST['cantidad'];
                        $precio = $_POST['precio'];
                        $total = $cantidad * $precio;
        
                        if (isset($conexion_ecomerce)) {
                            $sql = "UPDATE recibos SET cantidad=?, precio=?, totalpagar=? WHERE usuario=? AND vehiculo=?";
                            $stmt = $conexion_ecomerce->prepare($sql);
        
                            if ($stmt) {
                                // Enlazar los parámetros con los tipos correctos
                                $stmt->bind_param("ddsss", $cantidad, $precio, $total, $usuario, $vehiculo);
        
                                if ($stmt->execute()) {
                                    if ($stmt->affected_rows > 0) {
                                        echo "Compra modificada exitosamente.";
                                    } else {
                                        echo "No se encontró el registro para actualizar o no se realizó ninguna modificación.";
                                    }
                                } else {
                                    echo "Error al modificar la compra: " . $stmt->error;
                                }
        
                                $stmt->close();
                            } else {
                                echo "Error al preparar la consulta: " . $conexion_ecomerce->error;
                            }
                        } else {
                            echo "Conexión a la base de datos no establecida.";
                        }
                    } else {
                        echo "Faltan datos en la solicitud.";
                    }
                    break;

                    if (isset($conexionregistro)) {
                        $sql = "SELECT * FROM registropw";
                        $result = $conexionregistro->query($sql);
                    
                        if ($result === false) {
                            echo "Error en la consulta: " . $conexionregistro->error;
                        } elseif ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Dirección</th><th>Ciudad</th><th>Fecha de Nacimiento</th><th>Usuario</th><th>Rol</th></tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["telefono"] . "</td><td>" . $row["direccion"] . "</td><td>" . $row["ciudad"] . "</td><td>" . $row["fecha_de_nacimiento"] . "</td><td>" . $row["username"] . "</td><td>" . $row["ROL"] . "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "0 resultados";
                        }
                    } else {
                        echo "Conexión a la base de datos no establecida.";
                    }
                    
                    case 'visualizar_datos':
                        $tabla = $_POST['tabla'];
            
                        switch ($tabla) {
                            case 'usuarios':
                                // Verifica si la conexión está establecida
                                if (isset($conexionregistro)) {
                                    echo "Conexión exitosa a la base de datos Registro<br>";
                            
                                    // Consulta SQL para seleccionar todos los datos de la tabla
                                    $sql = "SELECT * FROM registropw";
                                    $result = $conexionregistro->query($sql);
                            
                                    // Manejo de errores en la consulta
                                    if ($result === false) {
                                        echo "Error en la consulta: " . $conexionregistro->error;
                                    } elseif ($result->num_rows > 0) {
                                        // Mostrar los datos en una tabla HTML
                                        echo "<table border='1' style='width:100%; border-collapse:collapse;'>";
                                        echo "<tr>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Teléfono</th>
                                                <th>Dirección</th>
                                                <th>Ciudad</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Usuario</th>
                                                <th>Rol</th>
                                              </tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                    <td>" . htmlspecialchars($row["Nombre"]) . "</td>
                                                    <td>" . htmlspecialchars($row["Email"]) . "</td>
                                                    <td>" . htmlspecialchars($row["Telefono"]) . "</td>
                                                    <td>" . htmlspecialchars($row["Direccion"]) . "</td>
                                                    <td>" . htmlspecialchars($row["Ciudad"]) . "</td>
                                                    <td>" . htmlspecialchars($row["Fecha_de_nacimiento"]). "</td>
                                                    <td>" . htmlspecialchars($row["username"]) . "</td>
                                                    <td>" . htmlspecialchars($row["rol"]) . "</td>
                                                  </tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "0 resultados";
                                    }
                                } else {
                                    echo "Conexión a la base de datos no establecida.";
                                }
                                break;
                                

                             case 'contactos':
                                if (isset($conexion_contacto)) {
                                    $sql = "SELECT * FROM datoscontactar";
                                    $result = $conexion_contacto->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Teléfono</th><th>Mensaje</th></tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["contact_number"] . "</td><td>" . $row["message"] . "</td></tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "0 resultados";
                                    }
                                } else {
                                    echo "Conexión a la base de datos no establecida.";
                                }
                                break;

                            case 'compras':
                                if (isset($conexion_ecomerce)) {
                                    $sql = "SELECT * FROM recibos";
                                    $result = $conexion_ecomerce->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo "<table>";
                                        echo "<tr><th>Usuario</th><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Total a Pagar</th></tr>";
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row["usuario"] . "</td><td>" . $row["vehiculo"] . "</td><td>" . $row["cantidad"] . "</td><td>" . $row["precio"] . "</td><td>" . $row["totalpagar"] . "</td></tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "0 resultados";
                                    }
                                } else {
                                    echo "Conexión a la base de datos no establecida.";
                                }
                                break;

                            default:
                                echo "Tabla no válida.";
                                break;
            }
    }
}

// Cerrar conexiones
if (isset($conexionregistro)) {
    $conexionregistro->close();
}
if (isset($conexion_ecomerce)) {
    $conexion_ecomerce->close();
}
if (isset($conexion_contacto)) {
    $conexion_contacto->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="../css/ADMMIN.CSS">
</head>
<body>
    <h1>Área de Administrador</h1>

    <div class="form-container">
        <h2>Registrar Usuario</h2>
        <form action="admin_control.php" method="post">
            <input type="hidden" name="action" value="registrar_usuario">
            
            <div class="columna">
                <div class="Nom_Pri">
                    <label for="Nom_Pri">Nombre Completo:</label>
                    <input type="text" id="Nom_Pri" name="Nom_Pri" class="input" required>
                </div>
                
                <div class="Email">
                    <label for="Email">Email:</label>
                    <input type="email" id="Email" name="Email" class="input" required>
                </div>
            </div>
            
            <div class="columna">
                <div class="Telefono">
                    <label for="Telefono">Teléfono:</label>
                    <input type="number" id="Telefono" name="Telefono" class="input" required>
                </div>
                <div class="Direccion">
                    <label for="Direccion">Dirección:</label>
                    <input type="text" id="Direccion" name="Direccion" class="input" required>
                </div>
                <div class="Ciudad">
                    <label for="Ciudad">Ciudad:</label>
                    <input type="text" id="Ciudad" name="Ciudad" class="input" required>
                </div>
                <div class="Fecha_de_nacimiento">
                    <label for="Fecha_de_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="Fecha_de_nacimiento" name="Fecha_de_nacimiento" class="input" required>
                </div>
            </div>
            
            <div class="columna">
                <div class="Username">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="input" required>
                </div>
                <div class="Password">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="input" required>
                </div>
                <div class="Rol">
                    <label for="rol">Rol:</label>
                    <select id="rol" name="rol" class="input" required>
                        <option value="usuario">Usuario</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            
            <input type="submit" value="Registrar Usuario" class="btn">
        </form>
    </div>

    <div class="form-container">
    <h2>Modificar Usuario</h2>
    <form action="admin_control.php" method="post">
        <input type="hidden" name="action" value="modificar_usuario">

        <label for="username_actual">Nombre de Usuario Actual:</label>
        <input type="text" id="username_actual" name="username_actual" class="input" required>

        <label for="Nom_Pri">Nombre Completo:</label>
        <input type="text" id="Nom_Pri" name="Nom_Pri" class="input" required>

        <label for="Email">Email:</label>
        <input type="email" id="Email" name="Email" class="input" required>

        <label for="Telefono">Teléfono:</label>
        <input type="number" id="Telefono" name="Telefono" class="input" required>

        <label for="Direccion">Dirección:</label>
        <input type="text" id="Direccion" name="Direccion" class="input" required>

        <label for="Ciudad">Ciudad:</label>
        <input type="text" id="Ciudad" name="Ciudad" class="input" required>

        <label for="Fecha_de_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="Fecha_de_nacimiento" name="Fecha_de_nacimiento" class="input" required>

        <label for="username">Nuevo Nombre de Usuario:</label>
        <input type="text" id="username" name="username" class="input" required>

        <label for="rol">Rol:</label>
        <select id="rol" name="rol" class="input">
            <option value="usuario">Usuario</option>
            <option value="admin">Administrador</option>
        </select>

        <input type="submit" value="Modificar Usuario" class="btn">
    </form>
</div>

    <div class="form-container">
    <h2>Eliminar Usuario</h2>
    <form action="admin_control.php" method="post">
        <input type="hidden" name="action" value="eliminar_usuario">

        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" class="input" required>

        <input type="submit" value="Eliminar Usuario" class="btn">
    </form>
</div>

    <div class="form-container">
        <h2>Agregar Contacto</h2>
        <form action="admin_control.php" method="post">
            <input type="hidden" name="action" value="agregar_contacto">
            <label for="first_name">Nombre:</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last_name">Apellido:</label>
            <input type="text" id="last_name" name="last_name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="contact_number">Número de Contacto:</label>
            <input type="text" id="contact_number" name="contact_number" required>
            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" required></textarea>
            <br>
            <input type="submit" value="Agregar Contacto" class="btn">
        </form>
    </div>

    <div class="form-container">
    <h2>Modificar Contacto</h2>
    <form action="admin_control.php" method="post">
        <input type="hidden" name="action" value="modificar_contacto">

        <label for="first_name_actual">Nombre Actual:</label>
        <input type="text" id="first_name_actual" name="first_name_actual" class="input" required>

        <label for="last_name_actual">Apellido Actual:</label>
        <input type="text" id="last_name_actual" name="last_name_actual" class="input" required>

        <label for="first_name">Nuevo Nombre:</label>
        <input type="text" id="first_name" name="first_name" class="input" required>

        <label for="last_name">Nuevo Apellido:</label>
        <input type="text" id="last_name" name="last_name" class="input" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="input" required>

        <label for="contact_number">Número de Contacto:</label>
        <input type="tel" id="contact_number" name="contact_number" class="input" required>

        <label for="message">Mensaje:</label>
        <textarea id="message" name="message" class="input01" rows="3" required></textarea>

        <input type="submit" value="Modificar Contacto" class="btn">
    </form>
</div>

    <div class="form-container">
    <h2>Eliminar Contacto</h2>
    <form action="admin_control.php" method="post">
        <input type="hidden" name="action" value="eliminar_contacto">

        <label for="nombre_contacto">Nombre del Contacto:</label>
        <input type="text" id="nombre_contacto" name="nombre_contacto" class="input" required>

        <input type="submit" value="Eliminar Contacto" class="btn">
    </form>
</div>


    <div class="form-container">
        <h2>Registrar Compra</h2>
        <form action="admin_control.php" method="post">
            <input type="hidden" name="action" value="registrar_compra">
            <label for="producto">Producto:</label>
            <input type="text" id="producto" name="producto" required>
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <BR></BR>
            <input type="submit" value="Registrar Compra" class="btn">
        </form>
    </div>

    <div class="form-container">
    <h2>Modificar Compra</h2>
    <form method="post" action="admin_control.php">
        <input type="hidden" name="action" value="modificar_compra">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="vehiculo">Vehículo:</label>
        <input type="text" id="vehiculo" name="vehiculo" required>
        <br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        <br>
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" required>
        <br>
        <input type="submit" value="Actualizar Compra" class="btn">
    </form>
</div>


    <div class="form-container">
    <h2>Eliminar Compra</h2>
    <form action="admin_control.php" method="post">
        <input type="hidden" name="action" value="eliminar_compra">

        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" class="input" required>

        <input type="submit" value="Eliminar Compra" class="btn">
    </form>
</div>

    <div class="form-container">
        <h2>Visualizar Datos</h2>
        <form action="admin_control.php" method="post">
            <input type="hidden" name="action" value="visualizar_datos">
            <label for="tabla">Tabla a visualizar:</label>
            <select id="tabla" name="tabla" required>
                <option value="usuarios">Usuarios</option>
                <option value="contactos">Contactos</option>
                <option value="compras">Compras</option>
            </select>
            <input type="submit" value="Visualizar Datos">
        </form>
    </div>
    <button class="button" id="logout">
  <span>cerrar sesión
</span>
<span>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-miterlimit="2" stroke-linejoin="round" fill-rule="evenodd" clip-rule="evenodd"><path fill-rule="nonzero" d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm0 7.425 2.717-2.718c.146-.146.339-.219.531-.219.404 0 .75.325.75.75 0 .193-.073.384-.219.531l-2.717 2.717 2.727 2.728c.147.147.22.339.22.531 0 .427-.349.75-.75.75-.192 0-.384-.073-.53-.219l-2.729-2.728-2.728 2.728c-.146.146-.338.219-.53.219-.401 0-.751-.323-.751-.75 0-.192.073-.384.22-.531l2.728-2.728-2.722-2.722c-.146-.147-.219-.338-.219-.531 0-.425.346-.749.75-.749.192 0 .385.073.531.219z"></path></svg>
</span>
</button>
<script src="../js/boton.js"></script>
</body>
</html>