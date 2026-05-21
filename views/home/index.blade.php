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

    @include('home.header')

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

    @include('home.services')

    <section class="tournaments-section" id="torneos">

        <div class="container">

            <div class="section-header">
                <span class="section-tag">Competencias</span>

                <h2 class="section-title">
                    Torneos Activos
                </h2>

                <p class="section-description">
                    Participa en competencias organizadas, demuestra tu nivel y gana increíbles premios.
                </p>
            </div>

            <div class="tournaments-grid">

                <!-- CARD -->
                <div class="tournament-card">

                    <div class="tournament-banner">

                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1200&auto=format&fit=crop"
                            alt="">

                        <div class="tournament-status live">
                            EN VIVO
                        </div>

                        <div class="tournament-game">
                            <x-ui.svg-icon name="controller" />
                            <span>Valorant</span>
                        </div>

                    </div>

                    <div class="tournament-content">

                        <div class="tournament-top">

                            <div>
                                <h3 class="tournament-title">
                                    Valorant Champions
                                </h3>

                                <p class="tournament-organizer">
                                    Organizado por Nexus Arena
                                </p>
                            </div>

                            <div class="tournament-prize">
                                $500
                            </div>

                        </div>

                        <div class="tournament-meta">

                            <div class="meta-item">
                                <x-ui.svg-icon name="people" />
                                <span>32 Equipos</span>
                            </div>

                            <div class="meta-item">
                                <x-ui.svg-icon name="calendar-event" />
                                <span>18 Mayo</span>
                            </div>

                            <div class="meta-item">
                                <x-ui.svg-icon name="geo-alt" />
                                <span>Online</span>
                            </div>

                        </div>

                        <div class="tournament-progress">

                            <div class="progress-info">
                                <span>Inscripciones</span>
                                <span>24/32</span>
                            </div>

                            <div class="progress-bar">
                                <div class="progress-fill"></div>
                            </div>

                        </div>

                        <div class="tournament-actions">

                            <a href="#" class="btn-primary">
                                <x-ui.svg-icon name="rocket-takeoff" />
                                <span>Inscribirse</span>
                            </a>

                            <a href="#" class="btn-secondary">
                                <x-ui.svg-icon name="diagram-3" />
                            </a>

                        </div>

                    </div>

                </div>

                <!-- CARD -->
                <div class="tournament-card">

                    <div class="tournament-banner">

                        <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=1200&auto=format&fit=crop"
                            alt="">

                        <div class="tournament-status upcoming">
                            PRÓXIMO
                        </div>

                        <div class="tournament-game">
                            <x-ui.svg-icon name="controller" />
                            <span>Free Fire</span>
                        </div>

                    </div>

                    <div class="tournament-content">

                        <div class="tournament-top">

                            <div>
                                <h3 class="tournament-title">
                                    Free Fire Masters
                                </h3>

                                <p class="tournament-organizer">
                                    Organizado por Fire League
                                </p>
                            </div>

                            <div class="tournament-prize">
                                $250
                            </div>

                        </div>

                        <div class="tournament-meta">

                            <div class="meta-item">
                                <x-ui.svg-icon name="people" />
                                <span>48 Jugadores</span>
                            </div>

                            <div class="meta-item">
                                <x-ui.svg-icon name="calendar-event" />
                                <span>22 Mayo</span>
                            </div>

                            <div class="meta-item">
                                <x-ui.svg-icon name="geo-alt" />
                                <span>LAN</span>
                            </div>

                        </div>

                        <div class="tournament-progress">

                            <div class="progress-info">
                                <span>Inscripciones</span>
                                <span>40/48</span>
                            </div>

                            <div class="progress-bar">
                                <div class="progress-fill fill-2"></div>
                            </div>

                        </div>

                        <div class="tournament-actions">

                            <a href="#" class="btn-primary">
                                <x-ui.svg-icon name="rocket-takeoff" />
                                <span>Inscribirse</span>
                            </a>

                            <a href="#" class="btn-secondary">
                                <x-ui.svg-icon name="diagram-3" />
                            </a>

                        </div>

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

    @include('home.footer')

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
