<?php
session_start();
include "conexion.php";

$nombre  = $_POST['nombre'];
$email   = $_POST['email'];
$asunto  = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$usuario_id = isset($_SESSION['usuario_id']) ? $_SESSION['usuario_id'] : null;

$stmt = $conexion->prepare("
INSERT INTO contacto_gastronomia (usuario_id, nombre, email, asunto, mensaje)
VALUES (?, ?, ?, ?, ?)
");

$stmt->bind_param("issss", $usuario_id, $nombre, $email, $asunto, $mensaje);

if ($stmt->execute()) {
    echo "<script>alert('Mensaje enviado con éxito. ¡Gracias por contactarnos!'); 
    window.location='contacto.php';</script>";
} else {
    echo "<script>alert('Error al enviar el mensaje.'); window.location='contacto.php';</script>";
}
