<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $sql = "SELECT * FROM usuario_gastronomia WHERE email = '$email'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $_SESSION['usuario_id'] = $usuario['usuario_id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        header("Location: index.php");
    } else {
        $error = " Correo no encontrado. Regístrate si aún no tienes cuenta.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>

<h2>Iniciar sesión</h2>
<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <button type="submit">Entrar</button>
</form>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>

</body>
</html>
