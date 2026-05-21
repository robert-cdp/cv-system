@extends('home.template')

@section('content')
    <section class="tournament-view mt-4">

        <!-- HERO -->
        <div class="tournament-hero">

            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?q=80&w=1600&auto=format&fit=crop"
                alt="">

            <div class="hero-overlay"></div>

            <div class="hero-content container">

                <div class="hero-badge live">
                    <x-ui.svg-icon name="broadcast" />
                    <span>TORNEO EN VIVO</span>
                </div>

                <h1 class="hero-title">
                    Valorant Champions 2026
                </h1>

                <p class="hero-description">
                    El torneo competitivo más esperado de la temporada.
                    Participa contra los mejores equipos y gana increíbles premios.
                </p>

                <div class="hero-meta">

                    <div class="hero-meta-item">
                        <x-ui.svg-icon name="calendar-event" />
                        <span>18 Mayo 2026</span>
                    </div>

                    <div class="hero-meta-item">
                        <x-ui.svg-icon name="people" />
                        <span>32 Equipos</span>
                    </div>

                    <div class="hero-meta-item">
                        <x-ui.svg-icon name="trophy" />
                        <span>$500 Premio</span>
                    </div>

                </div>

                <div class="hero-actions">

                    <a href="#" class="hero-btn primary">
                        <x-ui.svg-icon name="rocket-takeoff" />
                        <span>Inscribirme</span>
                    </a>

                    <a href="#" class="hero-btn secondary">
                        <x-ui.svg-icon name="diagram-3" />
                        <span>Ver Bracket</span>
                    </a>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="tournament-body container">

            <!-- LEFT -->
            <div class="tournament-main">

                <!-- ABOUT -->
                <div class="content-card">

                    <div class="card-header">
                        <h2>Información del Torneo</h2>
                    </div>

                    <div class="card-content">

                        <p>
                            Valorant Champions reúne a los mejores equipos competitivos
                            de la región en una batalla épica por el campeonato.
                            El torneo contará con eliminación directa y transmisión en vivo.
                        </p>

                        <div class="info-grid">

                            <div class="info-box">
                                <span>Modo</span>
                                <strong>5 vs 5</strong>
                            </div>

                            <div class="info-box">
                                <span>Formato</span>
                                <strong>Eliminación Simple</strong>
                            </div>

                            <div class="info-box">
                                <span>Servidor</span>
                                <strong>LATAM</strong>
                            </div>

                            <div class="info-box">
                                <span>Entrada</span>
                                <strong>Gratis</strong>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- BRACKET PREVIEW -->
                <div class="content-card">

                    <div class="card-header">
                        <h2>Bracket</h2>

                        <a href="#">
                            Ver completo
                        </a>
                    </div>

                    <div class="bracket-preview">

                        <div class="match-card">

                            <div class="team winner">
                                <span>Team Alpha</span>
                                <strong>13</strong>
                            </div>

                            <div class="team">
                                <span>Shadow Clan</span>
                                <strong>8</strong>
                            </div>

                        </div>

                        <div class="match-card">

                            <div class="team">
                                <span>Nova Squad</span>
                                <strong>11</strong>
                            </div>

                            <div class="team winner">
                                <span>Fenix</span>
                                <strong>13</strong>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- PARTICIPANTS -->
                <div class="content-card">

                    <div class="card-header">
                        <h2>Equipos Participantes</h2>
                    </div>

                    <div class="participants-grid">

                        <div class="participant-card">
                            <div class="participant-avatar">
                                TA
                            </div>

                            <div>
                                <h4>Team Alpha</h4>
                                <span>Capitán: Nexus</span>
                            </div>
                        </div>

                        <div class="participant-card">
                            <div class="participant-avatar">
                                SC
                            </div>

                            <div>
                                <h4>Shadow Clan</h4>
                                <span>Capitán: Raven</span>
                            </div>
                        </div>

                        <div class="participant-card">
                            <div class="participant-avatar">
                                FX
                            </div>

                            <div>
                                <h4>Fenix</h4>
                                <span>Capitán: Draco</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- SIDEBAR -->
            <aside class="tournament-sidebar">

                <!-- STATUS -->
                <div class="sidebar-card">

                    <h3>Estado</h3>

                    <div class="status-box">

                        <div class="status-circle"></div>

                        <div>
                            <strong>Inscripciones Abiertas</strong>
                            <span>24/32 equipos registrados</span>
                        </div>

                    </div>

                </div>

                <!-- PRIZE -->
                <div class="sidebar-card">

                    <h3>Premios</h3>

                    <div class="prize-box">
                        $500 USD
                    </div>

                </div>

                <!-- COUNTDOWN -->
                <div class="sidebar-card">

                    <h3>Comienza en</h3>

                    <div class="countdown">

                        <div class="count-box">
                            <strong>02</strong>
                            <span>Días</span>
                        </div>

                        <div class="count-box">
                            <strong>14</strong>
                            <span>Horas</span>
                        </div>

                        <div class="count-box">
                            <strong>32</strong>
                            <span>Min</span>
                        </div>

                    </div>

                </div>


        </div>

    </section>

    <section class="bracket-section">

    <div class="container">

        <div class="bracket-header">

            <h2>Bracket del Torneo</h2>

            <div class="bracket-legend">

                <div class="legend-item">
                    <span class="legend winner"></span>
                    <small>Ganador</small>
                </div>

                <div class="legend-item">
                    <span class="legend pending"></span>
                    <small>Pendiente</small>
                </div>

            </div>

        </div>

        <div class="bracket-wrapper">

            <!-- ROUND -->
            <div class="round">

                <div class="round-title">
                    Octavos
                </div>

                <div class="match">

                    <div class="team winner">
                        <span>Team Alpha</span>
                        <strong>13</strong>
                    </div>

                    <div class="team">
                        <span>Shadow Clan</span>
                        <strong>8</strong>
                    </div>

                </div>

                <div class="match">

                    <div class="team">
                        <span>Nova Squad</span>
                        <strong>9</strong>
                    </div>

                    <div class="team winner">
                        <span>Fenix</span>
                        <strong>13</strong>
                    </div>

                </div>

            </div>

            <!-- ROUND -->
            <div class="round semi-space">

                <div class="round-title">
                    Cuartos
                </div>

                <div class="match">

                    <div class="team winner">
                        <span>Team Alpha</span>
                        <strong>2</strong>
                    </div>

                    <div class="team">
                        <span>Fenix</span>
                        <strong>1</strong>
                    </div>

                </div>

            </div>

            <!-- FINAL -->
            <div class="round final-round">

                <div class="round-title">
                    Final
                </div>

                <div class="final-glow"></div>

                <div class="match final-match">

                    <div class="team winner champion">
                        <span>Team Alpha</span>
                        <strong>3</strong>
                    </div>

                    <div class="team">
                        <span>Night Wolves</span>
                        <strong>1</strong>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
@endsection
