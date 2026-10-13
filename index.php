<?php
/* =========================================================
   CONFIGURACIÓN RÁPIDA DEL NEGOCIO
   Edita solo este bloque para adaptar la plantilla a cada cliente
   ========================================================= */

// --- Datos del negocio ---
$NEGOCIO = [
    'nombre'      => 'Café Aurora',
    'eslogan'     => 'Café artesanal hecho con amor',
    'descripcion' => 'Disfruta de los mejores granos seleccionados y preparaciones únicas en un ambiente acogedor.',
    'whatsapp'    => '573203146008', // ⚠️ Sin "+", sin espacios. Código país + número
    'email'       => 'hola@cafeaurora.com',
    'direccion'   => 'Calle 123 #45-67, Bogotá',
    'instagram'   => 'https://instagram.com/cafeaurora',
    'facebook'    => 'https://facebook.com/cafeaurora',
];

// --- Catálogo / Servicios ---
// Cambia imagen, nombre, descripción y precio. El botón de WhatsApp se genera automáticamente.
$PRODUCTOS = [
    [
        'nombre'      => 'Espresso Clásico',
        'descripcion' => 'Intenso y aromático, preparado con granos 100% arábica.',
        'precio'      => '$5.000',
        'imagen'      => 'https://images.unsplash.com/photo-1510707577719-ae7c14805e3a?w=600&q=80',
    ],
    [
        'nombre'      => 'Capuchino Cremoso',
        'descripcion' => 'Espresso con leche vaporizada y una capa de espuma perfecta.',
        'precio'      => '$7.500',
        'imagen'      => 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?w=600&q=80',
    ],
    [
        'nombre'      => 'Croissant de Mantequilla',
        'descripcion' => 'Recién horneado cada mañana, crujiente y dorado.',
        'precio'      => '$4.000',
        'imagen'      => 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=600&q=80',
    ],
    [
        'nombre'      => 'Cheesecake de Maracuyá',
        'descripcion' => 'Postre cremoso con un toque tropical irresistible.',
        'precio'      => '$9.000',
        'imagen'      => 'https://images.unsplash.com/photo-1533134242443-d4fd215305ad?w=600&q=80',
    ],
    [
        'nombre'      => 'Frappé de Caramelo',
        'descripcion' => 'Bebida fría con caramelo, crema batida y mucho sabor.',
        'precio'      => '$10.500',
        'imagen'      => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=600&q=80',
    ],
    [
        'nombre'      => 'Té Chai Latte',
        'descripcion' => 'Mezcla especiada con leche cremosa, ideal para la tarde.',
        'precio'      => '$6.500',
        'imagen'      => 'https://images.unsplash.com/photo-1597318181409-cf64d0b5d8a2?w=600&q=80',
    ],
];

// --- Paleta de colores (personalízala por cliente) ---
$COLORES = [
    'primario'   => '#6F4E37', // Marrón café
    'secundario' => '#D4A373', // Beige cálido
    'acento'     => '#25D366', // Verde WhatsApp
    'fondo'      => '#FFF8F0', // Fondo claro
    'texto'      => '#2B2B2B',
];

