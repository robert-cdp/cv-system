{{-- META --}}
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
<meta name="robots" content="nofollow, noindex" />
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- TITLE --}}
<title>@yield('title') | {{ config('app.name') }}</title>

{{-- PRELOADS --}}
<link rel="preload" href="{{ asset('panel/plugins/adminlte/css/adminlte.min.css') }}" as="style" />

{{-- PLUGINS --}}
<link rel="stylesheet" href="{{ asset('panel/plugins/overlayscrollbars/overlayscrollbars.min.css') }}" />
<link rel="stylesheet" href="{{ asset('panel/plugins/notyf/notyf.min.css') }}" />

{{-- STYLES --}}
<link rel="stylesheet" href="{{ asset('css/icon.css') }}" />
<link rel="stylesheet" href="{{ asset('panel/plugins/adminlte/css/adminlte.min.css') }}" />

<link rel="stylesheet" href="{{ asset('panel/css/data-table.css') }}" />
