<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
</head>

<body>

    <header class="header" id="header">
        <nav class="nav-container">
            <a href="#" class="logo">
                <img src="{{ asset('img/encabezado.png') }}" alt="">
            </a>
            <div class="nav-links" id="navLinks">
                <a href="#inicio" class="nav-item">Inicio</a>
                <a href="#categorias" class="nav-item">Categorías</a>
                <a href="#servicios" class="nav-item">Servicios</a>
                <a href="#contacto" class="nav-item">Contacto</a>
                <a href="#contacto" class="cta-nav">Comenzar</a>
            </div>
            <button class="menu-toggle" id="menuToggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <section class="hero" id="inicio">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <div class="hero-text">
                <h1>Soluciones Digitales <span class="highlight">Profesionales</span></h1>
                <p class="hero-subtitle">Transformamos tu presencia digital con servicios especializados en hosting,
                    desarrollo web, trámites digitales y más. Todo lo que necesitas para crecer en línea.</p>
                <div class="hero-cta">
                    <a href="#servicios" class="btn-primary">Ver Servicios →</a>
                    <a href="#contacto" class="btn-secondary">Contactar</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-image-placeholder">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div class="floating-card card-1">
                    <div style="color: var(--secondary); font-weight: 700; font-size: 1.2rem;">99.9%</div>
                    <div style="color: var(--dark); opacity: 0.7; font-size: 0.9rem;">Uptime</div>
                </div>
                <div class="floating-card card-2">
                    <div style="color: var(--secondary); font-weight: 700; font-size: 1.2rem;">24/7</div>
                    <div style="color: var(--dark); opacity: 0.7; font-size: 0.9rem;">Soporte</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="categorias">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Nuestras Especialidades</span>
                <h2 class="section-title">Categorías de Servicio</h2>
                <p class="section-description">Ofrecemos soluciones completas para impulsar tu presencia digital y
                    facilitar tus trámites en línea.</p>
            </div>
            <div class="categories-grid">
                <div class="category-card">
                    <div class="category-icon">🌐</div>
                    <h3 class="category-title">Hosting Web</h3>
                    <p class="category-description">Alojamiento web confiable y de alto rendimiento para tu sitio o
                        aplicación.</p>
                    <div class="category-arrow">Explorar →</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">💻</div>
                    <h3 class="category-title">Desarrollo Web</h3>
                    <p class="category-description">Diseño y desarrollo de sitios web modernos, rápidos y optimizados.
                    </p>
                    <div class="category-arrow">Explorar →</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">📧</div>
                    <h3 class="category-title">Email Profesional</h3>
                    <p class="category-description">Servicio de correo electrónico empresarial con tu propio dominio.
                    </p>
                    <div class="category-arrow">Explorar →</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">🎮</div>
                    <h3 class="category-title">Hosting Gaming</h3>
                    <p class="category-description">Servidores optimizados para juegos con baja latencia y alto
                        rendimiento.</p>
                    <div class="category-arrow">Explorar →</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">📄</div>
                    <h3 class="category-title">Trámites Digitales</h3>
                    <p class="category-description">Gestión profesional de trámites y documentación en línea.</p>
                    <div class="category-arrow">Explorar →</div>
                </div>
                <div class="category-card">
                    <div class="category-icon">🔒</div>
                    <h3 class="category-title">Seguridad Web</h3>
                    <p class="category-description">Certificados SSL, protección DDoS y respaldos automáticos.</p>
                    <div class="category-arrow">Explorar →</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section services-section" id="servicios">
        <div class="container">
            <div class="section-header">
                <span class="section-tag">Lo que Hacemos</span>
                <h2 class="section-title">Nuestros Servicios</h2>
                <p class="section-description">Servicios profesionales diseñados para hacer crecer tu negocio en el
                    mundo digital.</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-image">🌐</div>
                    <div class="service-content">
                        <h3 class="service-title">Hosting Web Premium</h3>
                        <p class="service-description">Alojamiento web rápido y seguro con garantía de uptime del
                            99.9%.</p>
                        <ul class="service-features">
                            <li>SSD NVMe Ultra Rápidos</li>
                            <li>SSL Gratis Incluido</li>
                            <li>Backups Diarios Automáticos</li>
                            <li>Soporte Técnico 24/7</li>
                        </ul>
                        <a href="#" class="service-link">Más información →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">💻</div>
                    <div class="service-content">
                        <h3 class="service-title">Desarrollo Web</h3>
                        <p class="service-description">Creación de sitios web modernos y responsivos adaptados a tu
                            negocio.</p>
                        <ul class="service-features">
                            <li>Diseño Personalizado</li>
                            <li>Optimización SEO</li>
                            <li>Responsive Design</li>
                            <li>Panel de Administración</li>
                        </ul>
                        <a href="#" class="service-link">Más información →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">📧</div>
                    <div class="service-content">
                        <h3 class="service-title">Email Corporativo</h3>
                        <p class="service-description">Cuentas de correo profesionales con tu dominio empresarial.</p>
                        <ul class="service-features">
                            <li>Casillas Ilimitadas</li>
                            <li>Anti-Spam Avanzado</li>
                            <li>Acceso Webmail</li>
                            <li>Sincronización Multi-dispositivo</li>
                        </ul>
                        <a href="#" class="service-link">Más información →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">🎮</div>
                    <div class="service-content">
                        <h3 class="service-title">Servidores Gaming</h3>
                        <p class="service-description">Hosting especializado para servidores de juegos con mínima
                            latencia.</p>
                        <ul class="service-features">
                            <li>Hardware de Alto Rendimiento</li>
                            <li>DDoS Protection</li>
                            <li>Panel de Control Intuitivo</li>
                            <li>Instalación Instantánea</li>
                        </ul>
                        <a href="#" class="service-link">Más información →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">📄</div>
                    <div class="service-content">
                        <h3 class="service-title">Trámites Digitales</h3>
                        <p class="service-description">Gestión eficiente de trámites y documentación oficial en línea.
                        </p>
                        <ul class="service-features">
                            <li>Asesoría Personalizada</li>
                            <li>Gestión Rápida</li>
                            <li>Seguimiento en Tiempo Real</li>
                            <li>Documentación Segura</li>
                        </ul>
                        <a href="#" class="service-link">Más información →</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-image">🔒</div>
                    <div class="service-content">
                        <h3 class="service-title">Seguridad y Respaldos</h3>
                        <p class="service-description">Protección completa para tu sitio web y datos empresariales.</p>
                        <ul class="service-features">
                            <li>Certificados SSL</li>
                            <li>Protección Anti-Malware</li>
                            <li>Firewall Avanzado</li>
                            <li>Backups Automáticos</li>
                        </ul>
                        <a href="#" class="service-link">Más información →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section" id="contacto">
        <div class="cta-content">
            <h2>¿Listo para Comenzar?</h2>
            <p>Impulsa tu negocio con nuestras soluciones digitales profesionales. Contáctanos hoy y descubre cómo
                podemos ayudarte.</p>
            <a href="#" class="btn-primary">Solicitar Cotización →</a>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3>{{ config('app.name') }}</h3>
                <p>Una experiencia diferente, conectando nuestra gente.</p>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Twitter">𝕏</a>
                    <a href="#" title="Instagram">📷</a>
                    <a href="#" title="LinkedIn">in</a>
                </div>
            </div>
            <div class="footer-section">
                <h4>Servicios</h4>
                <ul class="footer-links">
                    <li><a href="#">Hosting Web</a></li>
                    <li><a href="#">Desarrollo Web</a></li>
                    <li><a href="#">Email Corporativo</a></li>
                    <li><a href="#">Hosting Gaming</a></li>
                    <li><a href="#">Trámites Digitales</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Empresa</h4>
                <ul class="footer-links">
                    <li><a href="#">Acerca de</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Casos de Éxito</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Soporte</h4>
                <ul class="footer-links">
                    <li><a href="#">Centro de Ayuda</a></li>
                    <li><a href="#">Documentación</a></li>
                    <li><a href="#">Estado del Sistema</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 {{ config('app.name') }}. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', function() {
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