// --- Helper para construir URL de WhatsApp ---
function wa_link($telefono, $mensaje) {
    return 'https://wa.me/' . urlencode($telefono) . '?text=' . urlencode($mensaje);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($NEGOCIO['nombre']) ?> | <?= htmlspecialchars($NEGOCIO['eslogan']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($NEGOCIO['descripcion']) ?>">

    <!-- Tipografía moderna -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* =========================================================
           VARIABLES GLOBALES (fáciles de cambiar)
           ========================================================= */
        :root {
            --color-primario:   <?= $COLORES['primario'] ?>;
            --color-secundario: <?= $COLORES['secundario'] ?>;
            --color-acento:     <?= $COLORES['acento'] ?>;
            --color-fondo:      <?= $COLORES['fondo'] ?>;
            --color-texto:      <?= $COLORES['texto'] ?>;
            --color-blanco:     #ffffff;
            --sombra-suave:     0 10px 30px rgba(0,0,0,0.08);
            --sombra-hover:     0 15px 40px rgba(0,0,0,0.15);
            --radio:            16px;
            --transicion:       all 0.3s ease;
        }

        /* =========================================================
           RESET Y BASE
           ========================================================= */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', system-ui, -apple-system, sans-serif;
            background-color: var(--color-fondo);
            color: var(--color-texto);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        img { max-width: 100%; display: block; }

        a { text-decoration: none; color: inherit; }

        /* =========================================================
           CONTENEDOR
           ========================================================= */
        .contenedor {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* =========================================================
           HEADER / NAV
           ========================================================= */
        .header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
        }

        .logo {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--color-primario);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo::before {
            content: "☕";
            font-size: 1.5rem;
        }

        .nav-links {
            display: none;
            gap: 24px;
            list-style: none;
        }

        .nav-links a {
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transicion);
            position: relative;
        }

        .nav-links a:hover { color: var(--color-primario); }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-primario);
            transition: var(--transicion);
        }

        .nav-links a:hover::after { width: 100%; }

        /* =========================================================
           HERO
           ========================================================= */
        .hero {
            padding: 80px 0 100px;
            background: linear-gradient(135deg, var(--color-fondo) 0%, #f0e6d8 100%);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            background: var(--color-secundario);
            opacity: 0.15;
            border-radius: 50%;
            filter: blur(60px);
        }

        .hero-contenido {
            position: relative;
            z-index: 1;
            max-width: 700px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-block;
            background: var(--color-blanco);
            color: var(--color-primario);
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            box-shadow: var(--sombra-suave);
        }

        .hero h1 {
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 20px;
            color: var(--color-primario);
        }

        .hero h1 span {
            background: linear-gradient(120deg, var(--color-primario), var(--color-secundario));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: clamp(1rem, 2.5vw, 1.15rem);
            color: #555;
            margin-bottom: 35px;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
        }

        /* =========================================================
           BOTONES
           ========================================================= */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 28px;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transicion);
            white-space: nowrap;
        }

        .btn-whatsapp {
            background: var(--color-acento);
            color: var(--color-blanco);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.35);
        }

        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(37, 211, 102, 0.45);
        }

        .btn-whatsapp::before {
            content: "";
            width: 20px;
            height: 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z'/%3E%3C/svg%3E");
            background-size: contain;
            background-repeat: no-repeat;
        }

        .btn-primario {
            background: var(--color-primario);
            color: var(--color-blanco);
        }

        .btn-primario:hover {
            background: #5a3d2b;
            transform: translateY(-3px);
        }

        /* =========================================================
           SECCIÓN CATÁLOGO
           ========================================================= */
        .catalogo {
            padding: 80px 0;
        }

        .seccion-titulo {
            text-align: center;
            margin-bottom: 50px;
        }

        .seccion-titulo h2 {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 700;
            color: var(--color-primario);
            margin-bottom: 12px;
        }

        .seccion-titulo p {
            color: #666;
            max-width: 500px;
            margin: 0 auto;
        }

        .grid-productos {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .card {
            background: var(--color-blanco);
            border-radius: var(--radio);
            overflow: hidden;
            box-shadow: var(--sombra-suave);
            transition: var(--transicion);
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: var(--sombra-hover);
        }

        .card-imagen {
            position: relative;
            aspect-ratio: 4 / 3;
            overflow: hidden;
            background: #f0f0f0;
        }

        .card-imagen img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .card-imagen img {
            transform: scale(1.08);
        }

        .card-precio {
            position: absolute;
            top: 12px;
            right: 12px;
            background: var(--color-blanco);
            color: var(--color-primario);
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.9rem;
            box-shadow: var(--sombra-suave);
        }

        .card-cuerpo {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            gap: 10px;
        }

        .card-cuerpo h3 {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--color-texto);
        }

        .card-cuerpo p {
            font-size: 0.9rem;
            color: #777;
            flex-grow: 1;
        }

        .card .btn {
            width: 100%;
            padding: 12px;
            font-size: 0.95rem;
        }

        /* =========================================================
           SECCIÓN CONTACTO
           ========================================================= */
        .contacto {
            padding: 80px 0;
            background: var(--color-primario);
            color: var(--color-blanco);
            text-align: center;
        }

        .contacto h2 {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            margin-bottom: 16px;
        }

        .contacto p {
            opacity: 0.9;
            margin-bottom: 30px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .contacto .btn-whatsapp {
            background: var(--color-blanco);
            color: var(--color-primario);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .contacto .btn-whatsapp::before {
            filter: invert(1) sepia(1) saturate(5) hue-rotate(90deg);
        }

        .contacto .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.3);
        }

        /* =========================================================
           FOOTER
           ========================================================= */
        .footer {
            background: #1a1a1a;
            color: #bbb;
            padding: 40px 0 20px;
            text-align: center;
            font-size: 0.9rem;
        }

        .footer-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 25px;
        }

        .footer-info a { transition: var(--transicion); }
        .footer-info a:hover { color: var(--color-secundario); }

        .footer-copy {
            border-top: 1px solid #333;
            padding-top: 20px;
            font-size: 0.8rem;
            opacity: 0.7;
        }

        /* =========================================================
           BOTÓN FLOTANTE WHATSAPP
           ========================================================= */
        .wa-flotante {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: var(--color-acento);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.5);
            z-index: 999;
            transition: var(--transicion);
            animation: pulse 2s infinite;
        }

        .wa-flotante:hover {
            transform: scale(1.1);
        }

        .wa-flotante svg {
            width: 32px;
            height: 32px;
            fill: white;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 8px 20px rgba(37, 211, 102, 0.5); }
            50%      { box-shadow: 0 8px 30px rgba(37, 211, 102, 0.8); }
        }

        /* =========================================================
           RESPONSIVE (TABLET Y DESKTOP)
           ========================================================= */
        @media (min-width: 600px) {
            .grid-productos {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 900px) {
            .nav-links { display: flex; }
            .hero { padding: 120px 0 140px; }
            .grid-productos {
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
            }
            .footer-info {
                flex-direction: row;
                justify-content: center;
                gap: 30px;
            }
        }
    </style>
</head>
<body>

    <!-- ================= HEADER ================= -->
    <header class="header">
        <div class="contenedor">
            <nav class="nav">
                <a href="#" class="logo"><?= htmlspecialchars($NEGOCIO['nombre']) ?></a>
                <ul class="nav-links">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#catalogo">Catálogo</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- ================= HERO ================= -->
    <section class="hero" id="inicio">
        <div class="contenedor hero-contenido">
            <span class="hero-badge">✨ Bienvenido a <?= htmlspecialchars($NEGOCIO['nombre']) ?></span>
            <h1>
                <?= htmlspecialchars($NEGOCIO['eslogan']) ?><br>
                <span>Hecho especialmente para ti</span>
            </h1>
            <p><?= htmlspecialchars($NEGOCIO['descripcion']) ?></p>
            <a href="<?= wa_link($NEGOCIO['whatsapp'], 'Hola, quiero más información sobre ' . $NEGOCIO['nombre']) ?>"
               target="_blank" rel="noopener" class="btn btn-whatsapp">
                Escríbenos por WhatsApp
            </a>
        </div>
    </section>

    <!-- ================= CATÁLOGO ================= -->
    <section class="catalogo" id="catalogo">
        <div class="contenedor">
            <div class="seccion-titulo">
                <h2>Nuestro Catálogo</h2>
                <p>Descubre nuestros productos más populares. Haz clic en cualquiera para pedirlo directamente.</p>
            </div>

            <div class="grid-productos">
                <?php foreach ($PRODUCTOS as $producto): ?>
                    <?php
                        // Mensaje prellenado por producto
                        $mensaje = "Hola, estoy interesado en el producto/servicio {$producto['nombre']}";
                        $link    = wa_link($NEGOCIO['whatsapp'], $mensaje);
                    ?>
                    <article class="card">
                        <div class="card-imagen">
                            <img src="<?= htmlspecialchars($producto['imagen']) ?>"
                                 alt="<?= htmlspecialchars($producto['nombre']) ?>"
                                 loading="lazy">
                            <span class="card-precio"><?= htmlspecialchars($producto['precio']) ?></span>
                        </div>
                        <div class="card-cuerpo">
                            <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
                            <p><?= htmlspecialchars($producto['descripcion']) ?></p>
                            <a href="<?= $link ?>" target="_blank" rel="noopener"
                               class="btn btn-whatsapp btn-pedir"
                               data-producto="<?= htmlspecialchars($producto['nombre']) ?>">
                                Pedir por WhatsApp
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= CONTACTO ================= -->
    <section class="contacto" id="contacto">
        <div class="contenedor">
            <h2>¿Listo para ordenar?</h2>
            <p>Escríbenos y te atendemos al instante. Estamos disponibles todos los días.</p>
            <a href="<?= wa_link($NEGOCIO['whatsapp'], 'Hola, quiero hacer un pedido') ?>"
               target="_blank" rel="noopener" class="btn btn-whatsapp">
                Contactar ahora
            </a>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="footer">
        <div class="contenedor">
            <div class="footer-info">
                <span>📍 <?= htmlspecialchars($NEGOCIO['direccion']) ?></span>
                <a href="mailto:<?= htmlspecialchars($NEGOCIO['email']) ?>">✉️ <?= htmlspecialchars($NEGOCIO['email']) ?></a>
                <a href="<?= htmlspecialchars($NEGOCIO['instagram']) ?>" target="_blank" rel="noopener">📷 Instagram</a>
                <a href="<?= htmlspecialchars($NEGOCIO['facebook']) ?>" target="_blank" rel="noopener">👍 Facebook</a>
            </div>
            <div class="footer-copy">
                © <?= date('Y') ?> <?= htmlspecialchars($NEGOCIO['nombre']) ?>. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    <!-- ================= BOTÓN FLOTANTE WHATSAPP ================= -->
    <a href="<?= wa_link($NEGOCIO['whatsapp'], 'Hola, quiero más información') ?>"
       target="_blank" rel="noopener" class="wa-flotante" aria-label="Contactar por WhatsApp">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </a>

    <!-- ================= JAVASCRIPT (refuerzo de clics) ================= -->
    <script>
        /**
         * Refuerzo opcional: si el atributo href falla o se edita el HTML,
         * este script garantiza que cada botón ".btn-pedir" abra WhatsApp
         * con el mensaje correcto según el nombre del producto.
         */
        document.querySelectorAll('.btn-pedir').forEach(function (boton) {
            boton.addEventListener('click', function (e) {
                const producto = this.dataset.producto;
                if (!producto) return;

                // Si el navegador no soporta bien el href, lo generamos aquí:
                const telefono = "<?= $NEGOCIO['whatsapp'] ?>";
                const mensaje  = encodeURIComponent(
                    "Hola, estoy interesado en el producto/servicio " + producto
                );
                const url = "https://wa.me/" + telefono + "?text=" + mensaje;

                // Solo forzamos si el href no apunta ya a WhatsApp
                if (!this.href.includes('wa.me')) {
                    e.preventDefault();
                    window.open(url, '_blank');
                }
            });
        });

        /* Animación de entrada simple para las cards */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.card').forEach((card, i) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `opacity 0.5s ease ${i * 0.08}s, transform 0.5s ease ${i * 0.08}s`;
            observer.observe(card);
        });
    </script>

</body>
</html>