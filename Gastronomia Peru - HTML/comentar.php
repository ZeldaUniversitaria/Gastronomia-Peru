<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $contenido = trim($_POST['contenido'] ?? '');
    $platillo  = trim($_POST['platillo'] ?? '');

    if ($contenido === '' || $platillo === '') {
        header("Location: comida.php");
        exit;
    }

    $fecha = date('Y-m-d H:i:s');
    $usuario_id = (int)$_SESSION['usuario_id'];

    $stmt = $conexion->prepare(
        "INSERT INTO comentario_gastronomia (usuario_id, contenido, platillo, fecha_comentario)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("isss", $usuario_id, $contenido, $platillo, $fecha);

    if ($stmt->execute()) {
        header("Location: comida.php");
        exit;
    } else {
        echo "Error al guardar comentario: " . $conexion->error;
    }
}
?>
