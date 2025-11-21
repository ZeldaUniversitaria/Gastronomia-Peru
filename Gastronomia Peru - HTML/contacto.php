<?php
session_start();
include "conexion.php";

$prefill_nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
$prefill_email  = isset($_SESSION['email']) ? $_SESSION['email'] : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto – Gastronomía a la Perú</title>
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

<header class="topbar">
    <div class="topbar-inner">
        <div class="brand">
            <img class="img_logo" src="img/Titulo_gastronomia.png" alt="loguito">
        </div>

        <nav class="main-nav">
            <a href="index.php" class="nav-link">Inicio</a>
            <a href="comida.php" class="nav-link">Platillos</a>
            <a href="Nosotros.php" class="nav-link">Nosotros</a>
            <a href="contacto.php" class="nav-link active">Contacto</a>
        </nav>

        <div class="topbar-actions">
            <?php if (isset($_SESSION['nombre'])): ?>
                <span class="user-greeting">Hola, <?= htmlspecialchars($_SESSION['nombre']); ?></span>
                <a href="logout.php" class="btn-login">Cerrar sesión</a>
            <?php else: ?>
                <a href="login.php" class="btn-login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</header>


<main class="contact-main">

    <section class="contact-hero">
        <h1>Contáctanos</h1>
        <p>Estamos aquí para ayudarte. Envíanos un mensaje y te responderemos cuanto antes.</p>
    </section>

    <div class="contact-container">

        <div class="contact-info-grid">

            <div class="contact-info-card">
                <img src="img/llamar.png" class="contact-icon" alt="Teléfono">
                <h3>Teléfono</h3>
                <p>656-876-7452</p>
            </div>

            <div class="contact-info-card">
                <img src="img/whatsapp.png" class="contact-icon" alt="Whatsapp">
                <h3>Whatsapp</h3>
                <p>656-234-345</p>
            </div>

            <div class="contact-info-card">
                <img src="img/correo-electronico.png" class="contact-icon" alt="Email">
                <h3>Email</h3>
                <p>soporte@gastronomia.com</p>
            </div>

            <div class="contact-info-card">
                <img src="img/asistente-de-ventas.png" class="contact-icon" alt="Nuestro local">
                <h3>Nuestro local</h3>
                <p>Av. Perú 2443, Ciudad Juárez</p>
            </div>

        </div>


        <div class="contact-form-wrapper">
            <h2>Envíanos un mensaje</h2>

                <form action="procesar_contacto.php" method="POST" class="contact-form">

                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($prefill_nombre); ?>" required>

                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($prefill_email); ?>" required>

                    <label>Asunto</label>
                    <input type="text" name="asunto" required>

                    <label>Mensaje</label>
                    <textarea name="mensaje" required></textarea>

                    <?php if (isset($_SESSION['usuario_id'])): ?>

                        <button type="submit" class="contact-submit">
                            Enviar mensaje
                        </button>

                    <?php else: ?>

                        <button type="button" class="contact-submit" disabled
                                style="opacity:0.6; cursor:not-allowed;">
                            Enviar mensaje
                        </button>

                        <p style="margin-top:10px; font-size:0.9rem; color:#6a3c22;">
                            Debes <a href="login.php" style="color:#3d2618; font-weight:600;">iniciar sesión</a> 
                            para poder enviarnos un mensaje.
                        </p>

                    <?php endif; ?>

                </form>

        </div>

    </div>
<footer class="site-footer">
    <div class="footer-inner">

        <div class="footer-brand">
            <img src="img/Titulo_gastronomia.png" class="footer-logo" alt="Gastronomía a la Perú">
        </div>

        <div class="footer-note">
            <p>Proyecto para la materia Programación integral<br>
               Elaborado por Andrea Zelda
            </p>
        </div>

        <div class="footer-nav">
            <a href="index.php">Inicio</a>
            <a href="comida.php">Platillos</a>
            <a href="Nosotros.php">Nosotros</a>
            <a href="contacto.php">Contacto</a>
        </div>

    </div>

    <div class="footer-disclaimer">
        Disclaimer: Este es un sitio de un restaurante ficticio
    </div>
</footer>
</main>

</body>
</html>
