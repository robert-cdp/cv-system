<script src="{{ asset('panel/plugins/overlayscrollbars/overlayscrollbars.min.js') }}"></script>

<script src="{{ asset('panel/plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('panel/plugins/adminlte/js/adminlte.min.js') }}"></script>

<script src="{{ asset('panel/plugins/notyf/notyf.min.js') }}"></script>

<script src="{{ asset('panel/js/data-table.js') }}"></script>

@include('partials.toast')
@stack('modals')
@stack('scripts')