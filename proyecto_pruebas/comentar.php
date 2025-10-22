<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_SESSION['usuario_id'];
    $contenido = $_POST['contenido'];
    $fecha = date('Y-m-d');

    $sql = "INSERT INTO comentario_gastronomia (usuario_id, contenido, fecha_comentario)
            VALUES ('$usuario_id', '$contenido', '$fecha')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conexion->error;
    }
}
?>
