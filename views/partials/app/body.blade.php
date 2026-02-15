    @auth
        <div class="app-wrapper">
            @include('partials.app.header')
            @include('partials.app.sidebar')
            @include('partials.app.main')
            @include('partials.app.footer')
        </div>
        @include('partials.app.scripts')
    @endauth

    @guest
        @include('partials.templates/auth')
    @endguest