<?php
session_start();
include "conexion.php";

$items = [
    [
        'slug' => 'ceviche',
        'tipo' => 'Plato típico',
        'nombre' => 'Ceviche clásico',
        'descripcion' => 'Pescado fresco marinado en limón, ají y cebolla morada. Servido con camote y maíz.',
        'imagen' => 'img/Ceviche.jpg'
    ],
    [
        'slug' => 'lomo_saltado',
        'tipo' => 'Plato típico',
        'nombre' => 'Lomo saltado',
        'descripcion' => 'Salteado de carne de res con papas fritas, cebolla, tomate y arroz blanco.',
        'imagen' => 'img/LomoSaltado.jpg'
    ],
    [
        'slug' => 'aji_gallina',
        'tipo' => 'Plato típico',
        'nombre' => 'Ají de gallina',
        'descripcion' => 'Pollo deshebrado en salsa cremosa de ají amarillo, pan y queso.',
        'imagen' => 'img/AjiGallina.jpg'
    ],
    [
        'slug' => 'anticuchos',
        'tipo' => 'Plato típico',
        'nombre' => 'Anticuchos',
        'descripcion' => 'Brochetas de corazón de res marinadas en ají panca y vinagre, asadas a la parrilla.',
        'imagen' => 'img/Anticuchos.jpg'
    ],
    [
        'slug' => 'chicha_morada',
        'tipo' => 'Bebida',
        'nombre' => 'Chicha morada',
        'descripcion' => 'Maíz morado hervido con frutas y especias, se sirve fría y muy dulce.',
        'imagen' => 'img/chichamorada.jpg'
    ],
    [
        'slug' => 'pisco_sour',
        'tipo' => 'Bebida',
        'nombre' => 'Pisco sour',
        'descripcion' => 'Cóctel bandera del Perú a base de pisco, limón, jarabe de goma y clara de huevo.',
        'imagen' => 'img/piscosour.jpg'
    ],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comida típica – Gastronomía a la Perú</title>
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
            <a href="comida.php" class="nav-link active">Platillos</a>
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


<main class="food-main">
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>Platillos</h1>
            <p>
                Explora algunos de los platillos y bebidas de nuestro restaurante.  
                Puedes leer las opiniones de otros usuarios antes de ordenar y dejar tu propia opinión
                si inicias sesión.
            </p>
        </div>
    </section>

    <div class="food-container">

        <!-- GRID de tarjetas -->
        <section class="food-grid">
            <?php foreach ($items as $item): ?>
                <article class="food-tile" data-platillo="<?php echo htmlspecialchars($item['slug']); ?>">
                    <div class="food-tile-image">
                        <img src="<?php echo htmlspecialchars($item['imagen']); ?>"
                             alt="<?php echo htmlspecialchars($item['nombre']); ?>">
                    </div>

                    <div class="food-tile-body">
                        <span class="food-tile-tag"><?php echo htmlspecialchars($item['tipo']); ?></span>
                        <h2><?php echo htmlspecialchars($item['nombre']); ?></h2>
                        <p>
                            <?php
                            $desc = $item['descripcion'] ?? '';
                            $resumen = mb_strimwidth($desc, 0, 80, '...', 'UTF-8');
                            echo htmlspecialchars($resumen);
                            ?>
                        </p>

                        <button type="button"
                                class="food-tile-button"
                                data-platillo="<?php echo htmlspecialchars($item['slug']); ?>">
                            Ver detalle
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

    </div>
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


<?php foreach ($items as $item): ?>
    <?php
    $slug = $item['slug'];
    $stmt = $conexion->prepare(
        "SELECT c.contenido, c.fecha_comentario,
                COALESCE(u.nombre, 'Usuario') AS autor
         FROM comentario_gastronomia c
         LEFT JOIN usuario_gastronomia u ON c.usuario_id = u.usuario_id
         WHERE c.platillo = ?
         ORDER BY c.fecha_comentario DESC"
    );
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $comentarios = $stmt->get_result();
    ?>

    <div class="food-modal-backdrop" id="modal-<?php echo htmlspecialchars($slug); ?>">
        <div class="food-modal">
            <button class="food-modal-close" data-close="modal-<?php echo htmlspecialchars($slug); ?>">×</button>

            <section class="food-card">
                <div class="food-image">
                    <img src="<?php echo htmlspecialchars($item['imagen']); ?>"
                         alt="<?php echo htmlspecialchars($item['nombre']); ?>">
                </div>

                <div class="food-content">
                    <h2><?php echo htmlspecialchars($item['nombre']); ?></h2>
                    <p class="food-description"><?php echo htmlspecialchars($item['descripcion']); ?></p>

                    <h3 class="comments-title">Comentarios</h3>

                    <div class="comments-list">
                        <?php if ($comentarios->num_rows > 0): ?>
                            <?php while ($c = $comentarios->fetch_assoc()): ?>
                                <article class="comment-pill">
                                    <p class="comment-author"><?php echo htmlspecialchars($c['autor']); ?></p>
                                    <p class="comment-text"><?php echo nl2br(htmlspecialchars($c['contenido'])); ?></p>
                                </article>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p class="no-comments">Todavía no hay comentarios para este platillo.</p>
                        <?php endif; ?>
                    </div>

                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <form action="comentar.php" method="POST" class="comment-form">
                            <input type="hidden" name="platillo" value="<?php echo htmlspecialchars($slug); ?>">
                            <textarea name="contenido" placeholder="Escribe tu comentario..." required></textarea>
                            <button type="submit" class="comment-send">➤</button>
                        </form>
                    <?php else: ?>
                        <p class="login-hint">
                            Para comentar debes <a href="login.php">iniciar sesión</a>.
                        </p>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>

<?php endforeach; ?>

<script src="js/app.js"></script>

</body>
</html>
