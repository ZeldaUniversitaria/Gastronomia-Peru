<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nosotros – Gastronomía a la Perú</title>
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
            <a href="Nosotros.php" class="nav-link active">Nosotros</a>
            <a href="contacto.php" class="nav-link">Contacto</a>
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
        
<main class="home-main">
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>Nosotros</h1>
            <p>
                Somos un proyecto dedicado a difundir la riqueza gastronómica del Perú,
                celebrando sus sabores tradicionales y su identidad cultural.
            </p>
        </div>
    </section>

    <section class="about-section">
        <div class="about-block">
            <h2>Nuestra historia</h2>
            <p>
                En <strong>Gastronomía a la Perú</strong> nos caracterizamos por compartir la
                pasión por los platillos tradicionales, preparados con dedicación y siguiendo
                las recetas que han pasado de generación en generación. Nuestro objetivo es 
                acercarte a los sabores auténticos del Perú, creando una experiencia que
                despierte tus sentidos.
            </p>
        </div>
    </section>

    <section class="about-section">
        <div class="about-block">
            <h2>Gastronomía Peruana</h2>
            <p>
                La gastronomía peruana es considerada una de las más variadas y prestigiosas
                del mundo. Su riqueza proviene de la fusión de culturas indígenas, españolas,
                africanas y asiáticas, dando origen a una cocina vibrante, colorida y llena
                de tradición. Desde el famoso ceviche hasta la pachamanca, cada platillo
                cuenta una historia única.
            </p>
        </div>
    </section>

    <section class="about-card-section">
        <div class="about-card-container">

            <div class="about-card-info">
                <h2>Proyecto académico</h2>
                <p>
                    Este proyecto fue desarrollado por la alumna 
                    <strong>Andrea Solís</strong>, como parte de la materia
                    <strong>Programación Integral</strong>.
                </p>
            </div>

            <div class="about-card">
                <img src="img/ficha_programacionintegral.png" alt="Ficha Andrea">
            </div>
        </div>
    </section>
</main>

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
<script src="js/app.js"></script>
</body>
</html>
