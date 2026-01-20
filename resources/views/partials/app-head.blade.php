    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <meta name="supported-color-schemes" content="light dark" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="preload" href="{{ asset('css/adminlte.min.css') }}" as="style" />
    <link rel="stylesheet" href="{{ asset('plugins/overlayscrollbars/overlayscrollbars.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}" />
