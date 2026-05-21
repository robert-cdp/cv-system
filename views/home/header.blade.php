<header class="header" id="header">
    <nav class="nav-container">

        <a href="#" class="logo">
            <img src="{{ asset('img/encabezado.png') }}" alt="">
        </a>

        <div class="nav-links" id="navLinks">

            <a href="#inicio" class="nav-item active">
                <x-ui.svg-icon name="house"/>
                <span>Inicio</span>
            </a>

            <a href="#servicios" class="nav-item">
                <x-ui.svg-icon name="grid"/>
                <span>Servicios</span>
            </a>

            <a href="#contacto" class="nav-item">
                <x-ui.svg-icon name="trophy"/>
                <span>Torneos</span>
            </a>

            @guest
            <a href="#" class="cta-nav">
                <x-ui.svg-icon name="rocket-takeoff"/>
                <span>Comenzar</span>
            </a>                
            @endguest

            @auth
            <a href="#" class="cta-nav">
                <x-ui.svg-icon name="speedometer"/>
                <span>Ir panel Admin</span>
            </a>
            @endauth

        </div>

        <button class="menu-toggle" id="menuToggle">
            <span></span>
            <span></span>
            <span></span>
        </button>

    </nav>
</header>