<?php
// Parámetros de conexión
$host = "mysql";
$usuario = "root";
$contraseña = "pass";
$base_de_datos = "perritos";

// Crear la conexión
$conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

// Verificar la conexión
if (!$conexion) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Preparar la consulta SQL con marcadores de posición
$stmt = mysqli_prepare($conexion, "INSERT INTO casitas (direccion, email, longitud, latitud) VALUES (?, ?, ?, ?)");

// Vincular los parámetros
mysqli_stmt_bind_param($stmt, "ssss", $_POST['name'], $_POST['email'],$_POST['longitud'],$_POST['latitud']);

// Asignar valores a los parámetros
/* $nombre = "Juan Pérez";
$email = "juan.perez@example.com"; */

// Ejecutar la consulta
if (mysqli_stmt_execute($stmt)) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

// Cerrar la sentencia y la conexión
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>