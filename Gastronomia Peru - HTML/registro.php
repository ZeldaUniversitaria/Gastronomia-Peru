<?php
session_start();
include "conexion.php";

$mensaje = "";
$error = "";

$carreras = $conexion->query("SELECT carrera_id, nombre FROM carrera_gastronomia ORDER BY nombre");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $contrasena = $_POST['password'] ?? '';
    $carrera_id = $_POST['carrera_id'] ?? '';

    if ($nombre === '' || $email === '' || $contrasena === '' || $carrera_id === '') {
        $error = "Por favor completa todos los campos.";
    } else {
        $stmt = $conexion->prepare("SELECT usuario_id FROM usuario_gastronomia WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $error = "Este correo ya está registrado.";
        } else {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $fecha = date('Y-m-d');

            $stmtInsert = $conexion->prepare(
                "INSERT INTO usuario_gastronomia (carrera_id, nombre, email, contrasena, fecha_registro)
                 VALUES (?, ?, ?, ?, ?)"
            );
            $stmtInsert->bind_param("issss", $carrera_id, $nombre, $email, $hash, $fecha);

            if ($stmtInsert->execute()) {
                header("Location: login.php?registro=1");
    			exit;
            } else {
                $error = "Error al registrar: " . $conexion->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro – Gastronomía a la Perú</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Outfit:wght@100..900&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilo.css">

        
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CWHMEZ96NJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CWHMEZ96NJ');
</script>
</head>
<body class="auth-main">

    <div class="auth-layout">

        <div class="auth-copy">
            <img src="img/Titulo_gastronomia_blanco.png" class="auth-logo" alt="Logo Gastronomía a la Perú">

            <h1 class="auth-title auth-title-register">
                Regístrate y conoce nuestros manjares
            </h1>

            <p class="auth-subtitle">
                Al registrarte no solo podrás seguir deleitándote con nuestros platillos,
                sino también compartir tu opinión y descubrir más sobre la gastronomía peruana.
            </p>
        </div>

        <div class="auth-panel">
            <div class="auth-card">

                <h2>Registro</h2>

                <form action="registro.php" method="POST">

                    <label>Nombre</label>
                    <input type="text" name="nombre" required>

                    <label>Email</label>
                    <input type="email" name="email" required>

                    <label>Contraseña</label>
                    <input type="password" name="password" required>

                    <label>Carrera</label>
                    <select name="carrera_id" required>
                        <option value="">--Selecciona tu carrera--</option>
                        <?php
                        $carreras = $conexion->query("SELECT * FROM carrera_gastronomia ORDER BY nombre");
                        while ($fila = $carreras->fetch_assoc()) {
                            echo "<option value='{$fila['carrera_id']}'>{$fila['nombre']}</option>";
                        }
                        ?>
                    </select><br><br>

                    <button type="submit" class="auth-submit">Crear cuenta</button>
                </form>

                <p class="auth-switch">
                    ¿Ya tienes cuenta?
                    <a href="login.php">Iniciar sesión</a>
                </p>

            </div>
        </div>
    </div>
<a href="index.php" class="floating-home-btn" title="Volver al inicio">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 .5L1 7h2v7h4V9h2v5h4V7h2L8 .5z"/>
    </svg>
</a>
</body>


</html>
