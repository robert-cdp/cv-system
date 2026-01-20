<!doctype html>
<html lang="es">

<head>
    @include('partials.app-head')
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    @auth
        <div class="app-wrapper">
            @include('partials.app-header')
            @include('partials.app-sidebar')
            @include('partials.app-main')
            @include('partials.app-footer')
        </div>
        @include('partials.app-scripts')
    @endauth

    @guest
        @include('partials.auth-template')
    @endguest
</body>

</html>
