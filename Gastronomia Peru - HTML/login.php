<?php
session_start();
include "conexion.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $contrasena = $_POST['password'] ?? '';


    if ($email === '' || $contrasena === '') {
        $error = "Por favor ingresa tu email y contraseña.";
    } else {
        $stmt = $conexion->prepare(
            "SELECT usuario_id, nombre, contrasena FROM usuario_gastronomia WHERE email = ?"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            if ($usuario['contrasena'] && password_verify($contrasena, $usuario['contrasena'])) {
                $_SESSION['usuario_id'] = $usuario['usuario_id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['email'] = $email;

                header("Location: index.php");
                exit;
            } else {
                $error = "Correo o contraseña incorrectos.";
            }
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión – Gastronomía a la Perú</title>
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
<body>



<main class="auth-main">
    <div class="auth-layout">
        <section class="auth-copy">
            <img src="img/Titulo_gastronomia_blanco.png"
                 alt="Gastronomía a la Perú" class="auth-logo">

            <h1 class="auth-title">Descubre nuestros platillos</h1>

            <p class="auth-subtitle">
                Bienvenido a <strong>Gastronomía a la Perú</strong>, ingresa para saber más sobre
                nuestro restaurante y la gastronomía peruana.
            </p>
        </section>

        <section class="auth-panel">
            <div class="auth-card">
                <h2>Iniciar sesión</h2>

                <?php if (!empty($error)): ?>
                    <div class="auth-error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>

                <form action="login.php" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required>

                    <button type="submit" class="auth-submit">Iniciar</button>
                </form>

                <p class="auth-switch">
                    ¿No tienes cuenta?
                    <a href="registro.php">Registrarme</a>
                </p>
            </div>
        </section>
    </div>
</main>

<a href="index.php" class="floating-home-btn" title="Volver al inicio">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 .5L1 7h2v7h4V9h2v5h4V7h2L8 .5z"/>
    </svg>
</a>

</body>
</html>
