<?php
$servername = "fdb1034.awardspace.net";
$username = "4667283_usuarios";
$password = "zelda2323";
$dbname = "4667283_usuarios";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>
