<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gastronomía a la Perú</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Outfit:wght@100..900&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_splash.css">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CWHMEZ96NJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CWHMEZ96NJ');
</script>
</head>
<body class="gradient-background">

  <div class="intro">
    <h1 class="logo-header">
      <span class="logo">B</span>
      <span class="logo">I</span>
      <span class="logo">E</span>
      <span class="logo">N</span>
      <span class="logo">V</span>
      <span class="logo">E</span>
      <span class="logo">N</span>
      <span class="logo">I</span>
      <span class="logo">D</span>
      <span class="logo">O</span>
    </h1>

    <div class="logo-img">
      <img src="img/Titulo_gastronomia.png" alt="Logo restaurant">
    </div>
  </div>
        
<header class="topbar">
    <div class="topbar-inner">
        <div class="brand">
            <img class="img_logo" src="img/Titulo_gastronomia.png" alt="loguito">
        </div>

        <nav class="main-nav">
            <a href="index.php" class="nav-link active">Inicio</a>
            <a href="comida.php" class="nav-link">Platillos</a>
            <a href="Nosotros.php" class="nav-link">Nosotros</a>
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

<section class="hero">
    <img src="img/fondo2.jpg" alt="Platos típicos peruanos sobre la mesa" class="hero-bg">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Bienvenido a<br></h1>
        <img class="img_logo2" src="img/Titulo_gastronomia_blanco.png" alt="loguito">
        <p>Perú es reconocido como uno de los países con la cocina más variadas del mundo. 
        La combinación de ingredientes andinos, productos del mar y herencias culturales 
        española, africana y asiática ha dado origen a una gastronomía única.</p><br>
        <p>¡Ven y conoce de la gastronomía Peruana en nuestras sucursales!</p>
    </div>
</section>

<main class="home-main">
<section class="home-section">
  <div class="home-container">
    <h2 class="home-section-title">Platillos más populares</h2>

    <div class="cf">
      <button class="cf-btn cf-prev" aria-label="Anterior">‹</button>

      <div class="cf-window">
        <ul class="cf-track">
          <li class="cf-item">
            <article class="dish-card">
              <img src="img/AdoboArequipeno.jpg" alt="Adobo Arequipeño" class="dish-img">
              <h3>Adobo Arequipeño</h3>
            </article>
          </li>
          <li class="cf-item">
            <article class="dish-card">
              <img src="img/Carapulcra.jpg" alt="Carapulcra" class="dish-img">
              <h3>Carapulcra</h3>
            </article>
          </li>
          <li class="cf-item">
            <article class="dish-card">
              <img src="img/Ceviche.jpg" alt="Ceviche" class="dish-img">
              <h3>Ceviche</h3>
            </article>
          </li>
          <li class="cf-item">
            <article class="dish-card">
              <img src="img/LomoSaltado.jpg" alt="Lomo Saltado" class="dish-img">
              <h3>Lomo saltado</h3>
            </article>
          </li>
          <li class="cf-item">
            <article class="dish-card">
              <img src="img/PolloBrasa.jpg" alt="Pollo a la Brasa" class="dish-img">
              <h3>Pollo a la brasa</h3>
            </article>
          </li>
          <li class="cf-item">
            <article class="dish-card">
              <img src="img/Pachamanca2.jpg" alt="Pachamanca" class="dish-img">
              <h3>Pachamanca</h3>
            </article>
          </li>
        </ul>
      </div>

      <button class="cf-btn cf-next" aria-label="Siguiente">›</button>
    </div>

    <div class="cf-dots" aria-hidden="true">
      <button class="cf-dot is-active"></button>
      <button class="cf-dot"></button>
      <button class="cf-dot"></button>
      <button class="cf-dot"></button>
      <button class="cf-dot"></button>
      <button class="cf-dot"></button>
    </div>
  </div>
</section>


    <section class="home-section">
        <div class="home-container">
            <h2 class="home-section-title">Bebidas más populares</h2>
            <div class="card-row">
                <article class="dish-card">
                    <img src="img/chichamorada.jpg" alt="Chicha morada" class="dish-img">
                    <h3>Chicha morada</h3>
                </article>

                <article class="dish-card">
                    <img src="img/piscosour.jpg" alt="Pisco sour" class="dish-img">
                    <h3>Pisco sour</h3>
                </article>

                <article class="dish-card">
                    <img src="img/incakola.jpg" alt="Emoliente" class="dish-img">
                    <h3>Inca Kola</h3>
                </article>
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
        
<a class="floating-bot-btn"
   href="https://studio.d-id.com/agents/share?id=v2_agt_gqd_5D7Q&utm_source=copy&key=WjI5dloyeGxMVzloZFhSb01ud3hNRFF3T0RZek5qTTBOalV3TnpZNU9UTTBOVGc2UzBrd2JtUmpNMmRmU25kSE9XWlRRbnBxZFdoeA=="
   target="_blank">
    <img src="img/bot.png" alt="Asistente" class="bot-icon">
</a>


</body>
</html>
