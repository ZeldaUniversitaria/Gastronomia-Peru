<?php
session_start();
include "conexion.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$nombre = $_SESSION['nombre'];

// Cargar comentarios
$sql = "SELECT c.contenido, c.fecha_comentario, u.nombre 
        FROM comentario_gastronomia c 
        JOIN usuario_gastronomia u ON c.usuario_id = u.usuario_id 
        ORDER BY c.fecha_comentario DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Publicación de prueba</title>
</head>
<body>

<h2>Bienvenido, <?php echo htmlspecialchars($nombre); ?> 👋</h2>
<a href="logout.php">Cerrar sesión</a>
<hr>

<h3>🍲 Publicación de prueba</h3>
<p><strong>Título:</strong> El secreto del ceviche peruano</p>
<p><em>El ceviche es uno de los platos más representativos del Perú, preparado con pescado fresco, jugo de limón, ají y cebolla morada...</em></p>

<hr>

<h4>Deja un comentario:</h4>
<form action="comentar.php" method="POST">
    <textarea name="contenido" rows="3" cols="50" placeholder="Escribe tu comentario..." required></textarea><br>
    <button type="submit">Enviar</button>
</form>

<hr>

<h4>Comentarios recientes:</h4>
<?php
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($fila['nombre']) . "</strong> (" . $fila['fecha_comentario'] . ")<br>" .
             htmlspecialchars($fila['contenido']) . "</p><hr>";
    }
} else {
    echo "<p>Aún no hay comentarios.</p>";
}
?>

</body>
</html>
