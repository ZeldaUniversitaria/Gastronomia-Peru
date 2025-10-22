<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $carrera_id = $_POST['carrera_id'];
    $fecha = date('Y-m-d');

    // Verificar si el email ya existe
    $verificar = $conexion->query("SELECT * FROM usuario_gastronomia WHERE email = '$email'");
    if ($verificar->num_rows > 0) {
        $mensaje = "Este correo ya está registrado.";
    } else {
        $sql = "INSERT INTO usuario_gastronomia (carrera_id, nombre, email, fecha_registro)
                VALUES ('$carrera_id', '$nombre', '$email', '$fecha')";
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Registro exitoso. Ya puedes iniciar sesión.";
        } else {
            $mensaje = "Error al registrar: " . $conexion->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro</title>
</head>
<body>

<h2>Registro de usuario</h2>
<form method="POST">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Carrera:</label><br>
    <select name="carrera_id" required>
        <option value="">--Selecciona tu carrera--</option>
        <?php
        $carreras = $conexion->query("SELECT * FROM carrera ORDER BY nombre");
        while ($fila = $carreras->fetch_assoc()) {
            echo "<option value='{$fila['carrera_id']}'>{$fila['nombre']}</option>";
        }
        ?>
    </select><br><br>

    <button type="submit">Registrarme</button>
</form>

<?php if (!empty($mensaje)) echo "<p>$mensaje</p>"; ?>

<p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>

</body>
</html>
